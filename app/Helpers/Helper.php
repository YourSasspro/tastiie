<?php

use App\Models\GeneralSetting;
use App\Models\SocialLinks;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Spatie\Permission\Commands\Show;

/**
 * Get the Admin Sidebar Routes
 *
 * @param void
 * @return array
 */

if (!function_exists('adminSidebarRoutes')) {
    function adminSidebarRoutes()
    {
        return  [
            // Dashboard
            [
                'label' => trans('gen.dashboard'),
                'icon'  => 'fa-tachometer-alt',
                'link'  => route('admin.dashboard.index'),
                'active' => getCurrentRouteName() === 'admin.dashboard.index',
            ],
            // category
            [
                'label' => trans('gen.category'),
                'icon'  => 'bi bi-box',
                'link'  => route('admin.categories.index'),
                'active' => getCurrentRouteName() === 'admin.categories.index' || getCurrentRouteName() === 'admin.categories.create' || getCurrentRouteName() === 'admin.categories.edit',
            ],
            // products
            [
                'label' => trans('gen.products'),
                'icon'  => 'bi bi-box-fill',
                'link'  => route('admin.products.index'),
                'active' => getCurrentRouteName() === 'admin.products.index' || getCurrentRouteName() === 'admin.products.create' || getCurrentRouteName() === 'admin.products.edit',
            ],
            // orders
            [
                'label' => trans('gen.orders'),
                'icon'  => 'bi bi-basket-fill',
                'link'  => route('admin.orders.index'),
                'active' => getCurrentRouteName() === 'admin.orders.index' || getCurrentRouteName() === 'admin.orders.create' || getCurrentRouteName() === 'admin.orders.edit' || getCurrentRouteName() === 'admin.orders.show',
            ],
            // transactions
            [
                'label' => trans('gen.transactions'),
                'icon'  => 'bi bi-cash-coin',
                'link'  => route('admin.transactions.index'),
                'active' => getCurrentRouteName() === 'admin.transactions.index',
            ],
            // Blogs
            [
                'label' => trans('gen.blogs'),
                'icon'  => 'bi bi-book',
                'link'  => route('admin.blogs.index'),
                'active' => getCurrentRouteName() === 'admin.blogs.index' || getCurrentRouteName() === 'admin.blogs.create' || getCurrentRouteName() === 'admin.blogs.edit'
                || getCurrentRouteName() === 'admin.blog-categories.index' || getCurrentRouteName() === 'admin.blog-categories.create'
                || getCurrentRouteName() === 'admin.blog-categories.edit',
            ],

            // Users Management
            [
                'label' => trans('gen.users'),
                'icon'  => 'fa-users',
                'link'  => route('users.index'),
                'active' => getCurrentRouteName() === 'users.index' || getCurrentRouteName() === 'users.create' || getCurrentRouteName() === 'users.edit',
            ],

            // User Access Control
            // Roles
            [
                'label' => trans('gen.roles'),
                'icon'  => 'fa-user-shield',
                'link'  => route('roles.index'),
                'active' => getCurrentRouteName() === 'roles.index' || getCurrentRouteName() === 'roles.create' || getCurrentRouteName() === 'roles.edit',
            ],
            // Permissions
            [
                'label' => trans('gen.permissions'),
                'icon'  => 'fa-user-lock',
                'link'  => route('permissions.index'),
                'active' => getCurrentRouteName() === 'permissions.index' || getCurrentRouteName() === 'permissions.create' || getCurrentRouteName() === 'permissions.edit',
            ],

            // Newsletters
            [
                'label' => trans('gen.newsletter'),
                'icon'  => 'fa-envelope',
                'link'  => route('newsletters.index'),
                'active' => getCurrentRouteName() === 'newsletters.index' || getCurrentRouteName() === 'view.email',
            ],
            [
                'label' => trans('gen.contacts'),
                'icon'  => 'fa-message',
                'link'  => route('admin.contacts.index'),
                'active' => getCurrentRouteName() === 'admin.contacts.index',
            ],

            // Settings
            // General Settings
            [
                'label' => trans('gen.settings'),
                'icon'  => 'fa-cog',
                'dropdown' => [
                    [
                        'label' => trans('gen.general_settings'),
                        'link' => route('setting.general'),
                        'active' => getCurrentRouteName() === 'setting.general',
                        'show' => getCurrentRouteName() === 'setting.general' ? 'show' : '',
                    ],
                    [
                        'label' => trans('gen.social_links_settings'),
                        'link' => route('setting.social'),
                        'active' => getCurrentRouteName() === 'setting.social',
                        'show' => getCurrentRouteName() === 'setting.social' ? 'show' : '',
                    ],
                ],
            ],
            // CMS
            [
                'label' => trans('gen.cms'),
                'icon'  => 'fa-laptop',
                'dropdown' => [
                    [
                        'label' => trans('gen.landing_page_full'),
                        'link' => route('cms.landing-page.index'),
                        'active' => getCurrentRouteName() === 'cms.landing-page.index'
                    ],
                    [
                        'label' => trans('gen.who_we_are'),
                        'link' => route('cms.who-we-are.index'),
                        'active' => getCurrentRouteName() === 'cms.landing-page.index'
                    ],
                    [
                        'label' => trans('gen.become_a_leader'),
                        'link' => route('cms.become-a-leader.index'),
                        'active' => getCurrentRouteName() === 'cms.landing-page.index'
                    ],
                    //blogs page
                    [
                        'label' => trans('gen.blog_page'),
                        'link' => route('cms.blog-page.index'),
                        'active' => getCurrentRouteName() === 'cms.blog-page.index',
                    ],
                    // faqs
                    [
                        'label' => trans('gen.faqs'),
                        'link' => route('cms.faqs.index'),
                        'active' => getCurrentRouteName() === 'cms.faqs.index' || getCurrentRouteName() === 'cms.faqs.create' || getCurrentRouteName() === 'cms.faqs.edit',
                    ],
                    [
                        'label' => trans('gen.privacy_policy'),
                        'link' => route('cms.privacy-policy.index'),
                        'active' => getCurrentRouteName() === 'cms.privacy-policy.index'
                    ],
                    [
                        'label' => trans('gen.terms_and_conditions'),
                        'link' => route('cms.terms-and-conditions.index'),
                        'active' => getCurrentRouteName() === 'cms.landing-page.index'
                    ],

                ]
            ]
        ];
    }
}

