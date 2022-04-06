<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Qr Code
    Route::post('qr-codes/media', 'QrCodeApiController@storeMedia')->name('qr-codes.storeMedia');
    Route::apiResource('qr-codes', 'QrCodeApiController');

    // Qr Color
    Route::apiResource('qr-colors', 'QrColorApiController');

    // Business Page
    Route::post('business-pages/media', 'BusinessPageApiController@storeMedia')->name('business-pages.storeMedia');
    Route::apiResource('business-pages', 'BusinessPageApiController');

    // Vcard
    Route::post('vcards/media', 'VcardApiController@storeMedia')->name('vcards.storeMedia');
    Route::apiResource('vcards', 'VcardApiController');

    // Hours
    Route::apiResource('hours', 'HoursApiController');

    // Website
    Route::apiResource('websites', 'WebsiteApiController');

    // Social
    Route::apiResource('socials', 'SocialApiController');

    // Social Channel
    Route::post('social-channels/media', 'SocialChannelApiController@storeMedia')->name('social-channels.storeMedia');
    Route::apiResource('social-channels', 'SocialChannelApiController');

    // Qr Type
    Route::post('qr-types/media', 'QrTypeApiController@storeMedia')->name('qr-types.storeMedia');
    Route::apiResource('qr-types', 'QrTypeApiController');

    // Qr Industry
    Route::apiResource('qr-industries', 'QrIndustryApiController');

    // Event
    Route::post('events/media', 'EventApiController@storeMedia')->name('events.storeMedia');
    Route::apiResource('events', 'EventApiController');
});
