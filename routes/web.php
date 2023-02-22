<?php


use App\Http\Controllers\Dashboard\AboutUsController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\ContactUsController;
use App\Http\Controllers\Dashboard\GenegralSettingController;
use App\Http\Controllers\Dashboard\GroupController;
use App\Http\Controllers\Dashboard\HeaderFeatureGroupController;
use App\Http\Controllers\Dashboard\NotificationsController;
use App\Http\Controllers\Dashboard\OurWorkController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\TeamController;
use App\Http\Controllers\Dashboard\TermsConditionsController;
use App\Http\Controllers\Dashboard\CustomerReviewController;
use App\Http\Controllers\Dashboard\MediaController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Frontend\NebrasHomeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


Route::fallback(function (){
    return redirect()->route('front.home');
});

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::controller(NebrasHomeController::class)->group(function (){
        Route::get('/','index')->name('front.home');
        Route::get('services','services')->name('front.services');
        Route::get('service-details/{id}','serviceDetails')->name('front.services.show');
        Route::get('team','team')->name('front.team');
        Route::get('team-details/{id}','teamDetails')->name('front.team.show');
        Route::get('media','media')->name('front.media');
        Route::get('group','group')->name('front.group');
        Route::get('works','works')->name('front.works');
        Route::get('work-details/{id}','workDetails')->name('front.works.show');
    });

    Route::post('contact/store',[ContactUsController::class,'store'])->name('contactUs.store');


//    Route::fallback(function (){
//        return redirect()->route('admin.home');
//    });


    Route::group(['prefix' => 'admin'],function (){
        Route::name('admin.')->group(function (){
            Route::group(['controller'=>AuthController::class],function(){
                Route::get('','index')->name('login')->middleware('guest');
                Route::post('','login')->name('startSession');
            });

            Route::group(['middleware' => 'auth'],function (){
                Route::get('home',[HomeController::class,'index'])->name('home');
                Route::get('destroy',[AuthController::class,'logout'])->name('logout');
                Route::post('permission/add',[RolesController::class,'add_permission'])->name('add_permission');
                Route::group(['prefix'=>'general_settings','controller' => GenegralSettingController::class],function (){
                   Route::get('manage','generalSettings')->name('generalSetting.index');
                   Route::post('store','store')->name('generalSetting.store');
                });

                Route::resources([
                    
                    'roles' => RolesController::class,
                    'services' => ServiceController::class,
                    'teams' => TeamController::class,
                    'review' => CustomerReviewController::class,
                    'customers' => UserController::class,
                    'groups' => GroupController::class,
                    'works' => OurWorkController::class,
                    'media' => MediaController::class,

                ]);


                Route::controller(UserController::class)->group(function (){
                    Route::get('customers/{user}/changeStatus','changeStatus');
                    Route::get('users','users')->name('users.getUsers');
                    Route::get('admins','admin_index')->name('admins.index');
                    Route::get('admins/create','admin_create')->name('admins.create');
                    Route::post('admins/store','admin_store')->name('admins.store');
                    Route::get('admins/{admin}/edit','admin_edit')->name('admins.edit');
                    Route::put('admins/{admin}/update','admin_update')->name('admins.update');
                    Route::get('admins/{admin}/changeStatus','admin_changeStatus')->name('admins.changeStatus');
                });

                Route::group(['prefix'=>'contact-us','controller'=>ContactUsController::class],function (){
                    Route::get('','index')->name('contact.index');
                    Route::get('manage','manage')->name('contact.manage');
                    Route::post('setting/store','settingStore')->name('contact.settings.store');
                    Route::delete('{contactUs}','destroy')->name('contact.destroy');
                });

                Route::group(['prefix'=>'about-us','controller'=>AboutUsController::class],function (){
                    Route::get('manage','manage')->name('aboutUs.manage');
                    Route::post('settings/store','settingStore')->name('aboutUs.setting.store');
                });

                Route::group(['prefix'=>'header','controller'=>HeaderFeatureGroupController::class],function (){
                    Route::get('manage/slider','manageSlider')->name('header.manage.slider');
                    Route::post('store/slider','storeSlider')->name('header.slider.store');
                    Route::get('manage/feature','manageFeature')->name('header.manage.feature');
                    Route::post('store/feature','storeFeature')->name('header.feature.store');
                });
                Route::group(['prefix'=>'terms','controller'=>TermsConditionsController::class],function (){
                    Route::get('ar','index')->name('terms.index_ar');
                    Route::get('en','index')->name('terms.index_en');
                    Route::post('','save')->name('terms.save');
                });

                Route::group(['prefix'=>'profile','controller'=>AuthController::class],function (){
                    Route::get('','profile')->name('profile');
                    Route::put('{user}/update','update_profile')->name('users.update.profile');
                });

                Route::get('notifications/read-all',[NotificationsController::class,'readAll'])->name('notifications.read_all');
                Route::get('notifications/{notification}/read',[NotificationsController::class,'read'])->name('notifications.read');
                Route::patch('/fcm-token', [NotificationsController::class, 'updateToken'])->name('fcmToken');


            });
        });
    });
});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
