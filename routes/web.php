<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*------------------Template Controller------------*/

Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay'); 

Route::get('/', 'ClientController@homePage');
Route::get('/login', 'TemplateController@login');
Route::get('/sign-up', 'TemplateController@signup');
Route::get('/about-uuloh', 'TemplateController@aboutUuloh');
Route::get('/copyright-and-trademark-policy', 'TemplateController@copyrightAndTrademarkPolicy');
Route::get('/cancellation-and-missing-item', 'TemplateController@cancellationAndMissingItem');
Route::get('/damaged-and-defective-items', 'TemplateController@damagedAndDefectiveItems');
Route::get('/return-and-refund', 'TemplateController@returnAndRefund');
Route::get('/terms-and-conditions', 'TemplateController@termsAndConditions');





Route::get('/basic-information', 'TemplateController@proccessEmailPassword');
Route::get('/services-provided', 'TemplateController@servicesProvided');
Route::get('/business-detail', 'TemplateController@businessDetail');
Route::get('/process-businessDetail', 'TemplateController@processBusinessDetail');
Route::get('/edit-process-businessDetail/{i}', 'TemplateController@editedProcessBusinessDetail');
Route::post('/edit-basic-info', 'TemplateController@editedProcessBasicInfo');

Route::get('/login', 'TemplateController@login');
Route::post('/process-login', 'TemplateController@processLogin');

Route::get('/logout', function(){
    Session::flush();
    return redirect('/')->with(Auth::logout());

    // return redirect('login');
});




/*------------------Client Controller------------*/
// Route::group(['middleware' => ['authenticate']], function () {
    Route::get('/my-dashboard', 'ClientController@myDashboard');
    Route::get('/new-project', 'ClientController@newProject');
    Route::post('/new-project', 'ClientController@storeProject');
    Route::get('/profile/edit/{id}', 'ClientController@editProfile');
// });

Route::group(['prefix' => 'products'], function () {
    Route::get('/{i}', 'ClientController@showProducts');
    Route::get('/show-the-product/{i}', 'ClientController@showtheProducts');
    Route::post('/cart', 'ClientController@cart');
    Route::get('/cart/show-cart', 'ClientController@showCart');
    Route::get('/cart/update-cart', 'ClientController@updateCart');
    Route::get('/payment/shipping-information', 'ClientController@shippingInformation');
    Route::get('/payment/billing-information', 'ClientController@billingInformation');
    Route::post('/payment/order-review', 'ClientController@orderReview');
    Route::get('/cart/remove-product', 'ClientController@removeProduct');
    Route::get('/cart/remove-product', 'ClientController@removeProduct');
    Route::get('/cart/register-product', 'ClientController@registerProduct');
    Route::post('/search/search-products', 'ClientController@searchProduct');
    
});

Route::get('admin/logout', function(){
    Session::flush();
    return redirect('/admin/login')->with(Auth::logout());

});
Route::post('/admin/login', 'AdminController@login')->name('login');
Route::get('/admin/login', 'AdminController@login');
Route::post('admin/check-credentials', 'AdminController@checkCredentials');

/*--------------------Admin Controller ------------------*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', 'AdminController@dashboard');
    Route::get('/create-new-product', 'AdminController@newProduct');

    //blog
    Route::get('/create-new-blog', 'AdminController@createNewBlog');
    Route::post('/create-new-blog', 'AdminController@processNewBlog');


    Route::get('/create-new-category-services', 'AdminController@newCategoryForServices');
    Route::post('/create-new-category-services', 'AdminController@processNewCategoryForServices');

    Route::get('/category-for-services', 'AdminController@CategoryForServices');


    Route::get('/create-new-services', 'AdminController@newServices');
    Route::get('/services', 'AdminController@services');


    Route::get('/edit-product', 'AdminController@editProduct');
    Route::get('/create-new-sub-category', 'AdminController@newSubCategory');
    Route::get('/edit-sub-category', 'AdminController@editSubCategory');
    Route::get('/create-new-category', 'AdminController@newCategory');
    Route::get('/edit-category', 'AdminController@editCategory');
    Route::get('/create-new-sub-category-for-professionals', 'AdminController@subCatForProf');
    Route::post('/store-sub-category-for-services', 'AdminController@storeSubCatForProf');




    Route::post('/create-new-category', 'AdminController@storeCategory');
    Route::post('/store-sub-category', 'AdminController@storeSubCategory');
    Route::post('/store-products', 'AdminController@storeProducts');

    

    Route::post('/edit-category', 'UserProfileController@show');

    Route::get('/categories', 'AdminController@categories');
    Route::get('/sub-categories', 'AdminController@subCategories');
    Route::get('/products', 'AdminController@products');

    // Delete
    Route::get('/products/delete/{i}', 'AdminController@destroyProduct');
    Route::get('/category/delete/{i}', 'AdminController@destroyCategory');

    // Edit
    Route::get('/products/edit/{i}', 'AdminController@editProduct');
    Route::post('/products/edit/{i}', 'AdminController@storeEditedProduct');
    Route::get('/category/edit/{i}', 'AdminController@editCategory');
    Route::post('/category/edit/{i}', 'AdminController@storeEditCategory');

    // Transactions
    Route::get('/transactions', 'AdminController@transactions');
    Route::get('/transactions/{i}', 'AdminController@transactionProducts');
    Route::get('/transactions/{i}', 'AdminController@transactionProducts');
    Route::get('/product/delivered/{i}', 'AdminController@productDelivered');

    
});
Route::group(['prefix' => 'professionals'], function () {
    Route::get('bath/{i}', 'ClientController@getProfessionals');
    Route::get('/bedroom/{i}', 'ClientController@getProfessionals');
    Route::get('/living-room/{i}', 'ClientController@getProfessionals');
    Route::get('/lightening/{i}', 'ClientController@getProfessionals');
    Route::get('/search', 'ClientController@searchForProfessionals');
});

Route::group(['prefix' => 'photo'], function () {
    Route::get('bath/{i}', 'ClientController@getPhotos');
    Route::get('/bedroom/{i}', 'ClientController@getPhotos');
    Route::get('/living-room/{i}', 'ClientController@getPhotos');
    Route::get('/lightening/{i}', 'ClientController@getPhotos');
});

Route::get('/photo/{i}', 'ClientController@getPhotoo');
Route::get('/upload-photo', 'ClientController@uploadPhoto');

Route::get('/pro/user-profile/{i}', 'ClientController@userProfile');
Route::get('/pro/user-profile/projects-pictures/{i}', 'ClientController@userProjects');



Route::post('/send-my-quote', 'ClientController@getAQuote');
Route::post('/contact_professional', 'ClientController@contactProfessional');
Route::post('/upload/store-photo', 'ClientController@storePhoto');


Route::get('send-photo-to-email', 'ClientController@sendEmail');
Route::get('project/save-to-ideaboook/{i}', 'ClientController@saveToIdeaBook');
Route::get('ideabook', 'ClientController@showIdeaBook');



