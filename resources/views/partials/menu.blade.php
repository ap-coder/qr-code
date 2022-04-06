<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('qr_code_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.qr-codes.index") }}" class="nav-link {{ request()->is("admin/qr-codes") || request()->is("admin/qr-codes/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-qrcode">

                            </i>
                            <p>
                                {{ trans('cruds.qrCode.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('qr_type_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.qr-types.index") }}" class="nav-link {{ request()->is("admin/qr-types") || request()->is("admin/qr-types/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.qrType.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('type_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/business-pages*") ? "menu-open" : "" }} {{ request()->is("admin/vcards*") ? "menu-open" : "" }} {{ request()->is("admin/websites*") ? "menu-open" : "" }} {{ request()->is("admin/social-channels*") ? "menu-open" : "" }} {{ request()->is("admin/events*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon far fa-check-square">

                            </i>
                            <p>
                                {{ trans('cruds.type.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('business_page_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.business-pages.index") }}" class="nav-link {{ request()->is("admin/business-pages") || request()->is("admin/business-pages/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-map-marked-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.businessPage.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('vcard_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.vcards.index") }}" class="nav-link {{ request()->is("admin/vcards") || request()->is("admin/vcards/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-address-card">

                                        </i>
                                        <p>
                                            {{ trans('cruds.vcard.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('website_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.websites.index") }}" class="nav-link {{ request()->is("admin/websites") || request()->is("admin/websites/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-link">

                                        </i>
                                        <p>
                                            {{ trans('cruds.website.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('social_channel_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.social-channels.index") }}" class="nav-link {{ request()->is("admin/social-channels") || request()->is("admin/social-channels/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-share-square">

                                        </i>
                                        <p>
                                            {{ trans('cruds.socialChannel.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('event_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.events.index") }}" class="nav-link {{ request()->is("admin/events") || request()->is("admin/events/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-calendar-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.event.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('setting_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/qr-colors*") ? "menu-open" : "" }} {{ request()->is("admin/hours*") ? "menu-open" : "" }} {{ request()->is("admin/socials*") ? "menu-open" : "" }} {{ request()->is("admin/qr-industries*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.setting.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('qr_color_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.qr-colors.index") }}" class="nav-link {{ request()->is("admin/qr-colors") || request()->is("admin/qr-colors/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-palette">

                                        </i>
                                        <p>
                                            {{ trans('cruds.qrColor.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('hour_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.hours.index") }}" class="nav-link {{ request()->is("admin/hours") || request()->is("admin/hours/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-clock">

                                        </i>
                                        <p>
                                            {{ trans('cruds.hour.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('social_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.socials.index") }}" class="nav-link {{ request()->is("admin/socials") || request()->is("admin/socials/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-share-square">

                                        </i>
                                        <p>
                                            {{ trans('cruds.social.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('qr_industry_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.qr-industries.index") }}" class="nav-link {{ request()->is("admin/qr-industries") || request()->is("admin/qr-industries/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-industry">

                                        </i>
                                        <p>
                                            {{ trans('cruds.qrIndustry.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>