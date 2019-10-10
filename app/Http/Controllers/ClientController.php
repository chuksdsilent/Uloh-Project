<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use App\Categories;
use App\Products;
use App\Blog;
use App\SubCategories;
use App\ShopByDepartmentTransactions;
use App\Users;
use App\ShopByDepartmentContactInfo;
use App\ServiceCategory;
use App\ServicesSubCategory;
use App\GetAQuote;
use App\BasicInfo;
use App\Projects;
use App\ProjectPics;
use App\ContactProfessional;
use App\UploadPhoto;
use App\PhotoSubCategories;
use App\IdeaBook;
use App\States;
class ClientController extends Controller
{
  public function searchProduct(Request $request)
  {
    
    $terms = $request->get('search_value');
    $terms = explode(" ", request('search_value'));

     $shopProducts = Products::query()
        ->Where(function ($query) use ($terms) {
          foreach ($terms as $term) {
              $query->where('product_name', 'like', '%' . $term . '%');
          }
       })
       ->orWhere(function ($query) use ($terms) {
         foreach ($terms as $term) {
             $query->where('description', 'like', '%' . $term . '%');
         }
      })
  ->get();
    return $this->frontView('product_results')->with('shopProducts', $shopProducts);
  }
  public function contactProfessional(Request $request)
  {
    $data = Array(
      'receiver_user_id' => $request->receiver_user_id, 
      'sender_user_id' => Auth::user()->user_id, 
      'sender_fullname' => $request->fullName, 
      'sender_phone' => $request->phone, 
      'message' => $request->message
    );
    contactProfessional::create($data);
    return redirect()->back()->with('message', 'The professional will contact you soon.');
  }
  
