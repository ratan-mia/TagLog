<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("homepage") }}" class="nav-link" target="_blank">
                    <i class="nav-icon fas fa-eye">
                    </i>
                    {{ trans('global.homepage') }}
                </a>
            </li>
            @can('site_setting_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.siteSetting.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('setting_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.settings.index") }}"
                                   class="nav-link {{ request()->is('admin/settings') || request()->is('admin/settings/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-cogs nav-icon">

                                    </i>
                                    {{ trans('cruds.setting.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('country_access')
                <li class="nav-item">
                    <a href="{{ route("admin.countries.index") }}"
                       class="nav-link {{ request()->is('admin/countries') || request()->is('admin/countries/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-flag nav-icon">

                        </i>
                        {{ trans('cruds.country.title') }}
                    </a>
                </li>
            @endcan
            @can('destination_access')
                <li class="nav-item">
                    <a href="{{ route("admin.destinations.index") }}"
                       class="nav-link {{ request()->is('admin/destinations') || request()->is('admin/destinations/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.destination.title') }}
                    </a>
                </li>
            @endcan
            @can('city_access')
                <li class="nav-item">
                    <a href="{{ route("admin.cities.index") }}"
                       class="nav-link {{ request()->is('admin/cities') || request()->is('admin/cities/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.city.title') }}
                    </a>
                </li>
            @endcan
            @can('company_access')
                <li class="nav-item">
                    <a href="{{ route("admin.companies.index") }}"
                       class="nav-link {{ request()->is('admin/companies') || request()->is('admin/companies/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.company.title') }}
                    </a>
                </li>
            @endcan

            @can('visa_access')
                <li class="nav-item">
                    <a href="{{ route("admin.visas.index") }}"
                       class="nav-link {{ request()->is('admin/visas') || request()->is('admin/visas/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.visa.title') }}
                    </a>
                </li>
            @endcan
            @can('industry_access')
                <li class="nav-item">
                    <a href="{{ route("admin.industries.index") }}"
                       class="nav-link {{ request()->is('admin/industries') || request()->is('admin/industries/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-chalkboard-teacher nav-icon">

                        </i>
                        {{ trans('cruds.industry.title') }}
                    </a>
                </li>
            @endcan
            @can('category_access')
                <li class="nav-item">
                    <a href="{{ route("admin.categories.index") }}"
                       class="nav-link {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.category.title') }}
                    </a>
                </li>
            @endcan
            @can('agent_access')
                <li class="nav-item">
                    <a href="{{ route("admin.agents.index") }}"
                       class="nav-link {{ request()->is('admin/agents') || request()->is('admin/agents/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-user nav-icon">

                        </i>
                        {{ trans('cruds.agent.title') }}
                    </a>
                </li>
            @endcan
            @can('employer_access')
                <li class="nav-item">
                    <a href="{{ route("admin.employers.index") }}"
                       class="nav-link {{ request()->is('admin/employers') || request()->is('admin/employers/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-briefcase nav-icon">

                        </i>
                        {{ trans('cruds.employer.title') }}
                    </a>
                </li>
            @endcan
            @can('experience_access')
                <li class="nav-item">
                    <a href="{{ route("admin.experiences.index") }}"
                       class="nav-link {{ request()->is('admin/experiences') || request()->is('admin/experiences/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-crown nav-icon">

                        </i>
                        {{ trans('cruds.experience.title') }}
                    </a>
                </li>
            @endcan
            @can('share_experience')
                <li class="nav-item">
                    <a href="{{ route("user.experience-form") }}" class="nav-link" target="_blank">
                        <i class="nav-icon fas fa-eye">
                        </i>
                        {{ trans('global.share-experience') }}
                    </a>
                </li>
            @endcan
            @can('comment_access')
                <li class="nav-item">
                    <a href="{{ route("admin.comments.index") }}"
                       class="nav-link {{ request()->is('admin/comments') || request()->is('admin/comments/*') ? 'active' : '' }}">
                        <i class="fa-fw far fa-chart-bar nav-icon">

                        </i>
                        {{ trans('cruds.comment.title') }}
                    </a>
                </li>
            @endcan
            @can('partner_access')
                <li class="nav-item">
                    <a href="{{ route("admin.partners.index") }}"
                       class="nav-link {{ request()->is('admin/partners') || request()->is('admin/partners/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-hands-helping nav-icon">

                        </i>
                        {{ trans('cruds.partner.title') }}
                    </a>
                </li>
            @endcan
            @can('member_access')
                <li class="nav-item">
                    <a href="{{ route("admin.members.index") }}"
                       class="nav-link {{ request()->is('admin/members') || request()->is('admin/members/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.member.title') }}
                    </a>
                </li>
            @endcan
            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}"
                                   class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}"
                                   class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}"
                                   class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('interview_access')
                <li class="nav-item">
                    <a href="{{ route("admin.interviews.index") }}" class="nav-link {{ request()->is('admin/interviews') || request()->is('admin/interviews/*') ? 'active' : '' }}">
                        <i class="fa-fw far fa-calendar-alt nav-icon">

                        </i>
                        {{ trans('cruds.interview.title') }}
                    </a>
                </li>
            @endcan
            <li class="nav-item">
                <a href="#" class="nav-link"
                   onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
