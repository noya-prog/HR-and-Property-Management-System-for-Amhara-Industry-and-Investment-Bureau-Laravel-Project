<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="" />
            <span class="d-none d-lg-block text-uppercase">
                @foreach (auth()->user()->roles as $role)
                    {{ $role->name }}
                @endforeach Panel
            </span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <div class="" style="color:#012970 ">
        <h5 class="mt-2 ms-3 fw-bold text-uppercase">
            {{__('Amhara Industry And Investment Bureau')}}
        </h5>
    </div>
    {{-- <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword" />
            <button type="submit" title="Search">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div> --}}
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle" href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell "></i>
                        @foreach (Auth::user()->unreadnotifications as $not)
                            <span class="badge bg-danger badge-number w-4"
                                style="width
                            100px">{{ $loop->iteration }}</span>
                        @endforeach
                    </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">

                        @forelse (Auth::user()->unreadnotifications as $not)
                        @if ($not->type === 'App\Notifications\NewUserNotification')
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li class="notification-item">
                                <i class="bi bi-check-circle text-success"></i>
                                <div>
                                    <p>{{__('New Employee')}}</p>
                                    <h4>{{ $not->data['name'] }} {{ $not->data['mname'] }} {{ $not->data['lname'] }}</h4>
                                    <p>{{__('is added')}}</p>
                                    <a href="{{ route('markasread', $not->id) }}"
                                        class="text-danger ms-auto markasread ">{{__('Mark as read')}}</a>
                                </div>
                            </li>
                    @elseif ($not->type === 'App\Notifications\AcceptedRequestNotification') 
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>{{ $not->data['name'] }} {{ $not->data['mname'] }} {{ $not->data['lname'] }}</h4>
                                <p>{{__('Your request for item')}} {{$not->data['item_name']}}</p>
                                <p>{{__('Amount')}} {{$not->data['amount']}} {{__('is accepted')}}</p>
                                <a href="{{ route('markasread', $not->id) }}"
                                    class="text-danger ms-auto markasread ">{{__('Mark as read')}}</a>
                            </div>
                        </li>
                    @elseif ($not->type === 'App\Notifications\ItemRequestNotificaton') 
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>{{ $not->data['name'] }} {{ $not->data['mname'] }} {{ $not->data['lname'] }}</h4>
                                    <p>{{__('Requested an item')}}</p>
                                <a href="{{ route('markasread', $not->id) }}"
                                    class="text-danger ms-auto markasread ">{{__('Mark as read')}}</a>
                            </div>
                        </li>
                    @elseif ($not->type === 'App\Notifications\DeclinedRequestNotification') 
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>{{ $not->data['name'] }} {{ $not->data['mname'] }} {{ $not->data['lname'] }}</h4>
                                <p>{{__('Your request for item')}} {{$not->data['item_name']}}</p>
                                <p>{{__('Amount')}} {{$not->data['amount']}} {{__('is declined')}}</p>
                                <a href="{{ route('markasread', $not->id) }}"
                                    class="text-danger ms-auto markasread ">{{__('Mark as read')}}</a>
                            </div>
                        </li>
                        @endif

                        @empty
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li class="notification-item">
                                <i class="bi bi-check-circle text-success"></i>
                                <div>
                                    <p>{{__('No record found')}}</p>
                                </div>
                            </li>
                        @endforelse
                </ul>
            </li>
           
            {{-- @role('HR officer')
            <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell "></i>
                        @foreach (Auth::user()->unreadnotifications as $not)
                            <span class="badge bg-danger badge-number w-4"
                                style="width
                            100px">{{ $loop->iteration }}</span>
                        @endforeach
                    </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">

                        @forelse (Auth::user()->unreadnotifications as $not)
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li class="notification-item">
                                <i class="bi bi-check-circle text-success"></i>
                                <div>
                                    <h4>{{ $not->data['name'] }} {{ $not->data['mname'] }} {{ $not->data['lname'] }}</h4>
                                    <p>{{__('New Item Request')}}</p>
                                    <p>{{__('is added')}}</p>
                                    <a href="{{ route('markasread', $not->id) }}"
                                        class="text-danger ms-auto markasread ">{{__('Mark as read')}}</a>
                                </div>
                            </li>
                        @empty
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li class="notification-item">
                                <i class="bi bi-check-circle text-success"></i>
                                <div>
                                    <p>{{__('No record found')}}</p>
                                </div>
                            </li>
                        @endforelse
                
                </ul>
            </li>
            @endrole --}}
            </li>
            </div>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{ Config::get('languages')[App::getLocale()] }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @foreach (Config::get('languages') as $lang => $language)
                        @if ($lang != App::getLocale())
                            <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"> {{ $language }}</a>
                        @endif
                    @endforeach
                </div>
            </li>
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle" />
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}
                        {{ $user_data->mname }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ Auth::user()->name }} {{ $user_data->mname }} {{ $user_data->lname }}</h6>
                        <span>{{ Auth::user()->role }}</span>
                        <span>{{ $user_data->job_title }}<br></span>
                        <span>{{ $user_data->department_name }} ክፍል<br></span>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <a href="{{ route('viewProfile') }}" class="dropdown-item d-flex align-items-center">
                            <i class="bi bi-person"></i> <span>{{__('My Profile')}}</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <a href="{{ route('settings.index') }}" class="dropdown-item d-flex align-items-center">
                            <i class="bi bi-gear"></i> <span>{{__('Change Password')}}</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    {{-- <li>
                        <a class="dropdown-item d-flex align-items-center">
                            <i class="bi bi-question-circle"></i> <span>Need Help?</span>
                        </a>
                    </li> --}}
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="dropdown-item text-danger">
                                <i class="ri-shut-down-line align-middle me-1 text-danger"></i> {{__('Logout')}}
                            </button>

                        </form>
                        {{-- <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class="bi bi-box-arrow-right"></i> <span>Sign Out</span>
                        </a> --}}

                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
