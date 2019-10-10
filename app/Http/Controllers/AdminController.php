<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Categories;
use App\SubCategories;
use App\Products;
use App\ServiceCategory;
use App\ServicesSubCategory;
use App\Services;
use App\Blog;
use App\ShopByDepartmentTransactions;
use App\ShopByDepartmentContactInfo;
use Image;

class AdminController extends Controller
{
    public function subCatForProf(){
        $categores = ServiceCategory::get(['id', 'name']);
        return view('admin.new_sub_cat_for_prof')->with('categories', $categores);
    }
    public function productDelivered($transaction_id)
    {
        ShopByDepartmentTransactions::where('transaction_Id', $transaction_id)->update(['delivered' => 'Y']);
        return back()->with('msg', 'Product Delivered Successfully.');
    }
    public function transactionProducts($transaction_id)
    {
        
        $shop_transactions_info = ShopByDepartmentContactInfo::where('transaction_id', $transaction_id)->get();
        $shop_transactions = ShopByDepartmentTransactions::where('transaction_Id', $transaction_id)->orderBy('created_at', 'DESC')->get();
        return view('admin.transaction_products')->with('shop_transactions', $shop_transactions)->with('ShopByDepartmentContactInfo', $shop_transactions_info);
    }
    public function transactions()
    {
       
        $shop_transactions = ShopByDepartmentTransactions::groupBy('transaction_Id')->orderBy('created_at', 'DESC')->get();
        return view('admin.transactions')->with('shop_transactions', $shop_transactions);
    }
    public function createNewBlog()
    {
        $categores_id = Categories::get(['id', 'name']);
        return view('admin.blog.create_new_blog')->with('categories_id', $categores_id);
    }
    public function processNewBlog(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'blog_pics' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=1200,min_height=500',
            'title' => 'required',
            'content' => 'required'
        ], [
            'category' => 'Category is required',
            'title.required' => 'Title is required',
            'content.required' => 'Content is requried',
            'blog_pics.required' => 'Picture of the product is needed',
            'blog_pics.dimensions' => 'Image width must be greater 1200px and height must be 500px'
        ]);
        $imageName = time().'.'.request()->blog_pics->getClientOriginalExtension();
        $imagePath = 'blog_pics/'. $imageName;
        request()->blog_pics->move(public_path('blog_pics'), $imageName);

        Blog::create(
            [
                'title' => $request->title, 
                'content' => $request->content,
                'img_path' => $imagePath, 
                'cat_id' => $request->category
            ]
        );
        return back()->with('msg', 'Blog created Successfully.');
    }
    public function processNewCategoryForServices(Request $request){
        ServiceCategory::create(['name' => $request->name]);
        return back()->with('msg', 'Service for Category Created Successully.');
    }
    public function newServices(){
        $categories = ServicesCategory::all();
        return view('admin.services.create_category_services')->with('categories', $categores);
    }
    public function login(){
        return view('admin.login');
    }

    public function checkCredentials(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('admin/products');
            
        }
        return back()->with('err', 'Incorrect credentials. Check and try again')->withInput(
            $request->except('password')
        );
    }

    public function dashboard(){
        return;
    }
    public function newCategory(){
        return view('admin.new_category');
    }

    public function editCategory($id){
        return view('admin.edit_category')->with('categories', Categories::find($id));
    }

    public function storeEditCategory($id, Request $request){
       Categories::where('id', $request->id)->update(['name' => $request->name]);
       return redirect()->back()->with('msg', 'Edit Completed')->withInput();
    }
    
    public function newSubCategory(){
        $categores = Categories::get(['id', 'name']);
        return view('admin.new_sub_category')->with('categories', $categores);
    }

    public function newProduct(){
        $categores_id = Categories::get(['id', 'name']);
        $sub_categores_id = SubCategories::get(['id', 'name', 'sub_cat_id']);
        return view('admin.new_product')->with('categories_id', $categores_id)->with('sub_categories_id', $sub_categores_id);
    }

    public function editSubCategory(){
        return view('admin.edit_sub_category');
    }

    public function edit_sub_category($id){
        return view('admin/edit_sub_category');
    }

    public function editProduct($id){
        return view('admin.edit_product')->with('product', Products::find($id));
    }

    public function storeEditedProduct($id, Request $request){
        // return $request->all();        
        ini_set('memory_limit','256M');
        ini_set('post_max_size','256M');


        $request->validate([
            'product_pics' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000|dimensions:width=400,height=400'
        ], [
            'product_pics.required' => 'Picture of the product is needed',
            'product_pics.dimensions' => 'Image width must be 400px and height must be 400px'
        ]);
        $imageName = time().'.'.request()->product_pics->getClientOriginalExtension();
        request()->product_pics->move(public_path('product_pics'), $imageName);

        Products::where('id', $id)->update([
                                    'cat_id' => $request->category,
                                    'sub_cat_id' => $request->sub_categories,
                                    'product_name' => $request->product_name,
                                    'price' => $request->price,
                                    'description' => $request->description,
                                    'color' => $request->color,
                                    'size' => $request->size,
                                    'model' => $request->model,
                                    'img_path' => 'product_pics/'. $imageName
                                    ]);
        return redirect()->back()->with('msg', 'Edit Completed')->withInput();
    }

    public function storeCategory(Request $request){
        $request->validate([
            'name' => 'required'

        ], [
            'name.required' => 'Category Name is required'
        ]);
        
        Categories::create(['name' => $request->name]);
        return back()->with('msg', 'Category Inserted Successfully.');
    }

    public function storeSubCatForProf(Request $request)
    { 
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $sub_cat_id = $this->generateTransactionId($permitted_chars, 30);
            $request->validate([
                'name' => 'required',
                'category' => 'required'
            ], [
                'name.required' => 'Sub Category Name is required', 
                'category.required' => 'Category is required'
            ]);            
            ServicesSubCategory::create(['name' => $request->name, 'cat_id'=> $request->category, 'prof_service_id' => $sub_cat_id]);
            return back()->with('msg', 'Category Inserted Successfully.');
    }
    public function storeSubCategory(Request $request){
                
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $sub_cat_id = $this->generateTransactionId($permitted_chars, 60);
        $request->validate([
            'name' => 'required',
            'category' => 'required'
        ], [
            'name.required' => 'Sub Category Name is required', 
            'category.required' => 'Category is required'
        ]);
        
        SubCategories::create(['name' => $request->name, 'cat_id'=> $request->category, 'sub_cat_id' => $sub_cat_id]);
        return back()->with('msg', 'Category Inserted Successfully.');
        
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
    
    public function storeProducts(Request $request){
        // dd($request->all());
           
        ini_set('memory_limit','256M');
        ini_set('post_max_size','256M');
        
        // $request->validate([
        //     'product_pics' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=8000, max_width: 1000, min_height: 500, max_height=500',
        //     'category' => 'required',
        //     'sub_categories' => 'required',
        //     'product_name' => 'required',
        //     'description' => 'required',
        //     'price' => 'required'
        // ], [
        //     'category.required' => 'Category Name is required',
        //     'product_name.required' => 'Product Name is required',
        //     'sub_categores.required' => 'Sub Category is required',
        //     'description.required' => 'Description is required',
        //     'price.required' => 'price is required',
        //     'product_pics.required' => 'Picture of the product is needed',
        //     'product_pics.dimensions' => 'Image width must be greater than 800px and less than 1000px while height must be 500px'
        // ]);
        // return $request->file('product_pics');
        $image = request()->product_pics;

        $imageName =  $this->generateTransactionId(5) .''.time().'.'. $image->getClientOriginalExtension();
        
        $thumbnails_path = public_path('products_thumbnails');
        $resize_image = Image::make($request->file('product_pics')->getRealPath());
        $resize_image->resize(100,100, function($constraints){
            $constraints->aspectRatio();
        })->save($thumbnails_path.'/'.$imageName);

        request()->product_pics->move(public_path('product_pics'), $imageName);


        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        Products::create([
            'cat_id' => $request->category,
            'product_id' => $this->generateTransactionId($permitted_chars, 60),
            'sub_cat_id' => $request->sub_categories,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'description' => $request->description,
            'color' => $request->color,
            'size' => $request->size,
            'model' => $request->model,
            'img_path' => 'product_pics/'. $imageName,
            'thumbnail_path' => 'products_thumbnails/'. $imageName
            ]);
            return back()->with('msg', 'Product Inserted Successfully.');
    }


    public function categories(){
         $categories = Categories::all();
        return view('admin.categories')->with('categories', $categories);

    }
    public function subCategories(){
         $sub_categories = SubCategories::all();
        return view('admin.sub_categories')->with('sub_categories', $sub_categories);

    }

    public function products(){
        $products = Products::all();
        $categories = Categories::all();
        $sub_categories = SubCategories::all();
        return view('admin.products')->with('products', $products)->with('categories', $categories)->with('subCategories', $sub_categories);
    }

    public function destroyProduct($id){
         $product = Products::find($id);
        $product->delete();
        return redirect()->back()->with('msg', 'Product Deleted');

    }

    public function destroyCategory($id){
        $category = Categories::find($id);
        $product = Products::where('cat_id', $id)->delete();
        $category->delete();
        return redirect()->back()->with('msg', 'Category Deleted');

    }
}