/**
 * Get the Admin Sidebar Routes
 *
 * @param void
 * @return array
 */
if (!function_exists('getCurrentRouteName')) {
    function getCurrentRouteName()
    {
        return request()->route()->getName();
    }
}


/**
 * Get name avatar.
 *
 * @param string $name
 * @return string
 */
if (!function_exists('getAvatar')) {
    function getAvatar(string $name): string
    {
        $avatarImage = 'https://ui-avatars.com/api/?name=' . $name . '&background=0D8ABC&color=fff';
        return $avatarImage;
    }
}


/**
 * Get social link.
 *
 * @param string $key The social link key to retrieve.
 * @return \Illuminate\Database\Eloquent\Collection The collection of social links.
 */
if (!function_exists('getSocialLinks')) {
    function getSocialLinks(string $key)
    {
        $socialLinks = Cache::remember('settings_social_links', 60 * 60 * 24, function () use ($key) {
            return SocialLinks::where('key', $key)->get();
        });

        return $socialLinks;
    }
}

/**
 * Get General settings.
 *
 * @param void
 * @return \Illuminate\Database\Eloquent\Collection
 */
if (!function_exists('getGeneralSettings')) {
    function getGeneralSettings()
    {
        $generalSetting = Cache::remember('general_setting', 60 * 60 * 24, function () {
            return GeneralSetting::first();
        });

        return $generalSetting;
    }
}


/**
 * Get Auth user ID.
 *
 * @param void
 * @return int
 */
if (!function_exists('getAuthUserId')) {
    function getAuthUserId(): int
    {
        return Auth::id();
    }
}

if (!function_exists('getAuthUser')) {
    function getAuthUser()
    {
        return Auth::user();
    }
}

if (!function_exists('getAuthUserId')) {
    function getAuthUserId()
    {
        return Auth::id();
    }
}

/**
 * Get Auth user.
 *
 * @param void
 * @return \App\Models\User
 */
if (!function_exists('getAuthUser')) {
    function getAuthUser()
    {
        return Auth::user();
    }
}


/**
 * Truncate the given text to a specified length.
 *
 * @param string $text The input text to be truncated.
 * @param int $limit The maximum number of characters allowed.
 * @return string The truncated text with an ellipsis if needed.
 */
// limitText function

if (!function_exists('limitText')) {
    function limitText(string $text, int $limit = 300)
    {
        return Str::limit($text, $limit);
    }
}



/**
 * Get the logo.
 *
 * @param void
 * @return string
 */
if (!function_exists('getLogo')) {
    function getLogo()
    {
        $generalSetting = getGeneralSettings();
        return asset('storage/' . $generalSetting?->site_logo);
    }
}

/**
 * Get the favicon.
 *
 * @param void
 * @return string
 */
if (!function_exists('getFavIcon')) {
    function getFavIcon()
    {
        $generalSetting = getGeneralSettings();
        return asset('storage/' . $generalSetting->site_favicon);
    }
}

/**
 * Get the site name.
 *
 * @param void
 * @return User $users
 */
if (!function_exists('getSiteAdmins')) {
    function getSiteAdmins()
    {
        return User::role('Super Admin')->get();
    }
}
