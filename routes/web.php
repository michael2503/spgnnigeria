<?php

use App\Http\Controllers\Admin\AdminAppointmentController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminGalleryController;
use App\Http\Controllers\Admin\AdminManagerController;
use App\Http\Controllers\Admin\AuthAdminController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Guest\BlogController;
use App\Http\Controllers\Guest\GalleryController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Guest\ServiceController;
use App\Http\Controllers\Guest\TurningPointController;
use App\Http\Controllers\User\AccountSettingsController;
use App\Http\Controllers\User\SessionController;
use Illuminate\Support\Facades\Route;

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


Route::group(['prefix' => '/'], function(){
    Route::controller(HomeController::class)->group(function(){
        Route::get('/', 'index');
        Route::group(['prefix' => 'about'], function(){
            Route::get('/our-core-value', 'aboutCoreValue')->name('aboutCoreValue');
            Route::get('/spgn', 'aboutSpgn')->name('aboutSpgn');
            Route::get('/founder', 'aboutFounder')->name('aboutFounder');
            Route::get('/our-team', 'ourTeam')->name('ourTeam');
        });
        Route::get('/contact-us', 'contact')->name('contact');
        Route::get('/faq', 'faq')->name('faq');
        Route::post('/submit-contact-info', 'submitContactForm')->name('submitContactForm');
    });

    Route::group(['prefix' => 'turning-point'], function(){
        Route::controller(TurningPointController::class)->group(function(){
            Route::get('/', 'turnPointIndex')->name('turnPointIndex');
            Route::get('/2022', 'turningPoint2022')->name('turningPoint2022');
            Route::get('/2020', 'turningPoint2020')->name('turningPoint2020');
            Route::get('/2019', 'turningPoint2019')->name('turningPoint2019');
            Route::get('/2018', 'turningPoint2018')->name('turningPoint2018');
            Route::get('/sponsorship', 'sponsorship')->name('sponsorship');
            Route::get('/founder', 'turnPointFounder')->name('turnPointFounder');
        });
    });

    Route::group(['prefix' => 'services'], function(){
        Route::controller(ServiceController::class)->group(function(){
            Route::get('/psychological-services', 'psychologicalServices')->name('psychologicalServices');
            Route::get('/therapy-approach', 'therapyApproach')->name('therapyApproach');
            Route::get('/training-conferences', 'trainingConferences')->name('trainingConferences');
            Route::get('/operation-eeed-the-needy', 'operationFeedTheNeedy')->name('operationFeedTheNeedy');
            Route::group(['prefix' => 'empowerment'], function(){
                Route::get('/mentorship-scheme', 'mentorshipScheme')->name('mentorshipScheme');
                Route::get('/entrepreneurship', 'entrepreneurship')->name('entrepreneurship');
                Route::get('/skill-acquisition', 'skillAcquisition')->name('skillAcquisition');
                Route::get('/spgn-addon', 'spgnAddon')->name('spgnAddon');
            });
        });
    });


    Route::group(['prefix' => 'gallery'], function(){
        Route::controller(GalleryController::class)->group(function(){
            // Route::get('/photo', 'photoView')->name('photoView');
            Route::get('/photo/{cat}', 'photoView')->name('photoViewWithCat');
            Route::get('/video', 'videoView')->name('videoView');
        });
    });


    Route::group(['prefix' => 'blog'], function(){
        Route::controller(BlogController::class)->group(function(){
            Route::get('/', 'blogView')->name('blogView');
            Route::get('/category/{url}', 'blogByCategory')->name('blogByCategory');
            Route::get('/{id}/{slug}', 'blogDetails')->name('blogDetails');
            Route::post('/submit-comment', 'submitComment')->name('submitComment');
            Route::get('/like/submit/{blogID}', 'submitLike')->name('submitLike');
        });
    });

    Route::group(['prefix' => 'content-manager'], function(){
        Route::controller(ContentController::class)->group(function(){
            Route::get('/email-template', 'emailTemplateView')->name('emailTemplateView');
            Route::get('/email-template/edit/{id}', 'editEmailTemView')->name('editEmailTemView');
            Route::post('/email-template/update/submit', 'submitUpdatedEmail')->name('submitUpdatedEmail');

            Route::group(['prefix' => 'slider'], function(){
                Route::get('/', 'sliderView')->name('sliderView');
                Route::post('/add', 'submitAddedSlide')->name('submitAddedSlide');
                Route::get('/edit/{id}', 'editSliderView')->name('editSliderView');
                Route::put('/submit-updated', 'submitUpdateSlide')->name('submitUpdateSlide');
                Route::post('/delete', 'deleteSlide')->name('deleteSlide');

            });
        });
    });

    Route::group(['prefix' => 'password'], function(){
        Route::controller(ForgotPasswordController::class)->group(function(){
            Route::post('/verify-email', 'submitEmailForPassword')->name('submitEmailForPassword');
            Route::get('/verify-code', 'confirmCode')->name('confirmCode');
            Route::post('/verify-code/submit', 'submitCode')->name('submitCode');
        });
        Route::controller(ResetPasswordController::class)->group(function(){
            Route::get('/reset/new-password', 'passwordResetView')->name('passwordResetView');
            Route::post('/reset-new-password', 'submitPassword')->name('submitPassword');
        });
    });



    Route::controller(AdminGalleryController::class)->group(function(){
        Route::get('/run-this', 'testRun');
    });


});

