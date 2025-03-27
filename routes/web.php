<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogContoller;
use App\Http\Controllers\PortfolioController;

/**
 * FRONTEND ROUTES INDEX
 */
Route::get('/', [BlogContoller::class, 'index'])->name('home');

/**
 * FRONTEND ROUTES BLOG
 */
Route::get('/blog', [BlogContoller::class, 'blog'])->name(name: 'blog');
Route::get('/blog/search', [BlogContoller::class, 'searchPosts'])->name('blog_search_posts');
Route::get('/blog/post/{slug}', [BlogContoller::class, 'readPost'])->name('blog_read_post');
Route::get('/blog/post/category/{slug}', [BlogContoller::class, 'categoryPosts'])->name('blog_category_posts');
Route::get('/blog/post/author/{username}', [BlogContoller::class, 'authorPosts'])->name('blog_author_posts');
Route::get('/blog/post/tag/{slug}', [BlogContoller::class, 'tagPosts'])->name('blog_tag_posts');
Route::get('/contact', [BlogContoller::class, 'contactPage'])->name('contact');
Route::post('/contact', [BlogContoller::class, 'sendEmail'])->name('send_email');
Route::get('/about', [BlogContoller::class, 'aboutPage'])->name('about');
Route::get('/portfolio', [BlogContoller::class, 'portfolioPage'])->name('portfolio');
Route::get('/blog/portfolio/{slug}', [BlogContoller::class, 'readPortfolio'])->name('blog_read_portfolio');



/**
 * TESTING ROUTES
 */
Route::view('/example-page', 'example-page');
Route::view('/example-auth', 'example-auth');

/**
 * ADMIN ROUTES
 */
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest', 'preventBackHistory'])->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('/login', 'loginForm')->name('login');
            Route::post('/login', 'loginHandler')->name('login_handler');
            Route::get('/forget-password', 'forgotForm')->name('forgot');
            Route::post('/send-password-reset-link', 'sendPasswordResetLink')->name('send_password_reset_link');
            Route::get('/password/reset/{token}', 'resetForm')->name('reset_password_form');
            Route::post('/reset-password-handler', 'resetPasswordHandler')->name('reset_password_handler');
        });
    });

    Route::middleware(['auth', 'preventBackHistory'])->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'adminDashboard')->name('dashboard');
            Route::post('/logout', 'logoutHandler')->name('logout');
            Route::get('/profile', action: 'profileView')->name('profile');
            Route::post('/update-profile-picture', 'updateProfilePicture')->name('update_profile_picture');

            Route::middleware(['OnlySuperAdmin'])->group(function () {
                Route::get('/settings', 'generalSettings')->name('Settings');
                Route::post('/update-Logo', 'updateLogo')->name('update_logo');
                Route::post('/update-Favicon', 'updateFavicon')->name('update_favicon');
                Route::get('/categories', 'categoriesPage')->name('categories');
            });

        });

        Route::controller(PostController::class)->group(function () {
            Route::get('/post/new', 'addPost')->name('add_post');
            Route::post('/post/create', 'createPost')->name('create_post');
            Route::get('/post', action: 'allPosts')->name('posts');
            Route::get('/post/{id}/edit', action: 'editPost')->name('edit_post');
            Route::post('/post/update', action: 'updatePost')->name('update_post');
        });

        Route::controller(PortfolioController::class)->group(function () {
            Route::get('/portfolio/new', 'addPortfolio')->name('add_portfolio');
            Route::post('/portfolio/create', 'createPortfolio')->name('create_portfolio');
            Route::get('/portfolio', action: 'allPortfolios')->name('portfolios');
            Route::get('/portfolio/{id}/edit', action: 'editPortfolio')->name('edit_portfolio');
            Route::post('/portfolio/update', action: 'updatePortfolio')->name('update_portfolio');
        });




    });
});



