<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', [PagesController::class,'frontpage'])->name('frontpage');

Route::get('/admin/login', [AdminAuthController::class,'getLogin'])->name('login-admin');
Route::post('/admin/login', [AdminAuthController::class,'postLogin'])->name('login.admin.submit');
Route::get('/admin/logout', [AdminAuthController::class,'postLogout'])->name('logout.admin');

// Admin
Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/admin', [AdminController::class,'dashboard'])->name('dashboard.admin');
    Route::get('/admin/profile', [AdminController::class,'profile'])->name('profile.admin');
    Route::get('/admin/change-password', [AdminController::class,'changePassword'])->name('admin.change-password');
    Route::post('/admin/change-password', [AdminController::class,'savePassword']);
    Route::get('/admin/users', [AdminController::class,'userIndex'])->name('user.index');
    Route::get('/admin/user/{id}/edit', [AdminController::class,'userEdit']);
    Route::post('/admin/user', [AdminController::class,'userUpdate'])->name('user.update');
    Route::get('/admin/user/{id}/delete', [AdminController::class,'userDelete'])->name('user.delete');
    Route::get('/admin/services', [AdminController::class,'servicesIndex'])->name('services.index');
    Route::get('/admin/services/add', [AdminController::class,'servicesAdd'])->name('services.add');
    Route::post('/admin/services/add', [AdminController::class,'servicesStore'])->name('services.store');
    Route::get('/admin/services/{id}/edit', [AdminController::class,'servicesEdit'])->name('services.edit');
    Route::post('/admin/services/{id}/edit', [AdminController::class,'servicesUpdate'])->name('services.update');
    Route::get('/admin/services/{id}/delete', [AdminController::class,'servicesDelete'])->name('services.delete');
    Route::get('/admin/features', [AdminController::class,'featuresIndex'])->name('features.index');
    Route::get('/admin/features/add', [AdminController::class,'featuresAdd'])->name('features.add');
    Route::post('/admin/features/add', [AdminController::class,'featuresStore'])->name('features.store');
    Route::get('/admin/features/{id}/edit', [AdminController::class,'featuresEdit'])->name('features.edit');
    Route::post('/admin/features/{id}/edit', [AdminController::class,'featuresUpdate'])->name('features.update');
    Route::get('/admin/features/{id}/delete', [AdminController::class,'featuresDelete'])->name('features.delete');
    Route::get('/admin/pages', [AdminController::class,'pagesIndex'])->name('page.index');
    Route::get('/admin/pages/add', [AdminController::class,'pagesAdd'])->name('page.add');
    Route::post('/admin/pages/add', [AdminController::class,'pagesStore'])->name('page.store');
    Route::get('/admin/pages/{id}/edit', [AdminController::class,'pagesEdit'])->name('page.edit');
    Route::post('/admin/pages/{id}/edit', [AdminController::class,'pagesUpdate'])->name('page.update');
    Route::get('/admin/pages/{id}/delete', [AdminController::class,'pagesDelete'])->name('page.delete');
    Route::get('/admin/news', [AdminController::class,'newsIndex'])->name('news.index');
    Route::get('/admin/news/add', [AdminController::class,'newsAdd'])->name('news.add');
    Route::post('/admin/news/add', [AdminController::class,'newsStore'])->name('news.store');
    Route::get('/admin/news/{id}/edit', [AdminController::class,'newsEdit'])->name('news.edit');
    Route::post('/admin/news/{id}/edit', [AdminController::class,'newsUpdate'])->name('news.update');
    Route::get('/admin/news/{id}/delete', [AdminController::class,'newsDelete'])->name('news.delete');
    Route::get('/admin/testimonials', [AdminController::class,'testimonialsIndex'])->name('testimonial.index');
    Route::get('/admin/testimonials/add', [AdminController::class,'testimonialsAdd'])->name('testimonial.add');
    Route::post('/admin/testimonials/add', [AdminController::class,'testimonialsStore'])->name('testimonial.store');
    Route::get('/admin/testimonials/{id}/edit', [AdminController::class,'testimonialsEdit'])->name('testimonial.edit');
    Route::post('/admin/testimonials/{id}/edit', [AdminController::class,'testimonialsUpdate'])->name('testimonial.update');
    Route::get('/admin/testimonials/{id}/delete', [AdminController::class,'testimonialsDelete'])->name('testimonial.delete');
    Route::get('/admin/options', [AdminController::class,'optionsIndex'])->name('options.index');
    Route::get('/admin/options/{id}/edit', [AdminController::class,'optionsEdit'])->name('options.edit');
    Route::post('/admin/options/{id}/edit', [AdminController::class,'optionsUpdate'])->name('options.update');

    Route::get('/admin/contacts', [AdminController::class,'contactsIndex'])->name('contacts.index');
    Route::get('/admin/contacts/{id}/delete', [AdminController::class,'contactsDelete'])->name('contacts.delete');
});