Auth::routes();





Route::group(['prefix' => 'user'], function(){
    Route::controller(SessionController::class)->group(function(){
        Route::group(['prefix' => 'session'], function() {
            Route::get('/book', 'bookASessionView')->name('bookASessionView');
            Route::get('/', 'sessionView')->name('sessionView');
            Route::post('/book/submit', 'submitSession')->name('submitSession');
            Route::get('/details/{appID}', 'sessionDetails')->name('sessionDetails');
            Route::post('/cancel', 'cancelAppointment')->name('cancelAppointment');
        });
    });

    Route::controller(AccountSettingsController::class)->group(function(){
        Route::get('/overview', 'userOverview')->name('userOverview');
        Route::group(['prefix' => 'account-settings'], function() {
            Route::get('/change-password', 'userChangePassword')->name('userChangePassword');
            Route::post('/change-password/submit', 'userChangePasswordSubmit')->name('userChangePasswordSubmit');
        });
    });
});


Route::group(['prefix' => 'administrator', 'namespace' => 'Admin'], function () {
    Route::get('/', [AuthAdminController::class, 'getLogin'])->name('adminLogin');
    Route::get('/login', [AuthAdminController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [AuthAdminController::class, 'postLogin'])->name('adminLoginPost');
    Route::post('/logout', [AuthAdminController::class, 'postLogout'])->name('adminLogoutPost');
});

// Route::group(['prefix' => 'administrator', 'namespace' => 'administrator'], function () {
//     Route::controller(AuthAdminController::class)->group(function(){
//         // Route::get('/', 'getLogin')->name('adminLogin');
//         // Route::get('/login', 'getLogin')->name('adminLogin');
//         Route::post('/login', 'postLogin')->name('adminLoginPost');
//         // Route::post('/logout', 'postLogout')->name('adminLogoutPost');
//         // Route::get('/forgot-password', 'forgotPassView')->name('forgotPassView');
//         // Route::post('/verify-email', 'submitPassEmail')->name('submitPassEmail');
//         // Route::get('/verify-token', 'verifyCodeView')->name('verifyCodeView');
//         // Route::post('/verify-token/submit', 'submitVerifyCode')->name('submitVerifyCode');
//         // Route::get('/new-password', 'resetPasswordView')->name('resetPasswordView');
//         // Route::post('/new-password/update', 'submitRestPassword')->name('submitRestPassword');
//     });
// });


Route::group(['prefix' => 'administrator'], function () {
    Route::middleware('adminauth:admin')->group(function() {
        Route::controller(AuthAdminController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('adminDashboard');
        });

        Route::controller(AdminAppointmentController::class)->group(function () {
            Route::get('/appointments', 'adminAppointView')->name('adminAppointView');
            Route::get('/appointment/details/{appID}', 'appointmentDetails')->name('appointmentDetails');
            Route::post('/appointment/cancel', 'adminCancelAppointment')->name('adminCancelAppointment');
            Route::get('/appointment/edit/{appID}', 'adminEditAppointment')->name('adminEditAppointment');
            Route::post('/appointment/update/submit', 'adminSubmitUpdate')->name('adminSubmitUpdate');
        });

        Route::controller(GeneralSettingController::class)->group(function () {
            Route::group(['prefix' => 'general-settings'], function() {
                Route::get('/website', 'websiteSettingView')->name('websiteSettingView');
                Route::put('/website/update', 'updateWebSettings')->name('updateWebSettings');
                Route::get('/social-link', 'socialLinkView')->name('socialLinkView');
                Route::post('/social-link/add', 'submitAddedLink')->name('submitAddedLink');
                Route::post('/social-link/delete', 'deleteSocailLink')->name('deleteSocailLink');
                Route::put('/social-link/update', 'updateSocailLink')->name('updateSocailLink');
            });
        });

        Route::controller(AdminManagerController::class)->group(function () {
            Route::group(['prefix' => 'admin-manager'], function() {
                Route::get('/', 'adminView')->name('adminView');
                Route::get('/add', 'addAdminView')->name('addAdminView');
                Route::post('/submit-add', 'submitAddAdmin')->name('submitAddAdmin');
                Route::get('/single/{id}', 'singleAdminView')->name('singleAdminView');
                Route::post('/delete-admin', 'deleteAdmin')->name('deleteAdmin');
                Route::put('/submit-update', 'submitUpdatedAdmin')->name('submitUpdatedAdmin');

                //account setings
                Route::get('/account-settings', 'accountSettingView')->name('accountSettingView');
                Route::put('/account-settings/update', 'submitEditProfile')->name('submitEditProfile');
                Route::get('/account-settings/change-password', 'changePasswordView')->name('changePasswordView');
                Route::post('/account-settings/change-password/submit', 'submitRestpass')->name('submitRestpass');
            });
        });

        Route::controller(AdminGalleryController::class)->group(function () {
            Route::group(['prefix' => 'gallery'], function() {
                // Route::get('/photo', 'adminPhotoView')->name('adminPhotoView');
                Route::get('/photo/{cat}', 'adminPhotoView')->name('adminPhotoViewCat');

                Route::get('/video', 'adminVideoView')->name('adminVideoView');
                Route::post('/video/upload', 'uploadVideo')->name('uploadVideo');
                Route::post('/video/delete', 'deleteVideoGallery')->name('deleteVideoGallery');

                Route::post('/photo/delete', 'deletePhotoGallery')->name('deletePhotoGallery');
                Route::post('/photo/upload', 'uploadPhoto')->name('uploadPhoto');


                Route::get('/category', 'galleryCatgoryView')->name('galleryCatgoryView');
                Route::post('/category/add', 'submitGalleryCategory')->name('submitGalleryCategory');
                Route::put('/category/update', 'updateGalleryCategory')->name('updateGalleryCategory');
                Route::post('/category/delete', 'deleteGalleryCategory')->name('deleteGalleryCategory');
            });
        });

        Route::controller(AdminBlogController::class)->group(function () {
            Route::group(['prefix' => 'blog'], function() {
                // Route::get('/photo', 'adminPhotoView')->name('adminPhotoView');
                Route::get('/', 'adminblogView')->name('adminblogView');
                Route::get('/blog/category', 'getBlogCat')->name('getBlogCat');
                Route::post('/blog/category/submit', 'submitAddedcat')->name('submitAddedcat');
                Route::put('/blog/category/update', 'updateBlogCat')->name('updateBlogCat');
                Route::post('/blog/category/delete', 'deleteBlogCat')->name('deleteBlogCat');
                Route::get('/add', 'addBlogView')->name('addBlogView');
                Route::post('/main/delete/blog', 'deleteAdminBlog')->name('deleteAdminBlog');
                Route::get('/edit/{id}', 'blogSingle')->name('blogSingle');
                Route::post('/add/submit', 'submitAddedBlog')->name('submitAddedBlog');
                Route::put('/add/update', 'submitUpdatedBlog')->name('submitUpdatedBlog');
                Route::get('/comments/{blogID}', 'viewComments')->name('viewComments');
                Route::get('/comments/edit/{commID}', 'editCommentView')->name('editCommentView');
                Route::post('/comments/delete', 'deleteComment')->name('deleteComment');
                Route::post('/comments/edit/submit', 'updateThiscomment')->name('updateThiscomment');
            });
        });



    });
});







