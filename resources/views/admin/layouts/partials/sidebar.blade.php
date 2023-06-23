<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="dropdown header-profile">
                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                    <img src="{{ asset('dist/images/profile/pic1.jpg') }}" width="20" alt="">
                    <div class="header-info ms-3">
                        <span class="font-w600 ">Hi,<b>{{ Auth::guard('web')->user()?->name }}</b></span>
                        <small class="text-end font-w400">{{ Auth::guard('web')->user()?->email }}</small>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="app-profile.html" class="dropdown-item ai-icon">
                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <span class="ms-2">Profile </span>
                    </a>

                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit();" class="dropdown-item ai-icon">
                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                            <span class="ms-2">Logout </span>
                        </a>
                    </form>
                </div>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="index.html">Dashboard Light</a></li>
                    <li><a href="index-2.html">Dashboard Dark</a></li>
                    <li><a href="my-wallet.html">My Wallet</a></li>
                    <li><a href="page-invoices.html">Invoices</a></li>
                    <li><a href="cards-center.html">Cards Center</a></li>
                    <li><a href="page-transaction.html">Transaction</a></li>
                    <li><a href="transaction-details.html">Transaction Details</a></li>	
                </ul>

            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Employee</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('employee.index') }}">Employee list</a></li>
                    <li><a href="{{ route('employee.create') }}">Add Employee</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>