  public function userProjects($pics_id)
  {
    $id = $_GET['user'];
    $name = DB::table('services_sub_categories')->where('prof_service_id', $id)->get(['name']);
    $d_services = DB::table('services_sub_categories')->get();
    
    $service_provided = DB::table('prof_services_provided')
              ->where('user_id', $id)
              ->join('services_sub_categories','prof_services_provided.prof_services_id', '=', 'services_sub_categories.prof_service_id')
              ->get(['name']);
     $services = BasicInfo::where('user_id', $id)->get();
     $projects = ProjectPics::where('pics_id', $pics_id)->get();
     
   return $this->frontView('client.user_projects')
   ->with('projects_pics', json_decode($projects))
   ->with('service_provided', $service_provided)
   ->with("services", $services)
   ->with('service_name', $name)
   ->with('d_services', $d_services);
  }
  public function storeProject(Request $request)
  {
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    
    $pics_id = $this->generateTransactionId($permitted_chars, 60);
    // $validatedData = $request->validate([
    //   'projectName' => 'required',
    //   'sub_category' => 'required',
    //   'projectAddress' => 'required',
    //   'projectYear' => 'required',
    //   'projectCost' => 'required',
    //   'linkToWebsite' => 'required',
    //   // 'filename' => 'required',
    //   // 'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    // ]);
       
      $data =[
        'project_id' => $this->generateTransactionId($permitted_chars, 50),
        'user_id' => Auth::user()->user_id,
        'project_name' => $request->projectName,
        'prof_service_id' => $request->sub_category,
        'project_address' => $request->projectAddress,
        'project_year' => $request->projectYear,
        'project_cost' => $request->projectCost,
        'link_to_website' => $request->linkToWebsite,
        'pics_id' => $pics_id         
      ];
      $pics = array();
      if($request->hasfile('filename'))
      {

         foreach($request->file('filename') as $image)
         {
           
            $date = substr(date("YmdHisu"), 0, -3);
                
            $ext = $image->getClientOriginalExtension();
            $image_path = '/project_pics/';
            $img_name = 'img-'. $date. ''. $this->generateTransactionId($permitted_chars, 5). '.'. $ext;
            array_push($pics, $img_name);
            $pics_link = $image_path.''.$img_name;

            // $name = $image->getClientOriginalName();
            $image->move(public_path().''.$image_path, $img_name);  
            // $image->store(public_path().'/project_pics/',$pics_id.'.jpg');
            $picsData = ['pics_id' => $pics_id, 'pics_link' => $pics_link, 'user_id' => Auth::user()->user_id, 'prof_service_id' =>  $request->sub_category];
            ProjectPics::create($picsData);
            
         }
      }
      
    Projects::create($data);
     return redirect()->back()->with('success', 'Project Uploaded Successfully.');
  }
  public function newProject(){
      $subCategory = ServicesSubCategory::all(['prof_service_id', 'name']);
      return $this->frontView('client.newProject')->with('subCategory', $subCategory);
  }
  public function userProfile(Request $request, $id)
  {       
    $name = DB::table('services_sub_categories')->where('prof_service_id', $id)->get(['name']);
    $d_services = DB::table('services_sub_categories')->get();
    
    $service_provided = DB::table('prof_services_provided')
              ->where('user_id', $id)
              ->join('services_sub_categories','prof_services_provided.prof_services_id', '=', 'services_sub_categories.prof_service_id')
              ->get(['name']);
     $services = BasicInfo::where('user_id', $id)->get();
     $projects = Projects::where('user_id', $id)->get();;
     
   return $this->frontView('client.user_profile')
   ->with('projects', json_decode($projects))
   ->with('service_provided', $service_provided)
   ->with("services", $services)
   ->with('service_name', $name)
   ->with('d_services', $d_services);
  }
  public function showIdeaBook()
  {
    $ideabook =    DB::table('ideabook')->where('user_id', Auth::user()->user_id)->get();
    return $this->frontView('client.ideabook')->with('ideabook', $ideabook);
  }
  public function saveToIdeaBook($id, Request $request)
  {
    if (Auth::check()) {
      $idea = IdeaBook::where('user_id', Auth::user()->user_id)->where('project_id', $id)->first();
      if($idea == null){
        $data = ['user_id' => Auth::user()->user_id, 'project_id' => $id, 'pics_id' => $request->pics_id  ];
        IdeaBook::create($data);
        $msg = 'Saved successfully.';
      }else{
        $msg = 'Idea already saved.';
      }
    }else{
      $msg = 'You have to login to save.';
    }
    return redirect()->back()->with('msg', $msg);
  }
  public function getPhotoo($id)
  {
    
    $photos = Projects::where('project_id', $id)->get();   

    return $this->frontView('client.photo')->with('photos_content', $photos);    
  }
  public function getPhotos($id)
  {
    
    $photo_sub = ServicesSubCategory::where('prof_service_id', $id)->get();
     $photos = Projects::where('prof_service_id', $id)->get();
    return $this->frontView('client.photo_idea')->with('photo_sub', $photo_sub)->with('photo', $photos);
  }
  public function storePhoto(Request $request){
    
     $request->all();
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $image = $request->file('photo');
    $date = substr(date("YmdHisu"), 0, -3);
                
    $ext = $image->getClientOriginalExtension();
    $image_path = '/photo_pics/';
    $img_name = 'img-'. $date. ''. $this->generateTransactionId($permitted_chars, 5). '.'. $ext;
    $pics_link = $image_path.''.$img_name;

    // $name = $image->getClientOriginalName();
    $image->move(public_path().''.$image_path, $img_name);  

    $data = [
      'photo_id' => $this->generateTransactionId($permitted_chars, 50),
      'photo_sub_cat_id' => $request->get('sub_categories'),
      'photo_name' => $request->get('photo_name'),
      'photo_path' => $pics_link,
      'company_name' => $request->get('company_name'),
      'uploader' => $request->get('company_name')
    ];
    UploadPhoto::create($data);
    return redirect()->back()->with('msg', 'Photo Uploaded Successfully.');
  }
  public function uploadPhoto()
  {    
    $categores_id = Categories::get(['id', 'name']);
    $sub_categores_id = PhotoSubCategories::get(['id', 'name', 'photo_sub_cat_id']);
    return $this->frontView('client.uploadPhoto')->with('categories_id', $categores_id)->with('sub_categories_id', $sub_categores_id);
  }
  public function searchForProfessionals(Request $request){
    $service =  $request->service;
    $state =  $request->state;
    // $services = DB::table('basic_info')
    //         ->where('basic_info.prof_service_id', $request->service)
    //         ->where('basic_info.state', $request->state)
    //         ->join('services_sub_categories', 'basic_info.prof_service_id', '=', 'services_sub_categories.prof_service_id')
    //         ->take(10)
    //         ->get(); 
    // $services =    DB::table('basic_info')
    //         ->join('projects', function($join) use ($service, $state)
    //         {
    //             $join->on('basic_info.user_id', '=', 'projects.user_id')
    //                  ->where('projects.prof_service_id', '=',  $service)
    //                  ->where('basic_info.state', '=',  $state);

    //         })
    //         ->get();

    //         $request->session()->put('servicesReturned', $services);
    // return redirect()->back()->with('servicesReturned', $services)->with('prof_service_id', $service);
    
    $name = DB::table('services_sub_categories')->where('prof_service_id', $service)->get(['name']);
     $d_services = DB::table('services_sub_categories')->get();

     $services =  DB::table('basic_info')
                  ->join('projects', function($join) use ($service, $state)
                  {
                      $join->on('basic_info.user_id', '=', 'projects.user_id')
                            ->where('projects.prof_service_id', '=',  $service)
                            ->where('basic_info.state', '=',  $state);
                  })
                  ->get();

    return $this->frontView('client.professionals')->with("services", $services)->with('service_name', $name)->with('d_services', $d_services)->with('prof_service_id', $service);
  }
  public function getAQuote(Request $request)
  {
    $data = [
        'email' => $request->email, 
        'full_name' => $request->fullName,
        'phone' => $request->phone,
        'zip_code' => $request->zipCode,
        'message' => $request->message
    ];
    getAQuote::create($data);
    return  redirect()->back()->with('success', 'Sent Successfully.');
  }
  public function getProfessionals($id)
  {
   

    $name = DB::table('services_sub_categories')->where('prof_service_id', $id)->get(['name']);
     $d_services = DB::table('services_sub_categories')->get();

     $services =  DB::table('basic_info')
                  ->join('projects', function($join) use ($id)
                  {
                      $join->on('basic_info.user_id', '=', 'projects.user_id')
                            ->where('projects.prof_service_id', '=',  $id);
                  })
                  ->get();
      $states = States::all();

    return $this->frontView('client.professionals')
                ->with('states', $states)
                ->with("services", $services)
                ->with('service_name', $name)
                ->with('d_services', $d_services)
                ->with('prof_service_id', $id);
  }
   
