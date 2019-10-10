<?php
/**
 * Template Controller
 * 
 * it controls the interface of the website.
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidateEmailPassword;
use App\Http\Requests\ValidateBasicInfo;
use Illuminate\Support\Facades\Input;
use App\Users;
use App\BasicInfo;
use App\BusinessDetail;
use App\ServicesProvided;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\ServiceCategory;
use App\Services;
use App\Categories;
use App\Products;
use App\ServicesSubCategory;
use App\States;
class TemplateController extends Controller
{
    public function aboutUuloh()
    {
        $categories = Categories::all();
        $decor = SubCategories::where('cat_id', 1)->get(['id','name']);
        $home_imp = SubCategories::where('cat_id', 2)->get(['id','name']);
        $outdoor = SubCategories::where('cat_id', 3)->get(['id','name']);
        $smart_home = SubCategories::where('cat_id', 4)->get(['id','name']);
        $bath = SubCategories::where('cat_id', 5)->get(['id','name']);
        $bedroom = SubCategories::where('cat_id', 6)->get(['id','name']);
        $living = SubCategories::where('cat_id', 7)->get(['id','name']);
        $lightening = SubCategories::where('cat_id', 8)->get(['id','name']);
       return view('template.about')
       ->with('categories', $categories)
       ->with('decor', $decor)
       ->with('home_imp', $home_imp)
       ->with('outdoor', $outdoor)
       ->with('smart_home', $smart_home)
       ->with('bath', $bath)
       ->with('bedroom', $bedroom)
       ->with('living', $living)
       ->with('lightening', $lightening);;
    }
    public function index()
    {
        return view('index');
    }

    public function signUp(){
        return view('template.signup');
    }
    public function processlogin(Request $request){
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            //  return redirect()->intended();
             return redirect(session('link'))->withInput($request->all());
         }
         return back()->with('err', 'Incorrect credentials. Check and try again')->withInput(
             $request->except('password')
         );
    }
    public function login(){
        session(['link' => url()->previous()]);
        return view('template.login');
    }
    public function proccessEmailPassword(ValidateEmailPassword $request){
        
        // Validate input
         $validated = $request->validated();        
        if (Users::where('email', '=', $request->get('email'))->count() > 0) {
            return back()->withInput(
                $request->except('password')
            )->with('err', 'Email already exists');
        }

        // Store input in a session
        $request->session()->put('email', $request->email);
        $request->session()->put('password', Hash::make($request->password));


        // Users::create(['email' => $request->email, 'password' => Hash::make($request->password)]);
        $states = States::all();
        return view('template.basicInformation')->with('states', $states);
    }

    public function servicesProvided(Request $request){

         // Validate input
         if(empty(Input::get('company_type'))){
            return back()->withInput()->with('err', 'Company Type is required');
         }
         
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address_1' => 'required',
            'phone' => 'required|max:14|min:5',
            'city' => 'required',
            'state' => 'required',
        ], [
            'first_name.required' => 'First Name is required',
            'last_name.required' => 'Last Name is required',
            'address_1.required' => 'Address is required',
            'phone.required' => 'Phone is required and a maximum of 13',
            'city.required' => 'City is required',
            'state.required' => 'State is required'
        ]);

        // Add input to session
        $request->session()->put('company_name', $request->company_name);   
        $request->session()->put('first_name', $request->first_name);
        $request->session()->put('last_name', $request->last_name);
        $request->session()->put('company_type', $request->company_type);
        $request->session()->put('address_1', $request->address_1);
        $request->session()->put('address_2', $request->address_2);
        $request->session()->put('phone', $request->phone);
        $request->session()->put('city', $request->city);
        $request->session()->put('state', $request->state);
        $request->session()->put('country', $request->country);

        $services_provided =  ServicesSubCategory::where('cat_id', 1)->get();
        $bedroom =  ServicesSubCategory::where('cat_id', 2)->get();
        $sitting_room =  ServicesSubCategory::where('cat_id', 3)->get();
        $bath_room =  ServicesSubCategory::where('cat_id', 4)->get();


        return view('template.servicesProvided')
        ->with('services_provided', $services_provided)
        ->with('bedroom', $bedroom)
        ->with('sitting_room', $sitting_room)
        ->with('bath_room', $bath_room);
    }

    public function businessDetail(Request $request){
        
        if(empty(Input::get('services'))){
            return back()->withInput()->with('err', 'The Serice you provide is required');
         }
        $request->session()->put('services', $request->services);

        return view('template.businessDetail');
    }

    public function processBusinessDetail(Request $request){
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $date = substr(date("YmdHisu"), 0, -3);
        
            $user_id = 'user-'. $date.''. $this->generateTransactionId($permitted_chars, 10);
            
          // Check if user exist and redirect to login
          if (Users::where('email', '=', $request->session()->get('email'))->count() > 0) {
            return redirect('login');
          }

        if ($request->cost_from > $request->cost_to) {
            return back()->withInput()->with('err', 'Cost from is greater and cost to');
        }
             $basicId = BasicInfo::create([
                'user_id' => $user_id,
                'company_type' => $request->session()->get('company_type'),
                'company_name' => $request->session()->get('company_name'),
                'first_name' => $request->session()->get('first_name'),
                'last_name' => $request->session()->get('last_name'),
                'address_1' => $request->session()->get('address_1'),   
                'address_2' => $request->session()->get('address_2'),
                'phone' => $request->session()->get('phone'),
                'city' => $request->session()->get('city'),
                'state' => $request->session()->get('state'),
                'country' => $request->session()->get('country'),
                'website' => $request->website,
                'bus_description' => $request->business_description,
                'cert_and_award' => $request->cert_and_award,
                'cost_from' => $request->cost_from,
                'cost_to' =>  $request->cost_to
            ])->id;
            foreach( $request->session()->get('services') as $key => $value){
                $servicesProvided = ServicesProvided::create([
                    'user_id' => $user_id,
                    'prof_services_id' =>  $value
                ]);
            }
            $user_id = Users::create([
                'email' =>  $request->session()->get('email'),
                'user_id' => $user_id,
                'password' =>  $request->session()->get('password')
                ])->id;
        return view('template.registrationCompleted');
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
    
    public function editedProcessBusinessDetail($id, Request $request){
        // return $request->all();
        $costRange = $request->cost_from . ' - ' . $request->cost_to;
        
        BasicInfo::where('user_id', $id)->update([
                    'website' => $request->website,
                    'bus_description' => $request->business_description,
                    'cert_and_award' => $request->cert_and_award
                ]);
       return redirect()->back()->with('msg', 'Edit Completed');

    }

    public function editedProcessBasicInfo(Request $request){
       
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $image = request()->profile_picture;
        $date = substr(date("YmdHisu"), 0, -3);           
        $ext = $image->getClientOriginalExtension();
        $image_path = '/profile_pics/';
        $img_name = 'img-'. $date. ''. $this->generateTransactionId($permitted_chars, 5). '.'. $ext;
        $profile_pics_link = $image_path.''.$img_name;
        $image->move(public_path().''.$image_path, $img_name);  


        $cover_pics = request()->cover_picture;
        $date = substr(date("YmdHisu"), 0, -3);
        $ext = $cover_pics->getClientOriginalExtension();
        $cover_image_path = '/cover_pics/';
        $cover_img_name = 'img-'. $date. ''. $this->generateTransactionId($permitted_chars, 5). '.'. $ext;
        $cover_pics_link = $cover_image_path.''.$cover_img_name;
        $cover_pics->move(public_path().''.$cover_image_path, $cover_img_name);  

         // Validate input
         if(empty(Input::get('company_type'))){
            return back()->withInput()->with('err', 'Company Type is required');
         }
// return 1;
        $basicId = BasicInfo::where('user_id', Auth::user()->user_id)->update([
            'company_type' => $request->get('company_type'),
            'company_name' => $request->get('company_name'),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'address_1' => $request->get('address_1'),
            'address_2' => $request->get('address_2'),
            'phone' => $request->get('phone'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
            'country' => $request->get('country'),
            'profile_pics_link' => $profile_pics_link,
            'cover_pics_link' => $cover_pics_link
        ]);
        return redirect()->back()->with('msg', 'Edit Completed');

    }

    public function submenuItems($fileName)
    {
        
        $categories = Categories::all();
        $decor = Products::where('cat_id', 1)->get(['id','product_name']);
        $home_imp = Products::where('cat_id', 2)->get(['id','product_name']);
        $outdoor = Products::where('cat_id', 3)->get(['id','product_name']);
        $smart_home = Products::where('cat_id', 4)->get(['id','product_name']);
        $bath = Products::where('cat_id', 5)->get(['id','product_name']);
        $bedroom = Products::where('cat_id', 6)->get(['id','product_name']);
        $living = Products::where('cat_id', 7)->get(['id','product_name']);
        $lightening = Products::where('cat_id', 8)->get(['id','product_name']);
       return view($fileName)
       ->with('categories', $categories)
       ->with('decor', $decor)
       ->with('home_imp', $home_imp)
       ->with('outdoor', $outdoor)
       ->with('smart_home', $smart_home)
       ->with('bath', $bath)
       ->with('bedroom', $bedroom)
       ->with('living', $living)
       ->with('lightening', $lightening);
       
    }
    public function copyrightAndTrademarkPolicy()
    {
       return $this->submenuItems('template.copyright_and_trademark_policy');
        
    }
    public function cancellationAndMissingItem()
    {
       return $this->submenuItems('template.cancellation_and_missing_item');
    }
    public function damagedAndDefectiveItems()
    {
       return $this->submenuItems('template.damaged_and_defective_items');
    }
    public function returnAndRefund()
    {
       return $this->submenuItems('template.return_and_refund');
    }
    public function termsAndConditions()
    {   
       return $this->submenuItems('template.terms_and_conditions');        
    }
}
