<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'qr_code_create',
            ],
            [
                'id'    => 18,
                'title' => 'qr_code_edit',
            ],
            [
                'id'    => 19,
                'title' => 'qr_code_show',
            ],
            [
                'id'    => 20,
                'title' => 'qr_code_delete',
            ],
            [
                'id'    => 21,
                'title' => 'qr_code_access',
            ],
            [
                'id'    => 22,
                'title' => 'qr_color_create',
            ],
            [
                'id'    => 23,
                'title' => 'qr_color_edit',
            ],
            [
                'id'    => 24,
                'title' => 'qr_color_show',
            ],
            [
                'id'    => 25,
                'title' => 'qr_color_delete',
            ],
            [
                'id'    => 26,
                'title' => 'qr_color_access',
            ],
            [
                'id'    => 27,
                'title' => 'setting_access',
            ],
            [
                'id'    => 28,
                'title' => 'business_page_create',
            ],
            [
                'id'    => 29,
                'title' => 'business_page_edit',
            ],
            [
                'id'    => 30,
                'title' => 'business_page_show',
            ],
            [
                'id'    => 31,
                'title' => 'business_page_delete',
            ],
            [
                'id'    => 32,
                'title' => 'business_page_access',
            ],
            [
                'id'    => 33,
                'title' => 'vcard_create',
            ],
            [
                'id'    => 34,
                'title' => 'vcard_edit',
            ],
            [
                'id'    => 35,
                'title' => 'vcard_show',
            ],
            [
                'id'    => 36,
                'title' => 'vcard_delete',
            ],
            [
                'id'    => 37,
                'title' => 'vcard_access',
            ],
            [
                'id'    => 38,
                'title' => 'type_access',
            ],
            [
                'id'    => 39,
                'title' => 'hour_create',
            ],
            [
                'id'    => 40,
                'title' => 'hour_edit',
            ],
            [
                'id'    => 41,
                'title' => 'hour_show',
            ],
            [
                'id'    => 42,
                'title' => 'hour_delete',
            ],
            [
                'id'    => 43,
                'title' => 'hour_access',
            ],
            [
                'id'    => 44,
                'title' => 'website_create',
            ],
            [
                'id'    => 45,
                'title' => 'website_edit',
            ],
            [
                'id'    => 46,
                'title' => 'website_show',
            ],
            [
                'id'    => 47,
                'title' => 'website_delete',
            ],
            [
                'id'    => 48,
                'title' => 'website_access',
            ],
            [
                'id'    => 49,
                'title' => 'social_create',
            ],
            [
                'id'    => 50,
                'title' => 'social_edit',
            ],
            [
                'id'    => 51,
                'title' => 'social_show',
            ],
            [
                'id'    => 52,
                'title' => 'social_delete',
            ],
            [
                'id'    => 53,
                'title' => 'social_access',
            ],
            [
                'id'    => 54,
                'title' => 'social_channel_create',
            ],
            [
                'id'    => 55,
                'title' => 'social_channel_edit',
            ],
            [
                'id'    => 56,
                'title' => 'social_channel_show',
            ],
            [
                'id'    => 57,
                'title' => 'social_channel_delete',
            ],
            [
                'id'    => 58,
                'title' => 'social_channel_access',
            ],
            [
                'id'    => 59,
                'title' => 'qr_type_create',
            ],
            [
                'id'    => 60,
                'title' => 'qr_type_edit',
            ],
            [
                'id'    => 61,
                'title' => 'qr_type_show',
            ],
            [
                'id'    => 62,
                'title' => 'qr_type_delete',
            ],
            [
                'id'    => 63,
                'title' => 'qr_type_access',
            ],
            [
                'id'    => 64,
                'title' => 'qr_industry_create',
            ],
            [
                'id'    => 65,
                'title' => 'qr_industry_edit',
            ],
            [
                'id'    => 66,
                'title' => 'qr_industry_show',
            ],
            [
                'id'    => 67,
                'title' => 'qr_industry_delete',
            ],
            [
                'id'    => 68,
                'title' => 'qr_industry_access',
            ],
            [
                'id'    => 69,
                'title' => 'event_create',
            ],
            [
                'id'    => 70,
                'title' => 'event_edit',
            ],
            [
                'id'    => 71,
                'title' => 'event_show',
            ],
            [
                'id'    => 72,
                'title' => 'event_delete',
            ],
            [
                'id'    => 73,
                'title' => 'event_access',
            ],
            [
                'id'    => 74,
                'title' => 'image_gallery_create',
            ],
            [
                'id'    => 75,
                'title' => 'image_gallery_edit',
            ],
            [
                'id'    => 76,
                'title' => 'image_gallery_show',
            ],
            [
                'id'    => 77,
                'title' => 'image_gallery_delete',
            ],
            [
                'id'    => 78,
                'title' => 'image_gallery_access',
            ],
            [
                'id'    => 79,
                'title' => 'video_create',
            ],
            [
                'id'    => 80,
                'title' => 'video_edit',
            ],
            [
                'id'    => 81,
                'title' => 'video_show',
            ],
            [
                'id'    => 82,
                'title' => 'video_delete',
            ],
            [
                'id'    => 83,
                'title' => 'video_access',
            ],
            [
                'id'    => 84,
                'title' => 'design_color_create',
            ],
            [
                'id'    => 85,
                'title' => 'design_color_edit',
            ],
            [
                'id'    => 86,
                'title' => 'design_color_show',
            ],
            [
                'id'    => 87,
                'title' => 'design_color_delete',
            ],
            [
                'id'    => 88,
                'title' => 'design_color_access',
            ],
            [
                'id'    => 89,
                'title' => 'address_create',
            ],
            [
                'id'    => 90,
                'title' => 'address_edit',
            ],
            [
                'id'    => 91,
                'title' => 'address_show',
            ],
            [
                'id'    => 92,
                'title' => 'address_delete',
            ],
            [
                'id'    => 93,
                'title' => 'address_access',
            ],
            [
                'id'    => 94,
                'title' => 'download_create',
            ],
            [
                'id'    => 95,
                'title' => 'download_edit',
            ],
            [
                'id'    => 96,
                'title' => 'download_show',
            ],
            [
                'id'    => 97,
                'title' => 'download_delete',
            ],
            [
                'id'    => 98,
                'title' => 'download_access',
            ],
            [
                'id'    => 99,
                'title' => 'pdf_create',
            ],
            [
                'id'    => 100,
                'title' => 'pdf_edit',
            ],
            [
                'id'    => 101,
                'title' => 'pdf_show',
            ],
            [
                'id'    => 102,
                'title' => 'pdf_delete',
            ],
            [
                'id'    => 103,
                'title' => 'pdf_access',
            ],
            [
                'id'    => 104,
                'title' => 'app_promotion_create',
            ],
            [
                'id'    => 105,
                'title' => 'app_promotion_edit',
            ],
            [
                'id'    => 106,
                'title' => 'app_promotion_show',
            ],
            [
                'id'    => 107,
                'title' => 'app_promotion_delete',
            ],
            [
                'id'    => 108,
                'title' => 'app_promotion_access',
            ],
            [
                'id'    => 109,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
