<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard.index')}}" class="brand-link">
{{--        <img src="{{ asset('/img/logo.png')}}" alt="Logo" class="brand-image img-circle elevation-3">--}}
        {{--              style="opacity: .8">--}}
        <span class="brand-text font-weight-light">{{ __('Gongni City Corporation')}}</span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            {{--            <div class="image">--}}
            {{--                <img src="{{ asset('/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">--}}
            {{--            </div>--}}
            <div class="info">
                <div class="d-flex">
{{--                    <i class=" mt-1 nav-icon fas fa-user-circle"></i>--}}
                    <a href="{{route('profile.show', auth()->user()->slug)}}" class="d-block ml-3 text-xl">{{ Auth::user()->full_name}}</a>
                </div>

{{--                <i class="mt-1 fas fa-user-shield"></i>--}}
                <span class="ml-3 text-sm" style="color: white">{{ __(auth()->user()->designation) }}</span>
            </div>
        </div>

        <!-- SidebarSearch Form -->
{{--            <div class="form-inline">--}}
{{--                <div class="input-group" data-widget="sidebar-search">--}}
{{--                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"--}}
{{--                           aria-label="Search">--}}
{{--                    <div class="input-group-append">--}}
{{--                        <button class="btn btn-sidebar">--}}
{{--                            <i class="fas fa-search fa-fw"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

    <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="{{route('dashboard.index')}}" class="nav-link {{ Route::currentRouteName() == 'dashboard.index' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            {{__('Dashboard')}}
                        </p>
                    </a>
                </li>

                @if( in_array( 'commissioner', auth()->user()->getRoleNames()->toArray() ) )
                    <li class="nav-item">
                        <a href="{{route('commissioner.index')}}" class="nav-link {{ Route::currentRouteName() == 'commissioner.index' ? 'active' : '' }}">
{{--                            <i class="nav-icon fas fa-user-secret"></i>--}}
                            <i class="nav-icon fas fa-crown"></i>
                            <p>
                                {{__('Commissioner List')}}
                            </p>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array( Route::currentRouteName() ,['commissioner.people.index']) ? 'menu-open' : '' }}">
                        <a href="{{route('commissioner.people.index')}}" class="nav-link {{ Route::currentRouteName() == 'commissioner.people.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                {{__('People Of Ward')}}
                            </p>
                        </a>
                    </li>

                @else
                    <li class="nav-item">
                        <a href="{{route('invoice.create')}}" class="nav-link {{ Route::currentRouteName() == 'invoice.create' ? 'active' : '' }}">
                            {{--                            <i class="nav-icon fas fa-th"></i>--}}
                            {{--                            <i class="nav-icon fab fa-font-awesome-alt"></i>--}}
                            <i class="nav-icon fas fa-file-invoice"></i>
                            <p>
                                {{__('Invoice')}}
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('ward.index')}}" class="nav-link {{ Route::currentRouteName() == 'ward.index' ? 'active' : '' }}">
{{--                            <i class="nav-icon fas fa-th"></i>--}}
{{--                            <i class="nav-icon fab fa-font-awesome-alt"></i>--}}
                            <i class="nav-icon fab fa-font-awesome-flag"></i>
                            <p>
                                {{__('Ward')}}
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('people.index')}}" class="nav-link {{ Route::currentRouteName() == 'people.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                {{__('People')}}
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('employee.index' )}}" class="nav-link {{ Route::currentRouteName() == 'employee.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>
                                {{__('Employees')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item {{ in_array( Route::currentRouteName() ,['market.index','publicToilet.index','educationInstitution.index', 'hospital.index'], ) ? 'menu-open' : '' }}">
                        {{--                <li class="nav-item menu-open">--}}
                        <a href="#" class="nav-link {{ in_array( Route::currentRouteName() ,['market.index','publicToilet.index','educationInstitution.index', 'hospital.index']) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-map-marker-alt"></i>
                            <p>
                                {{__('Location')}}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('market.index')}}" class="nav-link {{ Route::currentRouteName() == 'market.index' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        {{__('Market')}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('publicToilet.index')}}" class="nav-link {{ Route::currentRouteName() == 'publicToilet.index' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        {{__('Public Toilet')}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('educationInstitution.index')}}" class="nav-link {{ Route::currentRouteName() == 'educationInstitution.index' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        {{__('Education Institution')}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('hospital.index')}}" class="nav-link {{ Route::currentRouteName() == 'hospital.index' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        {{__('Hospital')}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('streetLamp.index')}}" class="nav-link {{ Route::currentRouteName() == 'streetLamp.index' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        {{__('Street Lamp')}}
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('officialForm.index' )}}" class="nav-link {{ Route::currentRouteName() == 'officialForm.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                                {{__('Official Form')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('notice.index')}}" class="nav-link {{ Route::currentRouteName() == 'notice.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                {{__('Notice')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('work.index' )}}" class="nav-link {{ Route::currentRouteName() == 'work.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>
                                {{__("Work's Status")}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item {{ in_array( Route::currentRouteName() ,['category.index','subCategory.index']) ? 'menu-open' : '' }}">
{{--                    <li class="nav-item menu-open">--}}
                        <a href="#" class="nav-link {{ in_array( Route::currentRouteName() ,['category.index','subCategory.index']) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                {{__('All Category')}}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('category.index')}}" class="nav-link {{ Route::currentRouteName() == 'category.index' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        {{__('Add Category')}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('subCategory.index')}}" class="nav-link {{ Route::currentRouteName() == 'subCategory.index' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        {{__('Add Sub-Category')}}
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('vehicleLicence.index')}}" class="nav-link {{ Route::currentRouteName() == 'vehicleLicence.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-id-badge"></i>
                            <p>
                                {{__('Vehicle Licence')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('contractorLicence.index')}}" class="nav-link {{ Route::currentRouteName() == 'contractorLicence.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-id-badge"></i>
                            <p>
                                {{__('Contractor Enlistment')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('tradeLicence.index')}}" class="nav-link {{ Route::currentRouteName() == 'tradeLicence.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-id-badge"></i>
                            <p>
                                {{__('Trade Licence')}}
                            </p>
                        </a>
                    </li>

{{--                    <li class="nav-item {{ in_array( Route::currentRouteName() ,['vehicleType.index','vehicleLicence.index']) ? 'menu-open' : '' }}">--}}
{{--                                        <li class="nav-item menu-open">--}}
{{--                        <a href="#" class="nav-link {{ in_array( Route::currentRouteName() ,['vehicleType.index','vehicleLicence.index']) ? 'active' : '' }}">--}}
{{--                            <i class="nav-icon fas fa-id-badge"></i>--}}
{{--                            <p>--}}
{{--                                {{__('Vehicle')}}--}}
{{--                                <i class="right fas fa-angle-left"></i>--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                        --}}
{{--                        <ul class="nav nav-treeview">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('vehicleLicence.index')}}" class="nav-link {{ Route::currentRouteName() == 'vehicleLicence.index' ? 'active' : '' }}">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>--}}
{{--                                        {{__('Vehicle Licence')}}--}}
{{--                                    </p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('vehicleType.index')}}" class="nav-link {{ Route::currentRouteName() == 'vehicleType.index' ? 'active' : '' }}">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>--}}
{{--                                        {{__('Vehicle Type')}}--}}
{{--                                    </p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                    <li class="nav-item {{ in_array( Route::currentRouteName() ,['reliefCard.index','reliefCategory.index']) ? 'menu-open' : '' }}">
                        {{--                <li class="nav-item menu-open">--}}
                        <a href="#" class="nav-link {{ in_array( Route::currentRouteName() ,['reliefCard.index','reliefCategory.index']) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-people-carry"></i>
                            <p>
                                {{__('Relief')}}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('reliefCard.index')}}" class="nav-link {{ Route::currentRouteName() == 'reliefCard.index' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        {{__('Relief Card')}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('reliefCategory.index')}}" class="nav-link {{ Route::currentRouteName() == 'reliefCategory.index' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        {{__('Relief Category')}}
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
{{--                    <li class="nav-item {{ in_array( Route::currentRouteName() ,['contractorLicence.index','contractorCategory.index']) ? 'menu-open' : '' }}">--}}
{{--                        --}}{{--                <li class="nav-item menu-open">--}}
{{--                        <a href="#" class="nav-link" {{ in_array( Route::currentRouteName() ,['contractorLicence.index','contractorCategory.index']) ? 'active' : '' }} >--}}
{{--                            <i class="nav-icon fas fa-id-badge"></i>--}}
{{--                            <p>--}}
{{--                                {{__('Contractor')}}--}}
{{--                                <i class="right fas fa-angle-left"></i>--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                        <ul class="nav nav-treeview">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('contractorLicence.index')}}" class="nav-link {{ Route::currentRouteName() == 'contractorLicence.index' ? 'active' : '' }}">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>--}}
{{--                                        {{__('New Contractor')}}--}}
{{--                                    </p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('contractorCategory.index')}}" class="nav-link {{ Route::currentRouteName() == 'contractorCategory.index' ? 'active' : '' }}">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>--}}
{{--                                        {{__('Contractor Category')}}--}}
{{--                                    </p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item {{ in_array( Route::currentRouteName() ,['businessCategory.index','tradeLicence.index']) ? 'menu-open' : '' }}">--}}
{{--                        --}}{{--                <li class="nav-item menu-open">--}}
{{--                        <a href="#" class="nav-link {{ in_array( Route::currentRouteName() ,['businessCategory.index','tradeLicence.index']) ? 'active' : '' }}">--}}
{{--                            <i class="nav-icon fas fa-id-badge"></i>--}}
{{--                            <p>--}}
{{--                                {{__('Trade Licence')}}--}}
{{--                                <i class="right fas fa-angle-left"></i>--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                        <ul class="nav nav-treeview">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('businessCategory.index')}}" class="nav-link {{ Route::currentRouteName() == 'businessCategory.index' ? 'active' : '' }}">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>--}}
{{--                                        {{__('Business Category')}}--}}
{{--                                    </p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('tradeLicence.index')}}" class="nav-link {{ Route::currentRouteName() == 'tradeLicence.index' ? 'active' : '' }}">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>--}}
{{--                                        {{__('New Trade Licence')}}--}}
{{--                                    </p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a href="{{route('characterCertificate.index')}}" class="nav-link {{ Route::currentRouteName() == 'characterCertificate.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-certificate"></i>
                            <p>
                                {{__('Character Certificate')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item {{ in_array( Route::currentRouteName() ,['equipmentCategory.index','equipment.index']) ? 'menu-open' : '' }}">
                        {{--                <li class="nav-item menu-open">--}}
                        <a href="#" class="nav-link {{ in_array( Route::currentRouteName() ,['equipmentCategory.index','equipment.index']) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tools"></i>
                            <p>
                                {{__('Equipment Inventory')}}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('equipmentCategory.index')}}" class="nav-link {{ Route::currentRouteName() == 'equipmentCategory.index' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        {{__('Equipment Category')}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('equipment.index')}}" class="nav-link {{ Route::currentRouteName() == 'equipment.index' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        {{__('Equipments')}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('equipmentRent.index')}}" class="nav-link {{ Route::currentRouteName() == 'equipmentRent.index' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        {{__('Rented Equipment')}}
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('tender.index')}}" class="nav-link {{ Route::currentRouteName() == 'tender.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                {{__('Tender')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('circular.index')}}" class="nav-link {{ Route::currentRouteName() == 'circular.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                {{__('Circular')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('officialOrder.index')}}" class="nav-link {{ Route::currentRouteName() == 'officialOrder.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                {{__('Official Order')}}
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('emergencyCall.index')}}" class="nav-link {{ Route::currentRouteName() == 'emergencyCall.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-phone-alt"></i>
                            <p>
                                {{__('Emergency Call')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('wasteManagement.index')}}" class="nav-link {{ Route::currentRouteName() == 'wasteManagement.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-trash"></i>
                            <p>
                                {{__('Waste Management')}}
                            </p>
                        </a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{route('smsTemplate.index')}}" class="nav-link {{ Route::currentRouteName() == 'smsTemplate.index' ? 'active' : '' }}">--}}
{{--                            <i class="nav-icon fas fa-paper-plane"></i>--}}
{{--                            <p>--}}
{{--                                {{__('Send SMS')}}--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li class="nav-item {{ in_array( Route::currentRouteName() ,['smsTemplate.index','sms.index']) ? 'menu-open' : '' }}">
                        {{--                <li class="nav-item menu-open">--}}
                        <a href="#" class="nav-link {{ in_array( Route::currentRouteName() ,['smsTemplate.index','sms.index']) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p>
                                {{__('SMS')}}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('smsTemplate.index')}}" class="nav-link {{ Route::currentRouteName() == 'smsTemplate.index' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        {{__('SMS Template')}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('sms.index')}}" class="nav-link {{ Route::currentRouteName() == 'sms.index' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        {{__('SMS List')}}
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                @endif


                <li class="nav-item {{ in_array( Route::currentRouteName() ,['profile.passUpdateIndex','profile.edit']) ? 'menu-open' : '' }}">
                    {{--                <li class="nav-item menu-open">--}}
                    <a href="#" class="nav-link {{ in_array( Route::currentRouteName() ,['profile.passUpdateIndex','profile.edit']) ? 'active' : '' }}">
{{--                        <i class="nav-icon fas fa-tachometer-alt"></i>--}}
{{--                        <i class="nav-icon fas fa-id-card"></i>--}}
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            {{__('Profile')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('profile.passUpdateIndex')}}" class="nav-link {{ Route::currentRouteName() == 'profile.passUpdateIndex' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    {{__('Update Password')}}
                                </p>
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{route('profile.show', auth()->user()->id)}}" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>View Profile</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <li class="nav-item">
                            <a href="{{route('profile.edit', auth()->user()->slug)}}" class="nav-link {{ Route::currentRouteName() == 'profile.edit' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    {{__('Update Profile')}}
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--                    <li class="nav-header">EXAMPLES</li>--}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
