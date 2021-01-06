<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li>
            <select class="searchable-field form-control">

            </select>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/teams*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('team_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.teams.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/teams") || request()->is("admin/teams/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.team.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('country_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.countries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/countries") || request()->is("admin/countries/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-flag c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.country.title') }}
                </a>
            </li>
        @endcan
        @can('currency_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.currencies.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/currencies") || request()->is("admin/currencies/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-money-bill-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.currency.title') }}
                </a>
            </li>
        @endcan
        @can('bank_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.banks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/banks") || request()->is("admin/banks/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-university c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.bank.title') }}
                </a>
            </li>
        @endcan
        @can('category_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/categories") || request()->is("admin/categories/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-folder c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.category.title') }}
                </a>
            </li>
        @endcan
        @can('budget_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.budgets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/budgets") || request()->is("admin/budgets/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-file-invoice-dollar c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.budget.title') }}
                </a>
            </li>
        @endcan
        @can('target_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.targets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/targets") || request()->is("admin/targets/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bullseye c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.target.title') }}
                </a>
            </li>
        @endcan
        @can('account_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.accounts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/accounts") || request()->is("admin/accounts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-money-check-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.account.title') }}
                </a>
            </li>
        @endcan
        @can('additional_data_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/target-categories*") ? "c-show" : "" }} {{ request()->is("admin/account-types*") ? "c-show" : "" }} {{ request()->is("admin/card-types*") ? "c-show" : "" }} {{ request()->is("admin/auto-brands*") ? "c-show" : "" }} {{ request()->is("admin/hidden-categories*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-info-circle c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.additionalData.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('target_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.target-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/target-categories") || request()->is("admin/target-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-folder c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.targetCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('account_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.account-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/account-types") || request()->is("admin/account-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-keyboard c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.accountType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('card_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.card-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/card-types") || request()->is("admin/card-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-credit-card c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.cardType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('auto_brand_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.auto-brands.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/auto-brands") || request()->is("admin/auto-brands/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.autoBrand.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('hidden_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.hidden-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/hidden-categories") || request()->is("admin/hidden-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-affiliatetheme c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.hiddenCategory.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('accounts_extra_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.accounts-extras.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/accounts-extras") || request()->is("admin/accounts-extras/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-user-circle c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.accountsExtra.title') }}
                </a>
            </li>
        @endcan
        @can('operation_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.operations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/operations") || request()->is("admin/operations/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-hand-holding-usd c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.operation.title') }}
                </a>
            </li>
        @endcan
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.systemCalendar") }}" class="c-sidebar-nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "c-active" : "" }}">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>
        @if(\Illuminate\Support\Facades\Schema::hasColumn('teams', 'owner_id') && \Domains\Teams\Models\Team::where('owner_id', auth()->user()->id)->exists())
            <li class="c-sidebar-nav-item">
                <a class="{{ request()->is("admin/team-members") || request()->is("admin/team-members/*") ? "c-active" : "" }} c-sidebar-nav-link" href="{{ route("admin.team-members.index") }}">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-users">
                    </i>
                    <span>{{ trans("global.team-members") }}</span>
                </a>
            </li>
        @endif
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
