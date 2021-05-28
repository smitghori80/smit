<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Controllers;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\AdministratorProductsController;




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


Auth::routes(); 

//Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('front/home');
});

Route::get('/about', function () {
    return view('front/about');
});

Route::get('/shop', function () {
    return view('front/shop');
});

Route::get('/admin', function () {
    return view('admin/index');
});



// Route::get('/admin/create', function () {
//     return view('admin/product/create');
// });

Route::get('/contact', function () {
    return view('front/contact');
});
Route::get('/product_detils/{id}',   [HomeController::class, 'product_details']);
Route::get('/new',   [Controller::class, 'product_details']);


Route::get('/cart', [cartController::class, 'index'])->name('index');


 Route::get('/home', [HomeController::class, 'index'])->name('home');
 Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
 Route::put('/cart/update/{id}',[CartController::class, 'update'])->name('update');

 Route::get('/contact', [HomeController::class, 'contact'])->name('contactus');
 Route::get('/cart/addItem/{id}',[HomeController::class, 'product_details'])->name('product_details');
 Route::get('/cart/addItem/{id}',[CartController::class, 'addItem'])->name('addItem');
//  Route::get('/cart/addItem/{id}',[CartController::class, 'addItem'])->name('addItem');

Route::get('/formvalidate', [CheckoutController::class, 'formvalidate'])->name('formvalidate');

Route::get('/cart/remove/{id}',[CartController::class, 'destroy'])->name('destroy');

Route::get('/checkout',[CheckoutController::class, 'index'])->name('index');

Route::get('/admin/create/',[AdminController::class, 'create'])->name('create');

// Route::get('/admin/login',[AdminController::class, 'login'])->name('login');

 Route::group(['middleware'=>['auth','admin']],
function()
{
    Route::get('/admin/delete',[AdminController::class, 'delete'])->name('delete');

    Route::get('/admin',[AdminController::class, 'profile'])->name('profile');

Route::get('/admin/profile',[AdminController::class, 'profile'])->name('profile');

Route::get('/admin/{id}',[AdminController::class, 'info'])->name('info');
Route::get('/admin/status/{id}',[AdminController::class, 'status'])->name('status');
Route::post('/statusn',[AdminController::class, 'statusn'])->name('statusn');

Route::post('product/in',[ProductsController::class, 'in'])->name('in');

    
        

// Route::POST('/admin/store',[AdminController::class,'store']);
// Route::get('/category',[ProductsController::class,'create']);
// 
Route::get('/products/{name}',[HomeController::class,'searc']);
Route::POST('search',[HomeController::class,'search']);


// Route::get('/admin',[AdminController::class,'index']);
// Route::get('/category',CategoriesController::class);

Route::get('/admin/user',[AdminController::class, 'index'])->name('index');
Route::get('/order',[AdminController::class, 'order'])->name('order');

      Route::resource('/product','ProductsController');
}
);

Route::group(['middleware'=>['auth','administrator']],
function()
{
    Route::get('/administrator',function(){
        return view('administrator.index');
        })->name('administrator.index');
Route::get('/administrator/customer',[AdministratorController::class, 'customer'])->name('customer');
Route::get('/administrator/order',[AdministratorController::class, 'order'])->name('order');
Route::get('/administrator/status/{id}',[AdministratorController::class, 'status'])->name('status');

Route::get('/administrator/seller',[AdministratorController::class, 'seller'])->name('seller');

Route::get('/administrator/details/{id}',[AdministratorController::class, 'details'])->name('details');

Route::post('/statusn',[AdministratorController::class, 'statusn'])->name('statusn');
    
Route::resource('/administrator/category','CategoriesController');
        

// Route::POST('/admin/store',[AdminController::class,'store']);
// Route::get('/category',[ProductsController::class,'create']);
// 

// Route::get('/admin',[AdminController::class,'index']);
// Route::get('/category',CategoriesController::class);


      Route::resource('/administratorproduct','AdministratorProductsController');
}
);

Route::group(['middleware'=>'auth'],
function()
{
Route::get('/checkout',[CheckoutController::class, 'index'])->name('index');
Route::post('/formvalidate',[CheckoutController::class, 'formvalidate'])->name('formvalidate');
Route::get('/orders',[ProfileController::class, 'orders'])->name('orders');
Route::get('/address',[ProfileController::class, 'address'])->name('address');
Route::get('/password',[ProfileController::class, 'Password'])->name('Password');
Route::post('/updatePassword',[ProfileController::class, 'updatePassword'])->name('updatePassword');
Route::post('/updateAddress',[ProfileController::class, 'updateAddress'])->name('updateAddress');


Route::get('/thankyou',function()
{
return view('/profile.thankyou');
});
Route::get('/profile',function()
{
return view('/profile.index');
});
    
    // Route::POST('/admin/store','AdminController');

    //   Route::get('/admin','AdminController');
}
);



Route::get('logout',[\App\Http\Controllers\Auth\LoginController::class,'logout']);