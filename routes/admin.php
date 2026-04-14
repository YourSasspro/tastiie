<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\Admin\CMS\FAQsController;
use App\Http\Controllers\Admin\Blogs\BlogController;
use App\Http\Controllers\Admin\CMS\SectionController;
use App\Http\Controllers\Admin\Blogs\BlogCategoryController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Newsletter\NewsletterSubController;
use App\Http\Controllers\Admin\Notifications\NotificationController;
use App\Http\Controllers\Admin\Orders\OrderController;
use App\Http\Controllers\Admin\Products\ProductController;
use App\Http\Controllers\Admin\Settings\SettingsController;
use App\Http\Controllers\Admin\Transactions\TransactionController;
use App\Http\Controllers\Admin\UserAccessControl\PermissionsController;
use App\Http\Controllers\Admin\UserAccessControl\RolesController;
use App\Http\Controllers\Admin\UserManagement\UserControllers;

Route::prefix('administrator')
    ->middleware(['auth', 'verified', 'isSuperAdmin'])
    ->group(function () {

        // Dashboard Routes
        Route::controller(DashboardController::class)
            ->group(function () {
                Route::get('/dashboard', 'index')->name('admin.dashboard.index');
                Route::get('/contacts','contactIndex')->name('admin.contacts.index');
            });
        // Cms Routes
        Route::prefix('content-management')->as('cms.')->group(function () {
            Route::controller(SectionController::class)
                ->group(function () {
                    Route::get('/landing-page', 'getLandingPage')->name('landing-page.index');
                    Route::put('/landing-page', 'updateLandingPage')->name('landing-page.update');

                    // who we are
                    Route::get('/who-we-are', 'getWhoWeAre')->name('who-we-are.index');
                    Route::put('/who-we-are', 'updateWhoWeAre')->name('who-we-are.update');

                    // become a leader 
                    Route::get('/become-a-leader', 'getBecomeALeader')->name('become-a-leader.index');
                    Route::put('/become-a-leader', 'updateBecomeALeader')->name('become-a-leader.update');

                    // blog page
                    Route::get('/blog-page', 'getBlogPage')->name('blog-page.index');
                    Route::put('/blog-page', 'updateBlogPage')->name('blog-page.update');

                    // privacy policy
                    Route::get('/privacy-policy', 'getPrivacyPolicy')->name('privacy-policy.index');
                    Route::put('/privacy-policy', 'updatePrivacyPolicy')->name('privacy-policy.update');

                    // terms and conditions
                    Route::get('/terms-and-conditions', 'getTermsAndConditions')->name('terms-and-conditions.index');
                    Route::put('/terms-and-conditions', 'updateTermsAndConditions')->name('terms-and-conditions.update');
                });

            // faqs
            Route::resource('faqs', FAQsController::class);
        });

        Route::as('admin.')->group(function () {
            // Admin Sidebar Routes

            Route::resource('categories', CategoryController::class);

            Route::resource('products', ProductController::class);

            // blog categories
            Route::resource('blog-categories', BlogCategoryController::class);

            Route::resource('blogs', BlogController::class);

            // orders
            Route::resource('orders',OrderController::class);

            Route::post('orders/update/status/{id}',[OrderController::class,'changeStatus'])->name('orders.update.status');

            Route::get('orders/{id}/download-pdf', [OrderController::class,'downloadPdf'])->name('orders.download-pdf');

            // transactions
            Route::get('transactions',[TransactionController::class,'index'])->name('transactions.index');
        });

        // category

        // ckeditor image upload route
        Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');


        // User Management Routes
        Route::resource('users', UserControllers::class);

        // User Access Control Routes
        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);

        // Newsletters Routes
        Route::controller(NewsletterSubController::class)
            ->group(function () {
                Route::get('newsletters', 'index')->name('newsletters.index');
                Route::get('view-email', 'viewEmail')->name('view.email');
                Route::post('send-newsletter',  'sendMail')->name('send.newsletter');
                Route::delete('remove-sub-email/{id}', 'destroy')->name('remove.sub.email');
                Route::get('unsubscribe-email/{email}', 'unsubscribeEmail')->name('unsubscribe.email')
                    ->withoutMiddleware(['auth', 'verified']);
            });


        // Settings Routes
        Route::controller(SettingsController::class)
            ->prefix('settings')
            ->group(function () {
                // General Site Settings
                Route::get('general', 'gereralSetting')
                    ->name('setting.general');
                Route::post('general', 'updateGeneralSetting')
                    ->name('setting.general.update');

                // Social Links Settings
                Route::get('social', 'socialSetting')
                    ->name('setting.social');
                Route::post('social', 'updateSocialSetting')
                    ->name('setting.social.update');
                Route::delete('social/{socialLink}', 'deleteSocialSetting')
                    ->name('setting.social.delete');

                // Profile Settings
                Route::get('profile', 'profileSetting')
                    ->name('setting.profile');
                Route::post('profile', 'updateProfileImage')
                    ->name('setting.profile.image.update');
            });

        Route::controller(NotificationController::class)
            ->group(function () {
                Route::get('notifications', 'index')->name('notifications.index');
                Route::post('mark-as-read', 'markAsRead')->name('mark.as.read');
                Route::get('mark-all-as-read', 'markAllAsRead')->name('mark.all.as.read');
            });
     
    });
