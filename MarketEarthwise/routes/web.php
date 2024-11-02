<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\TaxController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\RegisterLoginController;
use App\Http\Controllers\Front\WishlistController;
use App\Http\Middleware\AdminAuth;
use App\Models\Admin\Banner;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', [RegisterLoginController::class, 'Register'])->name('Register');
Route::post('/register', [RegisterLoginController::class, 'RegisterProcess'])->name('RegisterProcess');

Route::get('/verification/{id}', [RegisterLoginController::class, 'verification']);
Route::post('/verified', [RegisterLoginController::class, 'verifiedOtp'])->name('verifiedOtp');
Route::get('/resend-otp', [RegisterLoginController::class, 'resendOtp'])->name('resendOtp');

Route::get('/login', [RegisterLoginController::class, 'Login']);
Route::post('/login-process', [RegisterLoginController::class, 'LoginProcess'])->name('LoginProcess');

Route::get('/logout', [RegisterLoginController::class, "Logout"])->name('Logout');
Route::get('/my-account', [RegisterLoginController::class, 'myAccount'])->name('myAccount');
Route::post('/update-account-details', [RegisterLoginController::class, 'updateAccountDetails'])->name('update.AccountDetails');

Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/about-us', [FrontController::class, 'aboutUs'])->name('aboutUs');
Route::get('/contact-us', [FrontController::class, 'contactUs'])->name('contactUs');
Route::get('/shop', [FrontController::class, 'shop'])->name('shop');

Route::get('/product-details/{slug}', [FrontController::class, 'productdetails'])->name('product.details');
Route::post('/add_to_cart', [FrontController::class, 'add_to_cart'])->name('add.to.cart');
Route::get('/cart', [FrontController::class, 'cart'])->name('cart');
Route::get('/checkout', [FrontController::class, 'checkout'])->name('checkout');
Route::post('/apply-coupon-code', [FrontController::class, 'apply_coupon_code'])->name('apply_coupon_code');
Route::post('/remove_coupon_code', [FrontController::class, 'remove_coupon_code']);
Route::post('/place-order', [FrontController::class, 'placeOrder'])->name('place.order');
Route::get('/order-placed', [FrontController::class, 'orderPlaced'])->name('order.placed');
Route::get('/category/{slug}', [FrontController::class, 'category'])->name('category');
Route::get('/search/{str}', [FrontController::class, 'search']);
Route::get('/blog', [FrontController::class, 'blog'])->name('blog');
// wishlist section
Route::get('/add_to_wishlist/{id}/{size}/{color}', [WishlistController::class, 'add_to_wishlist'])->name('add.to.wishlist');
Route::get('/wishlist', [WishlistController::class, "wishlist"])->name('wishlist');
Route::get('/remove/{id}', [WishlistController::class, "removeWishlist"])->name('remove.wishlist');

