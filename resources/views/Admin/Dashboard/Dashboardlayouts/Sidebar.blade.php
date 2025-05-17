<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:black">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link" style='background-color:black'>
        <img src="{{ asset('storage/photos/' . $setting->logo_footer) }}" alt="User Logo"
            class="brand-image img-circle elevation-3 " style="opacity: .8;width:45%;">
        <span class="brand-text font-weight-light">{{ auth()->user()->name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Dashboard -->
                @can('manage dashboard')
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt m-1"></i>
                            <p>
                                Dashboard Management
                            </p>
                        </a>
                    </li>
                @endcan
                <!-- Permissions -->
                @can('manage permissions')
                    <li class="nav-item has-treeview">
                        <a href="{{ route('permissions.index') }}" class="nav-link">
                            <i class="fa-solid fa-key m-2"></i>
                            <p>Permissions Management</p>
                        </a>
                    </li>
                @endcan

                <!-- Manage Teams -->
                @can('manage teams')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-users m-1"></i>
                            <p>Team Management<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('teams.index') }}" class="nav-link">
                                    <i class="fa-solid fa-viruses m-2"></i>
                                    <p>Team Info</p>
                                </a>
                            </li>
                        </ul>
                @endcan


                    <!-- Manage Users -->
                    @can('manage users')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fa-solid fa-person-chalkboard m-1"></i>
                                <p>User Management<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link">
                                        <i class="fa-solid fa-viruses m-2"></i>
                                        <p>User Info</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('haspermissions') }}" class="nav-link">
                                        <i class="fa-solid fa-users m-2"></i>
                                        <p>User Has Permissions</p>
                                    </a>
                                </li>
                            </ul>
                    @endcan

                    <!-- Setting Management -->
                    @can('manage settings')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fa-solid fa-screwdriver-wrench m-2"></i>
                                <p>App Management<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('settings.index') }}" class="nav-link">
                                        <i class="fa-solid fa-wrench m-2"></i>
                                        <p>Settings</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan

                <!-- Room Management -->
                @can('manage rooms')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-house m-1"></i>
                            <p>Room Management <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('rooms.index') }}" class="nav-link">
                                    <i class="fa-solid fa-person-booth m-2"></i>
                                    <p>All Rooms</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('facilities.index') }}" class="nav-link">
                                    <i class="fa-solid fa-trophy m-1"></i>
                                    <p>Facilities</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan





                <!-- Booking Management -->

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa-regular fa-building m-1"></i>
                        <p>Booking Management <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- Only Admin and Super Admin can see 'All Bookings' -->
                        @can('manage bookings')
                            <li class="nav-item">
                                <a href="{{ route('bookings.index') }}" class="nav-link">
                                    <i class="fa-solid fa-calendar-days m-1"></i>
                                    <p>Bookings</p>
                                </a>
                            </li>
                        @endcan

                        <!-- Only Admin and Super Admin can see 'All Booking History' -->
                        @can('manage bookings')
                            <li class="nav-item">
                                <a href="{{ route('bookings.history') }}" class="nav-link">
                                    <i class="fa-solid fa-clock-rotate-left m-1"></i>
                                    <p>Booking History</p>
                                </a>
                            </li>
                        @endcan

                        <!-- Only Customers can see 'Booking Information' -->
                        @cannot('manage bookings')
                        <li class="nav-item">
                            <a href="{{ route('bookings.my') }}" class="nav-link">
                                <i class="fa-solid fa-clock-rotate-left m-1"></i>
                                <p>Booking Information</p>
                            </a>
                        </li>
                        @endcannot

                        <!-- Only Admin and Super Admin can see 'Booking History' -->
                        @can('manage bookings')
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fa-solid fa-clock-rotate-left m-1"></i>
                                    <p>Previous Bookings</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>



                <!-- Team Details -->
                @can('manage reviews')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa-regular fa-building m-1"></i>
                            <p>Review Management <i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('reviews.index') }}" class="nav-link">
                                    <i class="fa-solid fa-calendar-days m-1"></i>
                                    <p>Review Info</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('manage faqs')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa-regular fa-building m-1"></i>
                            <p>FAQ's Management <i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('faqs.index') }}" class="nav-link">
                                    <i class="fa-solid fa-calendar-days m-1"></i>
                                    <p>FAQ Info</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('manage payments')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa-regular fa-building m-1"></i>
                            <p>Payment Management <i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('reviews.index') }}" class="nav-link">
                                    <i class="fa-solid fa-calendar-days m-1"></i>
                                    <p>Payment Info</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa-regular fa-building m-1"></i>
                        <p>Profile Management <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('profile.show') }}" class="nav-link">
                                <i class="fa-solid fa-calendar-days m-1"></i>
                                <p>Profile Info</p>
                            </a>
                        </li>
                    </ul>
                </li>


                @can('manage contacts')
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{ route('contact.index') }}" class="nav-link">
                            <i class="fa-solid fa-address-book m-1"></i>
                            <p>
                                Contact Form
                            </p>
                        </a>
                    </li>
                @endcan
                <!-- Logout -->
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="fa-solid fa-lock m-2" style="color: #a50303;"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>