  function generateTransactionId($input, $strength = 10) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }

    return $random_string;
  }

  public function registerProduct(Request $request)
  {
    $shopping_cart = $request->session()->get('shopping_cart');
    
    foreach($shopping_cart as $key => $value){
      ShopByDepartmentTransactions::create([
        'paystack_ref' => $request->paystack_ref,
        'product_name' => $value['name'],
        'transaction_id'=> $request->transaction_id,
        'product_id' => key($shopping_cart),
        'quantity' => $value['quantity'],
        'price' => $value['price']
      ]);
    }
     $email = Auth::user()->email;
    foreach($request->session()->get('contact_info') as $key => $value){
      ShopByDepartmentContactInfo::create([
        'email' => $email,
        'transaction_id' => $request->transaction_id,
        'full_name' => $value['full_name'],
        'address_1' => $value['address_1'],
        'address_2' => $value['address_2'],
        'state' => $value['state'],
        'phone' => $value['phone'],
      ]);
    }
    $request->session()->forget('shopping_cart');
    $request->session()->forget('contact_info');
    $success = true;
    $data = ['sucess' => $success];
    $request->session()->forget('contact_info');
    $request->session()->forget('shopping_cart');
    return response()->json($data, 200);
  }
  public function orderReview(Request $request)
  {
    
    // return $request->all();
    $validatedData = $request->validate([
      'full_name' => 'required|max:255',
      'address_1' => 'required',
      'phone' => 'required'
  ]);

    if (Auth::check()) {
      $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $paystack_ref = $request->paystack_ref;
      $date = substr(date("YmdHisu"), 0, -3);
      $transaction_id = "uuloh-".$this->generateTransactionId($permitted_chars);    
          
      $contactInfo = Array([
        'transaction_id'=> $transaction_id,
        'full_name' => $request->full_name, 
        'address_1' => $request->address_1,
        'address_2' => $request->address_2,
        'phone' => $request->phone,
        'state' => $request->state
      ]);
      $request->session()->put('contact_info', $contactInfo);
      // dd($request->session()->get('contact_info') );
      return $this->frontView('client.order_review')->with('contact_info', $contactInfo)->with('transaction_id', $transaction_id);    
    }else{
      return  redirect('login')->with('req', $request->all());
    }
  }
  public function billingInformation(Request $request)
  {
    return $this->frontView('client.billing_information');    
  }
    public function shippingInformation()
    {
      $states = \App\States::all();
      return $this->frontView('client.contact_info')->with('states', $states);
    }
    public function removeProduct(Request $request)
    {
      $total = 0;
      foreach($request->session()->get('shopping_cart') as $key => $value){
        if($value['code'] == $request->remove_id){
            $request->session()->forget("shopping_cart.$key");
            break;
        }
      }              
      foreach($request->session()->get('shopping_cart')as $key => $value){
        $total += $value['quantity'] * $value['price'];
      }
      
      $no_of_item = 0;
      foreach ($request->session()->get('shopping_cart') as $key => $value) {
        $no_of_item += $value['quantity'];
      }
        $total = '&#x20a6 '. number_format($total);
        // print_r(session('shopping_cart'));
        return response()->json(['total'=> $total, 'no_of_item' => $no_of_item]);
    }
    public function updateCart(Request $request)
    {
      $total = 0;
      foreach(session('shopping_cart') as $key => $value){
        if($value['code'] == $request->product_id){
            session(["shopping_cart.$key.quantity" => $request->qty_val]);
            break;
        }
      }
      foreach(session('shopping_cart') as $key => $value){
        $total += $value['quantity'] * $value['price'];
      }
      
      $no_of_item = 0;
      foreach ($request->session()->get('shopping_cart') as $key => $value) {
        $no_of_item += $value['quantity'];
      }

      $total = '&#x20a6 '. number_format($total);
      return response()->json(['total'=> $total, 'no_of_item' => $no_of_item]);
    }
    public function showCart(Request $request)
    {      
    //  $request->session()->forget('shopping_cart'); 
      return $this->frontView('client.show_cart');
    }
    public function cart(Request $request)
    {
        $product_id = $request->product_id;
        if($request->action == "ADD"){
            $cartArray = array(
                   $product_id=>array(
                        'name'=>$request->product_name,
                        'code'=>$request->product_id,
                        'price'=>$request->price,
                        'quantity'=>$request->qty,
                        'image'=>$request->img_path
                    )
            );
            
          if(empty($request->session()->has('shopping_cart'))) {
              $request->session()->put('shopping_cart', $cartArray);

              $status = '<div class="box">
              <!-- Modal -->
              <div class="modal fade" id="product-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      Product Added Success. Check Out?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Continue Shopping </button>
                      <a href="#" id="continue-to-checkout" class="btn btn-primary text-white">Yes</a>                                  
                    </div>
                  </div>
                </div>
              </div>
            </div>';
          }else{
              $array_keys = array_keys($request->session()->get('shopping_cart'));
              if(in_array($product_id,$array_keys)) {
                $status = '<div class="box">
                            <!-- Modal -->
                            <div class="modal fade" id="product-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-body">
                                    Product Added Already. Check Out?
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Continue Shopping </button>
                                  <a href="#" id="continue-to-checkout" class="btn btn-primary text-white">Yes</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>'; 
              } else {
                $request->session()->put('shopping_cart', array_merge($request->session()->get('shopping_cart'), $cartArray));
              $status = '<div class="box">
              <!-- Modal -->
              <div class="modal fade" id="product-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      Product Added. Check Out?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Continue Shopping </button>
                      <a href="#" id="continue-to-checkout" class="btn btn-primary text-white">Yes</a>                                  
                    </div>
                  </div>
                </div>
              </div>
            </div>';
          }
          
        }
      }
       $no_of_item = 0;
        foreach ($request->session()->get('shopping_cart') as $key => $value) {
          $no_of_item += $value['quantity'];
        }
        return response()->json(['success'=>$status, 'no_of_item' => $no_of_item]);
    }
    public function homePage()
    {
        $shopProducts = Products::limit(6)->orderBy('created_at', 'DESC')->get();;
        $featured_shop = Products::limit(1,7)->orderBy('created_at', 'DESC')->get();;
        $photo = Projects::limit(6)->orderBy('created_at', 'DESC')->get();
        
        return $this->frontView('index')->with('shopProducts', $shopProducts)->with('featured_shop', $featured_shop)->with('photo', $photo);        
        
      //  return $bath = SubCategories::where('cat_id', 5)->get(['sub_cat_id','name']);

    }
    public function sendEmail()
    {
      // $name = 'Krunal';
      // Mail::to('krunal@appdividend.com')->send(new SendMailable($name)); 
      // return 'Email was sent';
      $data = array('name'=>"Virat Gandhi");
      Mail::send('email.name', $data, function($message) {
         $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
         $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
         $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });
      echo "Email Sent with attachment. Check your inbox.";
    }
    public function frontView($theBladeName)
    {
        $subCategories = SubCategories::all();        
        $products = Products::where('img_path', '!=', '')->groupBy('sub_cat_id')->get(['id','sub_cat_id', 'product_name', 'thumbnail_path','description', 'img_path', 'cat_id']);
        $decor_blog = DB::table('blog')->orderBy('created_at', 'DESC')->where('cat_id', 1)->limit(1)->get();
        $outdoor_blog = DB::table('blog')->orderBy('created_at', 'DESC')->where('cat_id', 3)->limit(1)->get();

         $categories = Categories::all();
         $decor = SubCategories::where('cat_id', 1)->get(['sub_cat_id','name']);
         $home_imp = SubCategories::where('cat_id', 2)->get(['sub_cat_id','name']);
         $outdoor = SubCategories::where('cat_id', 3)->get(['sub_cat_id','name']);
         $smart_home = SubCategories::where('cat_id', 4)->get(['sub_cat_id','name']);
         $bath = SubCategories::where('cat_id', 5)->get(['sub_cat_id','name']);
         $bedroom = SubCategories::where('cat_id', 6)->get(['sub_cat_id','name']);
         $living = SubCategories::where('cat_id', 7)->get(['sub_cat_id','name']);
         $lightening = SubCategories::where('cat_id', 8)->get(['sub_cat_id','name']);

        $service_bath = ServicesSubCategory::where('cat_id', 1)->get();
        $service_bedroom = ServicesSubCategory::where('cat_id', 2)->get();
        $service_living_room = ServicesSubCategory::where('cat_id', 3)->get();
        $service_lightening = ServicesSubCategory::where('cat_id', 4)->get();


        return view($theBladeName)  
        ->with('service_living_room', $service_living_room)
        ->with('service_bedroom', $service_bedroom)
        ->with('service_bath', $service_bath)
        ->with('service_lightening', $service_lightening)
        ->with('bath', $bath)      
        ->with('bedroom', $bedroom)      
        ->with('living_room', $service_living_room)      
        ->with('lightening', $lightening)      
        ->with('categories', $categories)
        ->with('decor', $decor)
        ->with('home_imp', $home_imp)
        ->with('outdoor', $outdoor)
        ->with('smart_home', $smart_home)
        ->with('bath', $bath)
        ->with('bedroom', $bedroom)
        ->with('living', $living)
        ->with('lightening', $lightening)
        ->with('decor_blog', $decor_blog)        
        ->with('outdoor_blog', $outdoor_blog)
        ->with('products', $products)
        ->with('sub_categories', $subCategories);
    }
    public function showtheProducts($id)
    {  
      session(['/show-the-product/'. $id => url()->previous()]);
      // if (Auth::check()) { 
        $sub_cat_id = $_GET['sub_cat'];
        $products = Products::where('product_id', $id)->where('img_path','!=', '')->get();
        return $this->frontView('template.show_the_product')->with('product', $products)->with('id', $sub_cat_id);
      // }else{
      //   return redirect('login');
      // }
    }
    public function showProducts($id)
    {
       
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $this->generateTransactionId($permitted_chars, 60);
        $products = Products::where('sub_cat_id', $id)->where('img_path','!=', '')->get();
        return $this->frontView('template.show_products')->with('products', $products)->with('id', $id);
    }
    public function myDashboard(){
        // Auth::logout();
        
        return $this->frontView('client.dashboard');

    }


    public function editProfile(){
       $userInfo =  DB::table('basic_info')
                    ->where('basic_info.user_id', Auth::user()->user_id)
                    ->select(  
                        'basic_info.user_id',
                        'basic_info.first_name',
                        'basic_info.last_name',
                        'basic_info.company_name',
                        'basic_info.company_type',
                        'basic_info.address_1',
                        'basic_info.address_2',
                        'basic_info.city',
                        'basic_info.state',
                        'basic_info.country',
                        'basic_info.phone',
                        'basic_info.website',
                        'basic_info.bus_description',
                        'basic_info.cert_and_award',
                        'basic_info.cost_from',
                        'basic_info.cost_to'
                    )
                    ->get();
        return $this->frontView('client.edit_profile')->with('userInfo', $userInfo);
    }
}
