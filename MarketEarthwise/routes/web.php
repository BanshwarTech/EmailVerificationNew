<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ConfigurationController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\OrderController;
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

Route::get('/verification/{id}', [RegisterLoginController::class, 'verification'])->name('verification');
Route::post('/verified', [RegisterLoginController::class, 'verifiedOtp'])->name('verifiedOtp');
Route::get('/resend-otp', [RegisterLoginController::class, 'resendOtp'])->name('resendOtp');

Route::get('/login', [RegisterLoginController::class, 'Login']);
Route::post('/login-process', [RegisterLoginController::class, 'LoginProcess'])->name('LoginProcess');

Route::get('/logout', [RegisterLoginController::class, "Logout"])->name('Logout');

Route::get('/forgot-password', [RegisterLoginController::class, "forgotPassword"])->name("forgot.Password");
Route::post('/forgot-password-process', [RegisterLoginController::class, "forgotPasswordProcess"])->name("forgot.Password.Process");
//
Route::get('/hello', [RegisterLoginController::class, "Hello"]);
//
Route::get('/forgot-password-change/{id}', [RegisterLoginController::class, 'forgotPasswordChange']);
Route::post('forgot_password_change_process', [RegisterLoginController::class, 'forgot_password_change_process']);

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

Route::get('/razorpay-checkout', [FrontController::class, 'razorpay_checkout'])->name('razorpay.checkout');

Route::get('/order-placed', [FrontController::class, 'orderPlaced'])->name('order.placed');
Route::get('/order-fail', [FrontController::class, 'orderFail'])->name('order.failed');
Route::get('/category/{slug}', [FrontController::class, 'category'])->name('category');
Route::get('/search/{str}', [FrontController::class, 'search']);
Route::get('/blog', [FrontController::class, 'blog'])->name('blog');
// wishlist section
Route::get('/add_to_wishlist/{id}/{size}/{color}', [WishlistController::class, 'add_to_wishlist'])->name('add.to.wishlist');
Route::get('/wishlist', [WishlistController::class, "wishlist"])->name('wishlist');
Route::get('/remove/{id}', [WishlistController::class, "removeWishlist"])->name('remove.wishlist');
Route::get('/order_detail/{id}', [FrontController::class, "OrderDetails"])->name('order.detail');
// admin 
Route::get('admin', [AdminController::class, 'index'])->name('login');
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::get('admin/updatePassword', [AdminController::class, 'updatePassword']);

Route::middleware([AdminAuth::class])->group(function () {
    // Dashboard
    Route::controller(AdminController::class)->group(function () {
        Route::get('admin/dashboard', 'Dashboard')->name('Dashboard');
        Route::post('admin/profile-update', 'profileUpdate')->name('profile.update');
    });

    // HomeBanner section
    Route::prefix('admin/homebanner')->controller(HomeBannerController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('manage_homebanner', 'manage_homebanner');
        Route::get('manage_homebanner/{id}', 'manage_homebanner');
        Route::post('manage_homebanner_process', 'manage_homebanner_process')->name('homebanner.manage_homebanner_process');
        Route::get('delete/{id}', 'delete');
        Route::get('status/{status}/{id}', 'status');
    });

    // Categories section
    Route::prefix('admin/category')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('manage_category', 'manage_category');
        Route::get('manage_category/{id}', 'manage_category');
        Route::post('manage_category_process', 'manage_category_process')->name('category.manage_category_process');
        Route::get('delete/{id}', 'delete');
        Route::get('status/{status}/{id}', 'status');
    });

    // Coupons section
    Route::prefix('admin/coupon')->controller(CouponController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('manage_coupon', 'manage_coupon');
        Route::get('manage_coupon/{id}', 'manage_coupon');
        Route::post('manage_coupon_process', 'manage_coupon_process')->name('coupon.manage_coupon_process');
        Route::get('delete/{id}', 'delete');
        Route::get('status/{status}/{id}', 'status');
    });

    // Sizes section
    Route::prefix('admin/size')->controller(SizeController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('manage_size', 'manage_size');
        Route::get('manage_size/{id}', 'manage_size');
        Route::post('manage_size_process', 'manage_size_process')->name('size.manage_size_process');
        Route::get('delete/{id}', 'delete');
        Route::get('status/{status}/{id}', 'status');
    });

    // Colors section
    Route::prefix('admin/color')->controller(ColorController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('manage_color', 'manage_color');
        Route::get('manage_color/{id}', 'manage_color');
        Route::post('manage_color_process', 'manage_color_process')->name('color.manage_color_process');
        Route::get('delete/{id}', 'delete');
        Route::get('status/{status}/{id}', 'status');
    });

    // Brands section
    Route::prefix('admin/brand')->controller(BrandController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('manage_brand', 'manage_brand');
        Route::get('manage_brand/{id}', 'manage_brand');
        Route::post('manage_brand_process', 'manage_brand_process')->name('brand.manage_brand_process');
        Route::get('delete/{id}', 'delete');
        Route::get('status/{status}/{id}', 'status');
    });

    // Taxes section
    Route::prefix('admin/tax')->controller(TaxController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('manage_tax', 'manage_tax');
        Route::get('manage_tax/{id}', 'manage_tax');
        Route::post('manage_tax_process', 'manage_tax_process')->name('tax.manage_tax_process');
        Route::get('delete/{id}', 'delete');
        Route::get('status/{status}/{id}', 'status');
    });

    // Products section
    Route::prefix('admin/product')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('manage_product', 'manage_product');
        Route::get('manage_product/{id}', 'manage_product');
        Route::post('manage_product_process', 'manage_product_process')->name('product.manage_product_process');
        Route::get('delete/{id}', 'delete');
        Route::get('status/{status}/{id}', 'status');
        Route::get('product_attr_delete/{paid}/{pid}', 'product_attr_delete');
        Route::get('product_images_delete/{paid}/{pid}', 'product_images_delete');
    });

    // Banners section
    Route::prefix('admin/banner')->controller(BannerController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('manage_banner', 'manage_banner');
        Route::get('manage_banner/{id}', 'manage_banner');
        Route::post('manage_banner_process', 'manage_banner_process')->name('banner.manage_banner_process');
        Route::get('delete/{id}', 'delete');
        Route::get('status/{status}/{id}', 'status');
    });

    // Blogs section
    Route::prefix('admin/blog')->controller(BlogController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('manage_blog', 'manage_blog');
        Route::get('manage_blog/{id}', 'manage_blog');
        Route::post('manage_blog_process', 'manage_blog_process')->name('blog.manage_blog_process');
        Route::get('delete/{id}', 'delete');
        Route::get('status/{status}/{id}', 'status');
    });

    // Mail configuration
    Route::prefix('admin')->controller(ConfigurationController::class)->group(function () {
        Route::get('/mail-config', 'MailConfig')->name('Mail.Config');
        Route::post('/mail-config', "MailConfigProcess")->name("Mail.Config.Process");
        Route::get('/razor-pay', "RazorpayConfig")->name("Razorpay.Config");
        Route::post('/razor-pay', "RazorpayConfigProcess")->name("Razorpay.Config.Process");
    });

    //order section 
    Route::prefix('admin/order')->controller(OrderController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/order_detail/{id}', 'order_details');
        Route::post('/order_detail/{id}', 'update_track_detail');
        Route::get('/update_payemnt_status/{status}/{id}', 'update_payemnt_status');
        Route::get('/update_order_status/{status}/{id}', 'update_order_status');
    });

    // Logout
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('successMessage', 'Logout successfully');
        return redirect('admin');
    });
});
