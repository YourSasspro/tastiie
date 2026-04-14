<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Admin\Newsletter\NewsletterSubController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ProductReviewController;
use App\Http\Controllers\User\SettingsController;
use App\Models\ProductReview;

Route::controller(SocialiteController::class)
    ->group(function () {

        // Google Auth
        Route::get('/auth/google', 'redirectToGoogle')->name('auth.google');
        Route::get('/auth/google-callback', 'handleGoogleCallback');
    });

Route::middleware(['auth', 'verified'])
    ->group(function () {
        // add to cart
        Route::resource('carts', CartController::class);
        //CART REMOVE
        Route::delete('/cart/delete/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

        // checkout routes
        Route::controller(CheckoutController::class)
            ->group(function () {
                
                // checkout routes
                Route::get('checkout', 'index')->name('checkout');
                Route::post('checkout/store', 'store')->name('checkout.store');
                // stripe success route
                Route::get('checkout/stripe/success', 'stripeSuccess')->name('checkout.stripe.success');
                // stripe cancel route
                Route::get('checkout/stripe/cancel', 'stripeCancel')->name('checkout.stripe.cancel');
        });

        Route::controller(OrderController::class)
            ->group(function () {
                // orders routes
                Route::get('orders', 'index')->name('orders.index');
                Route::get('orders/{id}', 'show')->name('orders.show');
                Route::get('orders/{id}/download-pdf', 'downloadPdf')->name('orders.download-pdf');
        });

        Route::get('setting/profile',[SettingsController::class,'profile'])->name('user.setting.profile');
        // profile image
        Route::post('setting/profile/update-image',[SettingsController::class,'updateProfileImage'])->name('user.setting.profile.update-image');

        Route::post('add-product-review',[ProductReviewController::class,'addProductReview'])->name('add.product.review');



    });

// Newsletter Subscription
Route::controller(NewsletterSubController::class)
    ->group(function () {

        // Subscribe newsletter
        Route::post('/newsletter-subscription', 'subscribe')
            ->name('newsletter.subscribe');
    });
// Default Routes
Route::get('faqs', [HomeController::class,'faqs'])->name('faqs.index');

Route::get('blogs', [HomeController::class,'blogs'])->name('blogs.index');

Route::get('/filter-products', [HomeController::class, 'filterProducts'])->name('filter.products');

Route::get('/filter-products-by-preferences', [HomeController::class, 'filterProductsByPreferences'])->name('filter.products.by.preferences');

// get product review

Route::get('product/{id}/review', [ProductReviewController::class, 'getproductReview'])->name('product.review');

// about us page
Route::get('who-we-are', [HomeController::class,'whoWeAre'])->name('who.we.are');

// privacy policy
Route::get('privacy-policy', [HomeController::class,'privacyPolicy'])->name('privacy.policy');

// terms and condition
Route::get('terms-and-conditions', [HomeController::class,'termsAndConditions'])->name('terms.and.conditions');

Route::get('become-a-leader', [HomeController::class,'becomeALeader'])->name('become.a.leader');

Route::get('contact-us', [HomeController::class,'contactUs'])->name('contact.us');

Route::post('contact-us',[HomeController::class,'contactUsStore'])->name('contact.us.store');
Route::delete('contact-us/{id}',[HomeController::class,'contactUsDelete'])->name('contact.us.delete');