// admin 
Route::get('admin', [AdminController::class, 'index']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::get('admin/updatePassword', [AdminController::class, 'updatePassword']);

Route::middleware([AdminAuth::class])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'Dashboard'])->name('Dashboard');
    // homebanner section
    Route::get('admin/homebanner', [HomeBannerController::class, 'index']);
    Route::get('admin/homebanner/manage_homebanner', [HomeBannerController::class, 'manage_homebanner']);
    Route::get('admin/homebanner/manage_homebanner/{id}', [HomeBannerController::class, 'manage_homebanner']);
    Route::post('admin/homebanner/manage_homebanner_process', [HomeBannerController::class, 'manage_homebanner_process'])->name('homebanner.manage_homebanner_process');
    Route::get('admin/homebanner/delete/{id}', [HomeBannerController::class, 'delete']);
    Route::get('admin/homebanner/status/{status}/{id}', [HomeBannerController::class, 'status']);
    // categories section
    Route::get('admin/category', [CategoryController::class, 'index']);
    Route::get('admin/category/manage_category', [CategoryController::class, 'manage_category']);
    Route::get('admin/category/manage_category/{id}', [CategoryController::class, 'manage_category']);
    Route::post('admin/category/manage_category_process', [CategoryController::class, 'manage_category_process'])->name('category.manage_category_process');
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);
    Route::get('admin/category/status/{status}/{id}', [CategoryController::class, 'status']);
    // coupons section
    Route::get('admin/coupon', [CouponController::class, 'index']);
    Route::get('admin/coupon/manage_coupon', [CouponController::class, 'manage_coupon']);
    Route::get('admin/coupon/manage_coupon/{id}', [CouponController::class, 'manage_coupon']);
    Route::post('admin/coupon/manage_coupon_process', [CouponController::class, 'manage_coupon_process'])->name('coupon.manage_coupon_process');
    Route::get('admin/coupon/delete/{id}', [CouponController::class, 'delete']);
    Route::get('admin/coupon/status/{status}/{id}', [CouponController::class, 'status']);
    // size section
    Route::get('admin/size', [SizeController::class, 'index']);
    Route::get('admin/size/manage_size', [SizeController::class, 'manage_size']);
    Route::get('admin/size/manage_size/{id}', [SizeController::class, 'manage_size']);
    Route::post('admin/size/manage_size_process', [SizeController::class, 'manage_size_process'])->name('size.manage_size_process');
    Route::get('admin/size/delete/{id}', [SizeController::class, 'delete']);
    Route::get('admin/size/status/{status}/{id}', [SizeController::class, 'status']);
    // color section
    Route::get('admin/color', [ColorController::class, 'index']);
    Route::get('admin/color/manage_color', [ColorController::class, 'manage_color']);
    Route::get('admin/color/manage_color/{id}', [ColorController::class, 'manage_color']);
    Route::post('admin/color/manage_color_process', [ColorController::class, 'manage_color_process'])->name('color.manage_color_process');
    Route::get('admin/color/delete/{id}', [ColorController::class, 'delete']);
    Route::get('admin/color/status/{status}/{id}', [ColorController::class, 'status']);

    // brand section 
    Route::get('admin/brand', [BrandController::class, 'index']);
    Route::get('admin/brand/manage_brand', [BrandController::class, 'manage_brand']);
    Route::get('admin/brand/manage_brand/{id}', [BrandController::class, 'manage_brand']);
    Route::post('admin/brand/manage_brand_process', [BrandController::class, 'manage_brand_process'])->name('brand.manage_brand_process');
    Route::get('admin/brand/delete/{id}', [BrandController::class, 'delete']);
    Route::get('admin/brand/status/{status}/{id}', [BrandController::class, 'status']);
    //tax section 
    Route::get('admin/tax', [TaxController::class, 'index']);
    Route::get('admin/tax/manage_tax', [TaxController::class, 'manage_tax']);
    Route::get('admin/tax/manage_tax/{id}', [TaxController::class, 'manage_tax']);
    Route::post('admin/tax/manage_tax_process', [TaxController::class, 'manage_tax_process'])->name('tax.manage_tax_process');
    Route::get('admin/tax/delete/{id}', [TaxController::class, 'delete']);
    Route::get('admin/tax/status/{status}/{id}', [TaxController::class, 'status']);

    // product section
    Route::get('admin/product', [ProductController::class, 'index']);
    Route::get('admin/product/manage_product', [ProductController::class, 'manage_product']);
    Route::get('admin/product/manage_product/{id}', [ProductController::class, 'manage_product']);
    Route::post('admin/product/manage_product_process', [ProductController::class, 'manage_product_process'])->name('product.manage_product_process');
    Route::get('admin/product/delete/{id}', [ProductController::class, 'delete']);
    Route::get('admin/product/status/{status}/{id}', [ProductController::class, 'status']);
    Route::get('admin/product/product_attr_delete/{paid}/{pid}', [ProductController::class, 'product_attr_delete']);
    Route::get('admin/product/product_images_delete/{paid}/{pid}', [ProductController::class, 'product_images_delete']);
    //banner section
    Route::get('admin/banner', [BannerController::class, 'index']);
    Route::get('admin/banner/manage_banner', [BannerController::class, 'manage_banner']);
    Route::get('admin/banner/manage_banner/{id}', [BannerController::class, 'manage_banner']);
    Route::post('admin/banner/manage_banner_process', [BannerController::class, 'manage_banner_process'])->name('banner.manage_banner_process');
    Route::get('admin/banner/delete/{id}', [BannerController::class, 'delete']);
    Route::get('admin/banner/status/{status}/{id}', [BannerController::class, 'status']);

    //logout
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('successMessage', 'Logout sucessfully');
        return redirect('admin');
    });
});