// User
Route::group(['middleware' => ['auth:user']], function () {
    Route::get('/user', [UserController::class,'dashboard'])->name('user.dashboard');
    Route::get('/user/profile', [UserController::class,'profileUser'])->name('user.profile');
    Route::post('/user/profile', [UserController::class,'saveprofileUser']);
    Route::get('/user/change-password', [UserController::class,'ChangePassword'])->name('user.change-password');
    Route::post('/user/change-password', [UserController::class,'SavePassword']);
    Route::get('/user/services', [AdminController::class,'servicesIndex'])->name('services.index');
    Route::get('/user/services/add', [AdminController::class,'servicesAdd'])->name('services.add');
    Route::post('/user/services/add', [AdminController::class,'servicesStore'])->name('services.store');
    Route::get('/user/services/{id}/edit', [AdminController::class,'servicesEdit'])->name('services.edit');
    Route::post('/user/services/{id}/edit', [AdminController::class,'servicesUpdate'])->name('services.update');
    Route::get('/user/services/{id}/delete', [AdminController::class,'servicesDelete'])->name('services.delete');
    Route::get('/user/features', [AdminController::class,'featuresIndex'])->name('features.index');
    Route::get('/user/features/add', [AdminController::class,'featuresAdd'])->name('features.add');
    Route::post('/user/features/add', [AdminController::class,'featuresStore'])->name('features.store');
    Route::get('/user/features/{id}/edit', [AdminController::class,'featuresEdit'])->name('features.edit');
    Route::post('/user/features/{id}/edit', [AdminController::class,'featuresUpdate'])->name('features.update');
    Route::get('/user/features/{id}/delete', [AdminController::class,'featuresDelete'])->name('features.delete');
    Route::get('/user/pages', [AdminController::class,'pagesIndex'])->name('page.index');
    Route::get('/user/pages/add', [AdminController::class,'pagesAdd'])->name('page.add');
    Route::post('/user/pages/add', [AdminController::class,'pagesStore'])->name('page.store');
    Route::get('/user/pages/{id}/edit', [AdminController::class,'pagesEdit'])->name('page.edit');
    Route::post('/user/pages/{id}/edit', [AdminController::class,'pagesUpdate'])->name('page.update');
    Route::get('/user/pages/{id}/delete', [AdminController::class,'pagesDelete'])->name('page.delete');
    Route::get('/user/news', [AdminController::class,'newsIndex'])->name('news.index');
    Route::get('/user/news/add', [AdminController::class,'newsAdd'])->name('news.add');
    Route::post('/user/news/add', [AdminController::class,'newsStore'])->name('news.store');
    Route::get('/user/news/{id}/edit', [AdminController::class,'newsEdit'])->name('news.edit');
    Route::post('/user/news/{id}/edit', [AdminController::class,'newsUpdate'])->name('news.update');
    Route::get('/user/news/{id}/delete', [AdminController::class,'newsDelete'])->name('news.delete');
    Route::get('/user/testimonials', [AdminController::class,'testimonialsIndex'])->name('testimonial.index');
    Route::get('/user/testimonials/add', [AdminController::class,'testimonialsAdd'])->name('testimonial.add');
    Route::post('/user/testimonials/add', [AdminController::class,'testimonialsStore'])->name('testimonial.store');
    Route::get('/user/testimonials/{id}/edit', [AdminController::class,'testimonialsEdit'])->name('testimonial.edit');
    Route::post('/user/testimonials/{id}/edit', [AdminController::class,'testimonialsUpdate'])->name('testimonial.update');
    Route::get('/user/testimonials/{id}/delete', [AdminController::class,'testimonialsDelete'])->name('testimonial.delete');
});

Route::get('/login', [UserLoginController::class,'showLoginForm'])->name('login');
Route::post('/login', [UserLoginController::class,'login'])->name('user.login.submit');
Route::get('/logout', [UserLoginController::class,'logout'])->name('logout');
Route::get('/register', [UserRegisterController::class,'showRegisterForm'])->name('user.register');
Route::post('/register', [UserRegisterController::class,'register'])->name('user.register.submit');
Route::get('services', [ServicesController::class,'index'])->name('services.index');
Route::get('services/{slug}', [ServicesController::class,'details'])->name('services.details');
Route::get('news', [NewsController::class,'index'])->name('news');
Route::get('news/{slug}', [NewsController::class,'details'])->name('news.details');
Route::get('about', [PagesController::class,'about'])->name('about');
Route::get('contact', [PagesController::class,'contact'])->name('contact');
Route::post('contact', [PagesController::class,'submitContact'])->name('submit.contact');
Route::get('{slug}', [PagesController::class,'pages']);