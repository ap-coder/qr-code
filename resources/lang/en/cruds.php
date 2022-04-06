<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'qrCode' => [
        'title'          => 'QR Codes',
        'title_singular' => 'QR Code',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'name'                  => 'Name',
            'name_helper'           => ' ',
            'description'           => 'Description',
            'description_helper'    => ' ',
            'published'             => 'Published',
            'published_helper'      => ' ',
            'slug'                  => 'Slug',
            'slug_helper'           => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'scans'                 => 'Scans',
            'scans_helper'          => ' ',
            'clicks'                => 'Clicks',
            'clicks_helper'         => ' ',
            'short_link'            => 'Short Link',
            'short_link_helper'     => ' ',
            'active'                => 'Active',
            'active_helper'         => ' ',
            'pause'                 => 'Pause',
            'pause_helper'          => ' ',
            'business_pages'        => 'Business Pages',
            'business_pages_helper' => ' ',
            'created_by'            => 'Created By',
            'created_by_helper'     => ' ',
            'vcards'                => 'VCards',
            'vcards_helper'         => ' ',
            'websites'              => 'Websites',
            'websites_helper'       => ' ',
            'types'                 => 'Types',
            'types_helper'          => ' ',
        ],
    ],
    'qrColor' => [
        'title'          => 'Qr Colors',
        'title_singular' => 'Qr Color',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'color'               => 'Color',
            'color_helper'        => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'corner_inner'        => 'Corner Inner',
            'corner_inner_helper' => ' ',
            'corner_outer'        => 'Corner Outer',
            'corner_outer_helper' => ' ',
        ],
    ],
    'setting' => [
        'title'          => 'Settings',
        'title_singular' => 'Setting',
    ],
    'businessPage' => [
        'title'          => 'Business Page',
        'title_singular' => 'Business Page',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'qr_name'              => 'QR Name',
            'qr_name_helper'       => ' ',
            'company'              => 'Company',
            'company_helper'       => ' ',
            'headline'             => 'Headline',
            'headline_helper'      => ' ',
            'summary'              => 'Summary',
            'summary_helper'       => ' ',
            'button_text'          => 'Button Text',
            'button_text_helper'   => ' ',
            'button_lnk'           => 'Button Lnk',
            'button_lnk_helper'    => ' ',
            'about'                => 'About',
            'about_helper'         => ' ',
            'contact_name'         => 'Contact Name',
            'contact_name_helper'  => ' ',
            'phone'                => 'Phone',
            'phone_helper'         => 'Format +1 (000) 000-0000',
            'email'                => 'Email',
            'email_helper'         => ' ',
            'website_link'         => 'Website Link',
            'website_link_helper'  => 'https://www.yoursite.com',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'header_image'         => 'Header Image',
            'header_image_helper'  => 'max size 640 x 360',
            'loading_image'        => 'Loading Image',
            'loading_image_helper' => 'max size 600 x 600',
            'hours'                => 'Hours',
            'hours_helper'         => ' ',
            'created_by'           => 'Created By',
            'created_by_helper'    => ' ',
            'active'               => 'Active',
            'active_helper'        => ' ',
            'slug'                 => 'Slug',
            'slug_helper'          => ' ',
        ],
    ],
    'vcard' => [
        'title'          => 'vCard Pro',
        'title_singular' => 'vCard Pro',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'qr_name'              => 'QR Name',
            'qr_name_helper'       => ' ',
            'first_name'           => 'First Name',
            'first_name_helper'    => ' ',
            'last_name'            => 'Last Name',
            'last_name_helper'     => ' ',
            'title'                => 'Title',
            'title_helper'         => 'Mr Roboto',
            'summary'              => 'Summary',
            'summary_helper'       => ' ',
            'photo'                => 'Photo',
            'photo_helper'         => 'max size 400 x 400',
            'company'              => 'Company',
            'company_helper'       => ' ',
            'headline'             => 'Headline',
            'headline_helper'      => ' ',
            'button_text'          => 'Button Text',
            'button_text_helper'   => ' ',
            'button_lnk'           => 'Button Lnk',
            'button_lnk_helper'    => ' ',
            'about'                => 'About',
            'about_helper'         => ' ',
            'email'                => 'Email',
            'email_helper'         => ' ',
            'website_link'         => 'Website Link',
            'website_link_helper'  => 'https://www.yoursite.com',
            'home_phone'           => 'Home Phone',
            'home_phone_helper'    => '+1 (000) 000-0000',
            'mobile_number'        => 'Mobile Number',
            'mobile_number_helper' => '+1 (000) 000-0000',
            'fax_number'           => 'Fax Number',
            'fax_number_helper'    => '+1 (000) 000-0000',
            'loading_photo'        => 'Loading Photo',
            'loading_photo_helper' => 'max size 600 x 600',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'hours'                => 'Hours',
            'hours_helper'         => ' ',
            'created_by'           => 'Created By',
            'created_by_helper'    => ' ',
            'active'               => 'Active',
            'active_helper'        => ' ',
            'slug'                 => 'Slug',
            'slug_helper'          => ' ',
            'address'              => 'Address',
            'address_helper'       => ' ',
        ],
    ],
    'type' => [
        'title'          => 'Types',
        'title_singular' => 'Type',
    ],
    'hour' => [
        'title'          => 'Hours',
        'title_singular' => 'Hour',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'day'                 => 'Day',
            'day_helper'          => ' ',
            'open_time'           => 'Open Time',
            'open_time_helper'    => ' ',
            'closing_time'        => 'Closing Time',
            'closing_time_helper' => ' ',
            'time_of_day'         => 'Time Of Day',
            'time_of_day_helper'  => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'website' => [
        'title'          => 'Website',
        'title_singular' => 'Website',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'qr_name'             => 'Qr Name',
            'qr_name_helper'      => ' ',
            'website_name'        => 'Website Name',
            'website_name_helper' => ' ',
            'url'                 => 'Url',
            'url_helper'          => 'https://www.yoursite.com',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'created_by'          => 'Created By',
            'created_by_helper'   => ' ',
            'active'              => 'Active',
            'active_helper'       => ' ',
            'slug'                => 'Slug',
            'slug_helper'         => ' ',
        ],
    ],
    'social' => [
        'title'          => 'Socials',
        'title_singular' => 'Social',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'title'               => 'Title',
            'title_helper'        => ' ',
            'social_name'         => 'Social Name',
            'social_name_helper'  => ' ',
            'url'                 => 'Url',
            'url_helper'          => ' ',
            'channel_name'        => 'Channel Name',
            'channel_name_helper' => ' ',
            'icon_class'          => 'Icon Class',
            'icon_class_helper'   => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'socialChannel' => [
        'title'          => 'Social Channels',
        'title_singular' => 'Social Channel',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'qr_name'              => 'Qr Name',
            'qr_name_helper'       => ' ',
            'header_image'         => 'Header Image',
            'header_image_helper'  => 'max size 640 x 360',
            'summery'              => 'Summery',
            'summery_helper'       => ' ',
            'loading_image'        => 'Loading Image',
            'loading_image_helper' => 'max size 600 x 600',
            'socials'              => 'Socials',
            'socials_helper'       => 'Select the social channels you want to add.',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'created_by'           => 'Created By',
            'created_by_helper'    => ' ',
            'slug'                 => 'Slug',
            'slug_helper'          => ' ',
            'active'               => 'Active',
            'active_helper'        => ' ',
        ],
    ],
    'qrType' => [
        'title'          => 'Qr Types',
        'title_singular' => 'Qr Type',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'published'               => 'Published',
            'published_helper'        => ' ',
            'title'                   => 'Title',
            'title_helper'            => ' ',
            'subtitle'                => 'Subtitle',
            'subtitle_helper'         => ' ',
            'mock_image'              => 'Mock Image',
            'mock_image_helper'       => 'max size 350 x 600',
            'hover_over_image'        => 'Hover Over Image',
            'hover_over_image_helper' => 'max size 400 x 600',
            'select_type'             => 'Select Type',
            'select_type_helper'      => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'industries'              => 'Industries',
            'industries_helper'       => ' ',
            'icon_class'              => 'Icon Class',
            'icon_class_helper'       => ' ',
        ],
    ],
    'qrIndustry' => [
        'title'          => 'Qr Industry',
        'title_singular' => 'Qr Industry',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'event' => [
        'title'          => 'Event',
        'title_singular' => 'Event',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'qr_name'                  => 'Qr Name',
            'qr_name_helper'           => ' ',
            'header_image'             => 'Header Image',
            'header_image_helper'      => 'max size 640 x 360',
            'organizer'                => 'Organizer',
            'organizer_helper'         => 'Company or Host name',
            'title'                    => 'Title',
            'title_helper'             => ' ',
            'sub_title'                => 'Sub Title',
            'sub_title_helper'         => ' ',
            'summary'                  => 'Summary',
            'summary_helper'           => ' ',
            'event_date_time'          => 'Start Event Date & Time',
            'event_date_time_helper'   => ' ',
            'all_day'                  => 'All Day',
            'all_day_helper'           => ' ',
            'photo'                    => 'Photos',
            'photo_helper'             => 'Image for event header section. 1200 x 500',
            'attachments'              => 'Attachments',
            'attachments_helper'       => 'Attach files or images they might need for the event here.',
            'signup_deadline'          => 'Signup Deadline',
            'signup_deadline_helper'   => ' ',
            'notes'                    => 'Notes',
            'notes_helper'             => 'event notes only visible in admin',
            'link_1'                   => 'Link 1',
            'link_1_helper'            => 'General link field',
            'link_1_text'              => 'Link 1 Text',
            'link_1_text_helper'       => ' ',
            'link_2'                   => 'Link 2',
            'link_2_helper'            => ' ',
            'link_2_text'              => 'Link 2 Text',
            'link_2_text_helper'       => ' ',
            'slug'                     => 'Slug',
            'slug_helper'              => ' ',
            'end_date'                 => 'End Date',
            'end_date_helper'          => ' ',
            'doortime'                 => 'Doors Open',
            'doortime_helper'          => ' ',
            'button_text'              => 'Button Text',
            'button_text_helper'       => ' ',
            'button_link'              => 'Button Link',
            'button_link_helper'       => ' ',
            'button_icon_class'        => 'Button Icon Class',
            'button_icon_class_helper' => ' ',
            'venue_name'               => 'Venue Name',
            'venue_name_helper'        => ' ',
            'about'                    => 'About',
            'about_helper'             => ' ',
            'contact'                  => 'Contact',
            'contact_helper'           => 'Contact person for event',
            'phone'                    => 'Phone',
            'phone_helper'             => '+1 (000) 000-0000',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'website'                  => 'Website',
            'website_helper'           => 'www.your-website.com',
            'loading_image'            => 'Loading Image',
            'loading_image_helper'     => 'max size 600 x 600',
            'add_share_button'         => 'Add a share button to your event.',
            'add_share_button_helper'  => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'created_by'               => 'Created By',
            'created_by_helper'        => ' ',
            'design_colors'            => 'Design Colors',
            'design_colors_helper'     => ' ',
            'venue_address'            => 'Venue Address',
            'venue_address_helper'     => ' ',
            'active'                   => 'Active',
            'active_helper'            => ' ',
        ],
    ],
    'imageGallery' => [
        'title'          => 'Image Gallery',
        'title_singular' => 'Image Gallery',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'images'                   => 'Images',
            'images_helper'            => 'Upload or drag and drop images to include in your gallery.',
            'title'                    => 'Title',
            'title_helper'             => ' ',
            'description'              => 'Description',
            'description_helper'       => ' ',
            'website'                  => 'Website',
            'website_helper'           => 'www.yoursite.com',
            'button_text'              => 'Button Text',
            'button_text_helper'       => ' ',
            'button_icon_class'        => 'Button Icon Class',
            'button_icon_class_helper' => ' ',
            'button_link'              => 'Button Link',
            'button_link_helper'       => ' ',
            'loading_image'            => 'Loading Image',
            'loading_image_helper'     => 'max size 600 x 600',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'created_by'               => 'Created By',
            'created_by_helper'        => ' ',
            'slug'                     => 'Slug',
            'slug_helper'              => ' ',
            'qr_name'                  => 'QR Name',
            'qr_name_helper'           => ' ',
            'active'                   => 'Active',
            'active_helper'            => ' ',
        ],
    ],
    'video' => [
        'title'          => 'Video',
        'title_singular' => 'Video',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'title'                    => 'Title',
            'title_helper'             => ' ',
            'video_link'               => 'Video Link',
            'video_link_helper'        => 'Youtube has to use this format https://www.youtube.com/embed/{video id here}',
            'description'              => 'Description',
            'description_helper'       => ' ',
            'headline'                 => 'Headline',
            'headline_helper'          => ' ',
            'company'                  => 'Company',
            'company_helper'           => ' ',
            'button_text'              => 'Button Text',
            'button_text_helper'       => ' ',
            'button_icon_class'        => 'Button Icon Class',
            'button_icon_class_helper' => ' ',
            'button_link'              => 'Button Link',
            'button_link_helper'       => 'please use https if possible',
            'slug'                     => 'Slug',
            'slug_helper'              => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'created_by'               => 'Created By',
            'created_by_helper'        => ' ',
            'design_colors'            => 'Design Colors',
            'design_colors_helper'     => ' ',
            'social_channels'          => 'Social Channels',
            'social_channels_helper'   => ' ',
            'loading_image'            => 'Loading Image',
            'loading_image_helper'     => 'max size 600 x 300',
            'qr_name'                  => 'QR Name',
            'qr_name_helper'           => ' ',
            'active'                   => 'Active',
            'active_helper'            => ' ',
        ],
    ],
    'designColor' => [
        'title'          => 'Design Colors',
        'title_singular' => 'Design Color',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'primary'              => 'Primary',
            'primary_helper'       => '#447fb6',
            'button'               => 'Button',
            'button_helper'        => '#e91e63',
            'secondary'            => 'Secondary',
            'secondary_helper'     => ' ',
            'gradient'             => 'Gradient',
            'gradient_helper'      => ' ',
            'custom_color'         => 'Custom Color',
            'custom_color_helper'  => '#447fb6',
            'custom_button'        => 'Custom Button',
            'custom_button_helper' => '#e91e63',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'address' => [
        'title'          => 'Addresses',
        'title_singular' => 'Address',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'nickname'            => 'Nickname',
            'nickname_helper'     => ' ',
            'address'             => 'Address',
            'address_helper'      => ' ',
            'address_2'           => 'Address 2',
            'address_2_helper'    => ' ',
            'city'                => 'City',
            'city_helper'         => ' ',
            'state'               => 'State',
            'state_helper'        => ' ',
            'zipcode'             => 'Zipcode',
            'zipcode_helper'      => ' ',
            'slug'                => 'Slug',
            'slug_helper'         => ' ',
            'full_address'        => 'Full Address',
            'full_address_helper' => ' ',
            'published'           => 'Published',
            'published_helper'    => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'download' => [
        'title'          => 'QR Download',
        'title_singular' => 'QR Download',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'frame'              => 'Frame',
            'frame_helper'       => ' ',
            'frame_color'        => 'Frame Color',
            'frame_color_helper' => ' ',
            'frame_text'         => 'Frame Text',
            'frame_text_helper'  => ' ',
            'logo'               => 'Logo',
            'logo_helper'        => ' ',
            'code'               => 'Code',
            'code_helper'        => ' ',
            'qr_color'           => 'Qr Color',
            'qr_color_helper'    => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'created_by'         => 'Created By',
            'created_by_helper'  => ' ',
        ],
    ],
    'pdf' => [
        'title'          => 'Pdf',
        'title_singular' => 'Pdf',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'pdf'                  => 'Pdf',
            'pdf_helper'           => 'upload your pdf here',
            'company'              => 'Company',
            'company_helper'       => ' ',
            'title'                => 'Title',
            'title_helper'         => ' ',
            'description'          => 'Description',
            'description_helper'   => ' ',
            'website'              => 'Website',
            'website_helper'       => ' ',
            'loading_image'        => 'Loading Image',
            'loading_image_helper' => 'max size',
            'slug'                 => 'Slug',
            'slug_helper'          => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'created_by'           => 'Created By',
            'created_by_helper'    => ' ',
            'qr_name'              => 'QR Name',
            'qr_name_helper'       => ' ',
            'active'               => 'Active',
            'active_helper'        => ' ',
        ],
    ],
    'appPromotion' => [
        'title'          => 'App Promotion',
        'title_singular' => 'App Promotion',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'qr_name'                  => 'QR Name',
            'qr_name_helper'           => ' ',
            'colors'                   => 'Colors',
            'colors_helper'            => ' ',
            'app_name'                 => 'App Name',
            'app_name_helper'          => ' ',
            'developer'                => 'Developer',
            'developer_helper'         => 'Name of App Developer',
            'app_logo'                 => 'App Logo',
            'app_logo_helper'          => ' ',
            'title'                    => 'Title',
            'title_helper'             => ' ',
            'description'              => 'Description',
            'description_helper'       => ' ',
            'website'                  => 'Website',
            'website_helper'           => ' ',
            'button_text'              => 'Button Text',
            'button_text_helper'       => ' ',
            'button_link'              => 'Button Link',
            'button_link_helper'       => ' ',
            'button_icon_class'        => 'Button Icon Class',
            'button_icon_class_helper' => ' ',
            'apple_store_link'         => 'Apple Store Link',
            'apple_store_link_helper'  => 'https://apps.apple.com/us/app/',
            'google_play_link'         => 'Google Play Link',
            'google_play_link_helper'  => 'https://play.google.com/store/apps/',
            'amazon_app_link'          => 'Amazon App Link',
            'amazon_app_link_helper'   => 'https://www.amazon.com',
            'loading_image'            => 'Loading Image',
            'loading_image_helper'     => 'max 600 x 600',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'created_by'               => 'Created By',
            'created_by_helper'        => ' ',
            'active'                   => 'Active',
            'active_helper'            => ' ',
        ],
    ],
];
