<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PortfolioController;
use App\Http\Controllers\admin\ResponseController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\VideoController;
use App\Http\Controllers\admin\VisitorController;
use App\Http\Controllers\front\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware' => ['guest', 'PreventBackHistory', 'visitors']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('front_home');
    Route::get('/contact', [HomeController::class, 'contact'])->name('front_contact');
    Route::get('/about', [HomeController::class, 'about'])->name('front_about');
    Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('front_portfolio');
    Route::get('/videos', [HomeController::class, 'video'])->name('front_video');
    Route::get('/blog', [HomeController::class, 'blog'])->name('front_blog');
    Route::get('/blog-details/{slug}', [HomeController::class, 'blogDetails'])->name('front_blog_details');
    Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('front_privacy_policy');
    Route::get('/terms-condition', [HomeController::class, 'termsCondition'])->name('front_terms_condition');
    Route::post('/add-contact', [HomeController::class, 'addContact'])->name('front_add_contact');
    //Add Review
    Route::post('/add-review', [HomeController::class, 'addReview'])->name('front_add_review');

    //Admin Login
    Route::get('/admin', [AuthController::class, 'index'])->name('admin_login');
    Route::post('/admin-login-process', [AuthController::class, 'login'])->name('admin_loginAction');
});

Route::group(['middleware' => ['auth', 'PreventBackHistory']], function () {
    Route::get('/admin-dashboard', [DashboardController::class, 'index'])->name('admin_dashboard');

    //Profile And Password Route
    Route::get('/admin-profile', [AuthController::class, 'profileForm'])->name('admin_profile');
    Route::post('/admin-profile-update', [AuthController::class, 'profileUpdate'])->name('admin_profile_update');
    Route::get('/admin-password', [AuthController::class, 'passwordForm'])->name('admin_password');
    Route::post('/admin-password-update', [AuthController::class, 'passwordUpdate'])->name('admin_password_update');
    Route::get('/admin-logout', [AuthController::class, 'logout'])->name('admin_logout');
    // Portfolio
    Route::post('/admin-portfolio-addEdit', [PortfolioController::class, 'addEdit'])->name('admin_portfolio_addEdit');
    Route::post('/admin-portfolio-edit', [PortfolioController::class, 'edit'])->name('admin_portfolio_edit');
    Route::get('/admin-portfolio-list', [PortfolioController::class, 'list'])->name('admin_portfolio_list');
    Route::post('/admin-portfolio-fetchAllList', [PortfolioController::class, 'fetchAllList'])->name('admin_portfolio_fetchAllList');
    Route::post('/admin-portfolio-status', [PortfolioController::class, 'updateStatus'])->name('admin_portfolio_status');
    Route::delete('/admin-portfolio-delete', [PortfolioController::class, 'delete'])->name('admin_portfolio_delete');
    // Blog
    Route::post('/admin-blog-addEdit', [BlogController::class, 'addEdit'])->name('admin_blog_addEdit');
    Route::post('/admin-blog-edit', [BlogController::class, 'edit'])->name('admin_blog_edit');
    Route::get('/admin-blog-list', [BlogController::class, 'list'])->name('admin_blog_list');
    Route::post('/admin-blog-fetchAllList', [BlogController::class, 'fetchAllList'])->name('admin_blog_fetchAllList');
    Route::post('/admin-blog-status', [BlogController::class, 'updateStatus'])->name('admin_blog_status');
    Route::delete('/admin-blog-delete', [BlogController::class, 'delete'])->name('admin_blog_delete');
    // Testimonial
    Route::post('/admin-testimonial-addEdit', [TestimonialController::class, 'addEdit'])->name('admin_testimonial_addEdit');
    Route::post('/admin-testimonial-edit', [TestimonialController::class, 'edit'])->name('admin_testimonial_edit');
    Route::get('/admin-testimonial-list', [TestimonialController::class, 'list'])->name('admin_testimonial_list');
    Route::post('/admin-testimonial-fetchAllList', [TestimonialController::class, 'fetchAllList'])->name('admin_testimonial_fetchAllList');
    Route::post('/admin-testimonial-status', [TestimonialController::class, 'updateStatus'])->name('admin_testimonial_status');
    Route::delete('/admin-testimonial-delete', [TestimonialController::class, 'delete'])->name('admin_testimonial_delete');
    Route::get('/admin-client-testimonial-list', [TestimonialController::class, 'clientTestimonialList'])->name('admin_client_testimonial_list');
    Route::post('/admin-client-testimonial-fetchAllList', [TestimonialController::class, 'clientTestimonialFetchAllList'])->name('admin_client_testimonial_fetchAllList');
    // Video
    Route::post('/admin-video-add', [VideoController::class, 'addEdit'])->name('admin_video_add');
    Route::post('/admin-video-edit', [VideoController::class, 'edit'])->name('admin_video_edit');
    Route::get('/admin-video-list', [VideoController::class, 'list'])->name('admin_video_list');
    Route::post('/admin-video-fetchAllList', [VideoController::class, 'fetchAllList'])->name('admin_video_fetchAllList');
    Route::post('/admin-video-status', [VideoController::class, 'updateStatus'])->name('admin_video_status');
    Route::delete('/admin-video-delete', [VideoController::class, 'delete'])->name('admin_video_delete');
    //Response
    Route::get('/admin-contact-list', [ResponseController::class, 'contactList'])->name('admin_contact_list');
    Route::post('/admin-contact-fetchAllList', [ResponseController::class, 'contactFetchAllList'])->name('admin_contact_fetchAllList');
    Route::delete('/admin-contact-delete', [ResponseController::class, 'contactDelete'])->name('admin_contact_delete');
    //Visitor
    Route::get('/admin-visitor-list', [VisitorController::class, 'visitorList'])->name('admin_visitor_list');
    Route::post('/admin-visitor-fetchAllList', [VisitorController::class, 'visitorFetchAllList'])->name('admin_visitor_fetchAllList');
    Route::delete('/admin-visitor-delete', [VisitorController::class, 'visitorDelete'])->name('admin_visitor_delete');
});
