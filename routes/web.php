<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Qr Code
    Route::delete('qr-codes/destroy', 'QrCodeController@massDestroy')->name('qr-codes.massDestroy');
    Route::post('qr-codes/media', 'QrCodeController@storeMedia')->name('qr-codes.storeMedia');
    Route::post('qr-codes/ckmedia', 'QrCodeController@storeCKEditorImages')->name('qr-codes.storeCKEditorImages');
    Route::resource('qr-codes', 'QrCodeController');

    // Qr Color
    Route::delete('qr-colors/destroy', 'QrColorController@massDestroy')->name('qr-colors.massDestroy');
    Route::resource('qr-colors', 'QrColorController');

    // Business Page
    Route::delete('business-pages/destroy', 'BusinessPageController@massDestroy')->name('business-pages.massDestroy');
    Route::post('business-pages/media', 'BusinessPageController@storeMedia')->name('business-pages.storeMedia');
    Route::post('business-pages/ckmedia', 'BusinessPageController@storeCKEditorImages')->name('business-pages.storeCKEditorImages');
    Route::resource('business-pages', 'BusinessPageController');

    // Vcard
    Route::delete('vcards/destroy', 'VcardController@massDestroy')->name('vcards.massDestroy');
    Route::post('vcards/media', 'VcardController@storeMedia')->name('vcards.storeMedia');
    Route::post('vcards/ckmedia', 'VcardController@storeCKEditorImages')->name('vcards.storeCKEditorImages');
    Route::resource('vcards', 'VcardController');

    // Hours
    Route::delete('hours/destroy', 'HoursController@massDestroy')->name('hours.massDestroy');
    Route::resource('hours', 'HoursController');

    // Website
    Route::delete('websites/destroy', 'WebsiteController@massDestroy')->name('websites.massDestroy');
    Route::resource('websites', 'WebsiteController');

    // Social
    Route::delete('socials/destroy', 'SocialController@massDestroy')->name('socials.massDestroy');
    Route::resource('socials', 'SocialController');

    // Social Channel
    Route::delete('social-channels/destroy', 'SocialChannelController@massDestroy')->name('social-channels.massDestroy');
    Route::post('social-channels/media', 'SocialChannelController@storeMedia')->name('social-channels.storeMedia');
    Route::post('social-channels/ckmedia', 'SocialChannelController@storeCKEditorImages')->name('social-channels.storeCKEditorImages');
    Route::resource('social-channels', 'SocialChannelController');

    // Qr Type
    Route::delete('qr-types/destroy', 'QrTypeController@massDestroy')->name('qr-types.massDestroy');
    Route::post('qr-types/media', 'QrTypeController@storeMedia')->name('qr-types.storeMedia');
    Route::post('qr-types/ckmedia', 'QrTypeController@storeCKEditorImages')->name('qr-types.storeCKEditorImages');
    Route::resource('qr-types', 'QrTypeController');

    // Qr Industry
    Route::delete('qr-industries/destroy', 'QrIndustryController@massDestroy')->name('qr-industries.massDestroy');
    Route::resource('qr-industries', 'QrIndustryController');

    // Event
    Route::delete('events/destroy', 'EventController@massDestroy')->name('events.massDestroy');
    Route::post('events/media', 'EventController@storeMedia')->name('events.storeMedia');
    Route::post('events/ckmedia', 'EventController@storeCKEditorImages')->name('events.storeCKEditorImages');
    Route::resource('events', 'EventController');

    // Image Gallery
    Route::delete('image-galleries/destroy', 'ImageGalleryController@massDestroy')->name('image-galleries.massDestroy');
    Route::post('image-galleries/media', 'ImageGalleryController@storeMedia')->name('image-galleries.storeMedia');
    Route::post('image-galleries/ckmedia', 'ImageGalleryController@storeCKEditorImages')->name('image-galleries.storeCKEditorImages');
    Route::resource('image-galleries', 'ImageGalleryController');

    // Video
    Route::delete('videos/destroy', 'VideoController@massDestroy')->name('videos.massDestroy');
    Route::post('videos/media', 'VideoController@storeMedia')->name('videos.storeMedia');
    Route::post('videos/ckmedia', 'VideoController@storeCKEditorImages')->name('videos.storeCKEditorImages');
    Route::resource('videos', 'VideoController');

    // Design Color
    Route::delete('design-colors/destroy', 'DesignColorController@massDestroy')->name('design-colors.massDestroy');
    Route::resource('design-colors', 'DesignColorController');

    // Address
    Route::delete('addresses/destroy', 'AddressController@massDestroy')->name('addresses.massDestroy');
    Route::resource('addresses', 'AddressController');

    // Download
    Route::delete('downloads/destroy', 'DownloadController@massDestroy')->name('downloads.massDestroy');
    Route::post('downloads/media', 'DownloadController@storeMedia')->name('downloads.storeMedia');
    Route::post('downloads/ckmedia', 'DownloadController@storeCKEditorImages')->name('downloads.storeCKEditorImages');
    Route::resource('downloads', 'DownloadController');

    // Pdf
    Route::delete('pdfs/destroy', 'PdfController@massDestroy')->name('pdfs.massDestroy');
    Route::post('pdfs/media', 'PdfController@storeMedia')->name('pdfs.storeMedia');
    Route::post('pdfs/ckmedia', 'PdfController@storeCKEditorImages')->name('pdfs.storeCKEditorImages');
    Route::resource('pdfs', 'PdfController');

    // App Promotion
    Route::delete('app-promotions/destroy', 'AppPromotionController@massDestroy')->name('app-promotions.massDestroy');
    Route::post('app-promotions/media', 'AppPromotionController@storeMedia')->name('app-promotions.storeMedia');
    Route::post('app-promotions/ckmedia', 'AppPromotionController@storeCKEditorImages')->name('app-promotions.storeCKEditorImages');
    Route::resource('app-promotions', 'AppPromotionController');
});

Route::post('member/login','Auth\LoginController@memberLogin')->name('member.login');

Route::post('member/register','Auth\RegisterController@memberCreate')->name('member.register');

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

Route::group(['prefix' => 'qrcode', 'as' => 'qrcode.', 'namespace' => 'Frontend', 'middleware' => ['auth:member']], function () {
    Route::resource('manage', 'QrCodePortalController');
    Route::post('getTypePreview', 'QrCodePortalController@getTypePreview')->name('manage.getTypePreview');
});

Route::get('partners/qr-code', 'SiteController@qrcode_portal_login')->name('partners.qrcode-login');

