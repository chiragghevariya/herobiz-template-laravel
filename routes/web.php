<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\SocialmediaController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HeadingController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\NewslaterController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\BlogController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login/loginpost', [LoginController::class, 'postlogin'])->name('login.post');

// front
Route::post('newslater/save', [HomeController::class, 'newslaterstore'])->name('newslater.store');
Route::post('contact/save', [HomeController::class, 'contactstore'])->name('contact.store');

Route::get('portfolio/{slug}', [HomeController::class, 'portfolio_details'])->name('portfolio_details');

Route::get('blog', [HomeController::class, 'blog'])->name('blog');
Route::get('blog/{slug}', [HomeController::class, 'blog_detail'])->name('blog_details');

//Admin

Route::group(['middleware' => 'checkUserisLogin', 'prefix' => 'admin'], function () {


    Route::get('/', [AdminController::class, 'index'])->name('admin');

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::any('/save_tinymce_image', [AdminController::class, 'saveTinymceImage'])->name("save_tinymce_image");

    //about

    Route::get('portfolio/get', [PortfolioController::class, 'anydata'])->name('portfolio.anydata');
    Route::any('portfolio/singleStatuschange', [PortfolioController::class, 'SingleStatusChange'])->name('portfolio.Singlestatuschange');
    Route::get('portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
    Route::get('portfolio/add', [PortfolioController::class, 'create'])->name('portfolio.create');
    Route::Post('portfolio/save', [PortfolioController::class, 'store'])->name('portfolio.store');
    Route::get('portfolio/{id}/edit', [PortfolioController::class, 'edit'])->name('portfolio.edit');
    Route::post('portfolio/{id}/saveupdate', [PortfolioController::class, 'update'])->name('portfolio.update');
    Route::any('portfolio/{id}/delete', [PortfolioController::class, 'delete'])->name('portfolio.delete');

    //blog

    Route::get('blog/get', [BlogController::class, 'anydata'])->name('blog.anydata');
    Route::any('blog/singleStatuschange', [BlogController::class, 'SingleStatusChange'])->name('blog.Singlestatuschange');
    Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('blog/add', [BlogController::class, 'create'])->name('blog.create');
    Route::Post('blog/save', [BlogController::class, 'store'])->name('blog.store');
    Route::get('blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('blog/{id}/saveupdate', [BlogController::class, 'update'])->name('blog.update');
    Route::any('blog/{id}/delete', [BlogController::class, 'delete'])->name('blog.delete');

    //service

    Route::get('service', [ServiceController::class, 'index'])->name('service.index');
    Route::get('service/get', [ServiceController::class, 'anydata'])->name('service.anydata');
    Route::any('service/singleStatuschange', [ServiceController::class, 'SingleStatusChange'])->name('service.Singlestatuschange');
    Route::get('service/add', [ServiceController::class, 'create'])->name('service.create');
    Route::Post('service/save', [ServiceController::class, 'store'])->name('service.store');
    Route::get('service/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
    Route::post('service/{id}/saveupdate', [ServiceController::class, 'update'])->name('service.update');
    Route::any('service/{id}/delete', [ServiceController::class, 'delete'])->name('service.delete');

    //Pricing

    Route::get('pricing', [PricingController::class, 'index'])->name('pricing.index');
    Route::get('pricing/get', [PricingController::class, 'anydata'])->name('pricing.anydata');
    Route::any('pricing/singleStatuschange', [PricingController::class, 'SingleStatusChange'])->name('pricing.Singlestatuschange');
    Route::get('pricing/add', [PricingController::class, 'create'])->name('pricing.create');
    Route::Post('pricing/save', [PricingController::class, 'store'])->name('pricing.store');
    Route::get('pricing/{id}/edit', [PricingController::class, 'edit'])->name('pricing.edit');
    Route::post('pricing/{id}/saveupdate', [PricingController::class, 'update'])->name('pricing.update');
    Route::any('pricing/{id}/delete', [PricingController::class, 'delete'])->name('pricing.delete');

    //SocialMedia

    Route::get('socialmedia', [SocialmediaController::class, 'index'])->name('socialmedia.index');
    Route::get('socialmedia/get', [SocialmediaController::class, 'anydata'])->name('socialmedia.anydata');
    Route::any('socialmedia/singleStatuschange', [SocialmediaController::class, 'SingleStatusChange'])->name('socialmedia.Singlestatuschange');
    Route::get('socialmedia/add', [SocialmediaController::class, 'create'])->name('socialmedia.create');
    Route::Post('socialmedia/save', [SocialmediaController::class, 'store'])->name('socialmedia.store');
    Route::get('socialmedia/{id}/edit', [SocialmediaController::class, 'edit'])->name('socialmedia.edit');
    Route::post('socialmedia/{id}/saveupdate', [SocialmediaController::class, 'update'])->name('socialmedia.update');
    Route::any('socialmedia/{id}/delete', [SocialmediaController::class, 'delete'])->name('socialmedia.delete');

    //testimonial

    Route::get('testimonial', [TestimonialController::class, 'index'])->name('testimonial.index');
    Route::get('testimonial/get', [TestimonialController::class, 'anydata'])->name('testimonial.anydata');
    Route::any('testimonial/singleStatuschange', [TestimonialController::class, 'SingleStatusChange'])->name('testimonial.Singlestatuschange');
    Route::get('testimonial/add', [TestimonialController::class, 'create'])->name('testimonial.create');
    Route::Post('testimonial/save', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('testimonial/{id}/edit', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::post('testimonial/{id}/saveupdate', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::any('testimonial/{id}/delete', [TestimonialController::class, 'delete'])->name('testimonial.delete');

    //team

    Route::get('team', [TeamController::class, 'index'])->name('team.index');
    Route::get('team/get', [TeamController::class, 'anydata'])->name('team.anydata');
    Route::any('team/singleStatuschange', [TeamController::class, 'SingleStatusChange'])->name('team.Singlestatuschange');
    Route::get('team/add', [TeamController::class, 'create'])->name('team.create');
    Route::Post('team/save', [TeamController::class, 'store'])->name('team.store');
    Route::get('team/{id}/edit', [TeamController::class, 'edit'])->name('team.edit');
    Route::post('team/{id}/saveupdate', [TeamController::class, 'update'])->name('team.update');
    Route::any('team/{id}/delete', [TeamController::class, 'delete'])->name('team.delete');

    //categories

    Route::get('categories', [CategoriesController::class, 'index'])->name('categories.index');
    Route::get('categories/get', [CategoriesController::class, 'anydata'])->name('categories.anydata');
    Route::any('categories/singleStatuschange', [CategoriesController::class, 'SingleStatusChange'])->name('categories.Singlestatuschange');
    Route::get('categories/add', [CategoriesController::class, 'create'])->name('categories.create');
    Route::Post('categories/save', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('categories/{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::post('categories/{id}/saveupdate', [CategoriesController::class, 'update'])->name('categories.update');
    Route::any('categories/{id}/delete', [CategoriesController::class, 'delete'])->name('categories.delete');

    //tag

    Route::get('tag', [TagController::class, 'index'])->name('tag.index');
    Route::get('tag/get', [TagController::class, 'anydata'])->name('tag.anydata');
    Route::any('tag/singleStatuschange', [TagController::class, 'SingleStatusChange'])->name('tag.Singlestatuschange');
    Route::get('tag/add', [TagController::class, 'create'])->name('tag.create');
    Route::Post('tag/save', [TagController::class, 'store'])->name('tag.store');
    Route::get('tag/{id}/edit', [TagController::class, 'edit'])->name('tag.edit');
    Route::post('tag/{id}/saveupdate', [TagController::class, 'update'])->name('tag.update');
    Route::any('tag/{id}/delete', [TagController::class, 'delete'])->name('tag.delete');

    //Feature

    Route::get('feature', [FeatureController::class, 'index'])->name('feature.index');
    Route::get('feature/get', [FeatureController::class, 'anydata'])->name('feature.anydata');
    Route::any('feature/singleStatuschange', [FeatureController::class, 'SingleStatusChange'])->name('feature.Singlestatuschange');
    Route::get('feature/add', [FeatureController::class, 'create'])->name('feature.create');
    Route::Post('feature/save', [FeatureController::class, 'store'])->name('feature.store');
    Route::get('feature/{id}/edit', [FeatureController::class, 'edit'])->name('feature.edit');
    Route::post('feature/{id}/saveupdate', [FeatureController::class, 'update'])->name('feature.update');
    Route::any('feature/{id}/delete', [FeatureController::class, 'delete'])->name('feature.delete');

    //logo

    Route::get('logo', [LogoController::class, 'index'])->name('logo.index');
    Route::get('logo/get', [LogoController::class, 'anydata'])->name('logo.anydata');
    Route::any('logo/singleStatuschange', [LogoController::class, 'SingleStatusChange'])->name('logo.Singlestatuschange');
    Route::get('logo/add', [LogoController::class, 'create'])->name('logo.create');
    Route::Post('logo/save', [LogoController::class, 'store'])->name('logo.store');
    Route::get('logo/{id}/edit', [LogoController::class, 'edit'])->name('logo.edit');
    Route::post('logo/{id}/saveupdate', [LogoController::class, 'update'])->name('logo.update');
    Route::any('logo/{id}/delete', [LogoController::class, 'delete'])->name('logo.delete');

    //cms

    Route::get('cms', [CmsController::class, 'index'])->name('cms.index');
    Route::get('cms/get', [CmsController::class, 'anydata'])->name('cms.anydata');
    Route::any('cms/singleStatuschange', [CmsController::class, 'SingleStatusChange'])->name('cms.Singlestatuschange');
    Route::get('cms/add', [CmsController::class, 'create'])->name('cms.create');
    Route::Post('cms/save', [CmsController::class, 'store'])->name('cms.store');
    Route::get('cms/{id}/edit', [CmsController::class, 'edit'])->name('cms.edit');
    Route::post('cms/{id}/saveupdate', [CmsController::class, 'update'])->name('cms.update');
    Route::any('cms/{id}/delete', [CmsController::class, 'delete'])->name('cms.delete');

    //faq

    Route::get('faq', [FaqController::class, 'index'])->name('faq.index');
    Route::get('faq/get', [FaqController::class, 'anydata'])->name('faq.anydata');
    Route::any('faq/singleStatuschange', [FaqController::class, 'SingleStatusChange'])->name('faq.Singlestatuschange');
    Route::get('faq/add', [FaqController::class, 'create'])->name('faq.create');
    Route::Post('faq/save', [FaqController::class, 'store'])->name('faq.store');
    Route::get('faq/{id}/edit', [FaqController::class, 'edit'])->name('faq.edit');
    Route::post('faq/{id}/saveupdate', [FaqController::class, 'update'])->name('faq.update');
    Route::any('faq/{id}/delete', [FaqController::class, 'delete'])->name('faq.delete');

    //Heading

    Route::get('heading', [HeadingController::class, 'index'])->name('heading.index');
    Route::post('heading/{id}/saveupdate', [HeadingController::class, 'update'])->name('heading.update');
    Route::post('heading/delete', [HeadingController::class, 'delete'])->name('delete.image');
    Route::post('heading/delete_quote', [HeadingController::class, 'delete_quote'])->name('delete.image_quote');
    Route::post('heading/home_imagedelete', [HeadingController::class, 'home_image_delete'])->name('delete.home_image');
    Route::post('heading/faq_imagedelete', [HeadingController::class, 'faq_image_delete'])->name('delete.faq_image');
    Route::post('heading/feature_imagedelete', [HeadingController::class, 'feature_image_delete'])->name('delete.feature_image');

    //Setting

    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::post('setting/{id}/saveupdate', [SettingController::class, 'update'])->name('setting.update');

    //contact

    Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
    Route::get('contact/get', [ContactController::class, 'anydata'])->name('contact.anydata');
    Route::any('contact/{id}/delete', [ContactController::class, 'delete'])->name('contact.delete');
    Route::any('contact/{id}/view', [ContactController::class, 'view'])->name('contact.view');

    //newslater

    Route::get('newslater', [NewslaterController::class, 'index'])->name('newslater.index');
    Route::get('newslater/get', [NewslaterController::class, 'anydata'])->name('newslater.anydata');
    Route::any('newslater/{id}/delete', [NewslaterController::class, 'delete'])->name('newslater.delete');
    Route::any('newslater/{id}/view', [NewslaterController::class, 'view'])->name('newslater.view');
});


Route::get('/{slug}', [CmsController::class, 'detail'])->name('cms.details');
