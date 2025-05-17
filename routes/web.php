<?php

use App\Http\Controllers\Admin\Dashboard\FacilityController;
use App\Http\Controllers\Admin\Dashboard\PaymentController;
use App\Http\Controllers\Admin\Dashboard\ReviewController;
use App\Http\Controllers\Admin\Dashboard\RoomImageController;
use App\Http\Controllers\Admin\Dashboard\FaqController;
use App\Http\Controllers\Home\Booking\RoomBookingController;
use App\Http\Controllers\Home\Cart\CartController;
use App\Http\Controllers\Home\Dashboard\HomeDashboardController;
use App\Http\Controllers\Home\Order\OrderController;
use App\Http\Controllers\Admin\Dashboard\ProfileController;
use App\Http\Controllers\Admin\Dashboard\StripController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard\BookingController;
use App\Http\Controllers\Admin\Dashboard\RoomController;
use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Dashboard\PermissionController;
use App\Http\Controllers\Admin\Dashboard\SettingsController;
use App\Http\Controllers\Admin\Dashboard\ContactController;
use App\Http\Controllers\Admin\Dashboard\TeamController;
use App\Http\Controllers\Admin\Dashboard\UserController;
use App\Http\Controllers\Admin\Dashboard\UserDetailsContoller;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\Room\RoomsController;
use App\Http\Controllers\Home\Auth\ClientController;
// Frontend

//Home Page
Route::get('/', [HomeController::class, 'welcome'])->name('home');
Route::get('/faqs', [HomeController::class, 'faqs'])->name('faqs');
Route::get('/contactus', [HomeController::class, 'contactus'])->name('contactus');
Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('aboutus');
Route::get('/testimonials', [HomeController::class, 'testimonials'])->name('testimonials');
Route::get('/team-details', [HomeController::class, 'teamdetails'])->name('teamdetails');
//Room List
Route::get('/room-list', [RoomsController::class, 'roomList'])->name('roomList');
// //\\ Show Facilities
Route::get('/rooms/{id}/show', [RoomsController::class, 'show'])->name('roomFacilities.show');
// //Book Room
Route::get('/rooms/{id}/book', [RoomsController::class, 'book'])->name('roomFacilities.book');
// //Add Room To Cart
Route::post('/cart/add/', [CartController::class, 'addtoCart'])->name('rooms.submit');

//Backend
// Admin portal
Route::prefix('portal')->group(function () {
    // Auth
    //Login Page
    Route::get('/', [AdminController::class, 'login'])->name('login');
    //Login Post
    Route::post('/login-user', [AdminController::class, 'loginUser'])->name('loginUser');
    //Register Page
    Route::get('/register', [AdminController::class, 'register'])->name('register');
    //Register Post 
    Route::post('/register-user', [AdminController::class, 'registerUser'])->name('registerUser');
    //Middleware
    Route::middleware(['web', 'auth', 'checkuserrole'])->group(function () {
        //     // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        //     //Logout
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
        //     //Lockscreen
        Route::get('/lockscreen', [AdminController::class, 'lockScreen'])->name('lockscreen');
        //     //Lockscreen Post
        Route::post('/unlock', [AdminController::class, 'unlock'])->name('unlock');
        //     // RBAC routes

        //     //User Details
        Route::resource('users', UserDetailsContoller::class)->middleware('permission:manage users');

        //     //Permission Routes 
        Route::resource('permissions', PermissionController::class)->middleware('permission:manage permissions');

        //     // Show permissions for a user (PermissionController)
        Route::get('/admin/users/{user}/permissions', [PermissionController::class, 'showPermissions'])->name('admin.permissions.show');

        //     // Update user permissions (PermissionController)
        Route::put('/admin/users/{user}/permissions', [PermissionController::class, 'updatePermissions'])->name('admin.permissions.update');

        //     // Display all users (UserController)
        Route::get('usershaspermissions', [UserController::class, 'haspermissions'])->name('haspermissions');

        //     // Manage permissions for a user (UserController)
        Route::get('usershas/{userId}/permissions', [UserController::class, 'showPermissions'])->name('showPermissions');

        //     // Update user permissions (UserController)
        Route::put('usershas/{userId}/permissions', [UserController::class, 'updatePermissions'])->name('updatePermissions');

        //     // App Settings
        Route::resource('settings', SettingsController::class)->middleware('permission:manage settings');

        //     //Room Settings
        Route::resource('rooms', RoomController::class);
        Route::delete('rooms/images/{roomImage}', [RoomController::class, 'destroyImage'])->name('rooms.images.destroy');

        //Facility Settings
        Route::resource('facilities', FacilityController::class);

        //RoomImages
        Route::get('room-images/index/{room_id}', [RoomImageController::class, 'index'])->name('room-images.index');
        Route::get('room-images/create/{room_id}', [RoomImageController::class, 'create'])->name('room-images.create');
        Route::post('room-images', [RoomImageController::class, 'store'])->name('room-images.store');
        Route::delete('room-images/{roomImage}', [RoomImageController::class, 'destroy'])->name('room-images.destroy');


        Route::patch('/rooms/{room}/toggle-visibility', [RoomController::class, 'toggleShowFrontend'])
            ->name('rooms.toggle');
        //Profile Show
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
        //Profile Edit
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile/edit-post', [ProfileController::class, 'update'])->name('profile.update');
        //Password Reset
        Route::get('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
        //Password Reset 
        Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');

        //     // Team Settings
        Route::resource('teams', TeamController::class)->middleware('permission:manage teams');

        //Contact 
        Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
        //Contact Store
        Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

        //Reviews
        Route::resource('reviews', ReviewController::class)->middleware('permission:manage reviews');
        Route::resource('faqs', FaqController::class)->middleware('permission:manage faqs');
        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        //Cart Details
        Route::get('/carts', [CartController::class, 'show'])->name('cart.show');
        //Cart Remove Item
        Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
        //Cart Checkout
        Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
        //Cart Place Order
        Route::post('/checkout/place-order', [RoomBookingController::class, 'placeOrder'])->name('checkout.placeOrder');


        //Strip Payment 
        Route::post('/checkout', [StripController::class, 'createCheckoutSession'])->name('stripe.checkout');
        Route::get('/payment-success', [StripController::class, 'success'])->name('stripe.success');
        Route::get('/payment-cancel', [StripController::class, 'cancel'])->name('stripe.cancel');

        // Bookings Settings
        Route::resource('bookings', BookingController::class)->except(['create', 'store']);

        //Booking Settings
        Route::get('/order-dashboard-index', [BookingController::class, 'history'])->name('bookings.history');

        Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('bookings.my');
        Route::post('/rooms/{id}/book', [RoomsController::class, 'storeBooking'])->name('rooms.storeBooking');

        //Payments
        Route::resource('payments', PaymentController::class)->except(['create', 'store']);

    });
});