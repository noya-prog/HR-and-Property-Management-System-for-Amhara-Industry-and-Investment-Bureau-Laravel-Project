@php
    $route = Route::current();
    $routeName = $route->getName();
@endphp
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav " id="sidebar-nav">
        @can('Dashboard access')
            <li class="nav-item">
                <a class="nav-link {{ $routeName == 'home' ? 'active' : 'collapsed' }} " href="{{ route('home') }}">
                    <i class="bi bi-grid"></i> <span>{{ __('Dashboard') }}</span>
                </a>
            </li>
        @endcan
        @can('Authorization access')
            <li class="nav-item">
                <a class="nav-link collapsed " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gear"></i><span>{{ __('Authorization') }} </span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav"
                    class="nav-content collapse {{ in_array($routeName, ['roles.index', 'permissions.index', 'users']) ? 'show' : '' }} "
                    data-bs-parent="#sidebar-nav">
                    @canany('Role access', 'Role create', 'Role edit', 'Role delete')
                        <li>
                            <a href="{{ route('roles.index') }}" class="{{ $routeName == 'roles.index' ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>{{ __('Role') }}</span>
                            </a>
                        </li>
                    @endcanany
                    @can('Permission access')
                        <li>
                            <a href="{{ route('permissions.index') }}"
                                class="{{ $routeName == 'permissions.index' ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>{{ __('Permission') }}</span>
                            </a>
                        </li>
                    @endcan
                    @can('User access')
                        <li>
                            <a href="{{ route('users') }}" class="{{ $routeName == 'users' ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>{{ __('Users') }}</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('Structure access')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#structure" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>{{ __('Structure') }}</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="structure"
                    class="nav-content collapse {{ in_array($routeName, ['job_title', 'bureau_structure']) ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    @can('Bureau_Structure access')
                        <li>
                            <a href="{{ route('bureau_structure') }}"
                                class="{{ $routeName == 'bureau_structure' ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>{{ __('Bureau Structure') }}</span>
                            </a>
                        </li>
                    @endcan
                    @can('job_title access')
                        <li>
                            <a href="{{ route('job_title') }}" class="{{ $routeName == 'job_title' ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>{{ __('Job Title') }}</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('HR_Management access')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>{{ __('HR Management') }} </span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav"
                    class="nav-content collapse {{ in_array($routeName, ['personal_information', 'dependents', 'emergency', 'expereince', 'education', 'are_colateral', 'have_colateral']) ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    @can('Personal_information access')
                        <li>
                            <a href="{{ route('personal_information') }}"
                                class="{{ $routeName == 'personal_information' ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>{{ __('Personal Information') }}</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('dependents') }}" class="{{ $routeName == 'dependents' ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>{{ __('Dependents') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('emergency') }}" class="{{ $routeName == 'emergency' ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>{{ __('Emergency Contact') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('expereince') }}" class="{{ $routeName == 'experience' ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>{{ __('Employee Experience') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('education') }}" class="{{ $routeName == 'education' ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>{{ __('Employee Education') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('are_colateral') }} "
                                class="{{ $routeName == 'are_colateral' ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>{{ __('Are colateral') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('have_colateral') }}"
                                class="{{ $routeName == 'have_colateral' ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>{{ __('Have colateral') }}</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        <hr>
        @can('Property_Management access')
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#equipment-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-wrench"></i><span>{{ __('Property Management') }}</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="equipment-nav" class="nav-content collapse {{ in_array($routeName, ['register.index', 'limitedItem.index','permanentItem.index','manager_requested_lim','manager_requested_per','requested_items','received_items','approved_lim_requests','approved_per_requests']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
        @can('Register_item access')
            
        <li>
            <a href="{{ route('register.index') }}" class="{{ $routeName == 'register.index' ? 'active' : '' }}" style="font-size: 100%">
                <span>{{ __('Register Items') }}</span>
            </a>
        </li>
        @endcan
        @can('Request_item access')
            
       
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#Request" data-bs-toggle="collapse" href="#" style="font-size: 100%">
                        <span>{{ __('Request Items') }}</span><i class="bi bi-chevron-down ms-auto" style="font-size: 100%"></i>
                    </a>
                    <ul id="Request" class="nav-content collapse {{ in_array($routeName, ['limitedItem.index', 'permanentItem.index']) ? 'show' : '' }}" data-bs-parent="#equipment-nav">
                        <li>
                            <a href="{{ route('limitedItem.index') }}" class="{{ $routeName == 'limitedItem.index' ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>{{ __('Request Limited Items') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('permanentItem.index') }}" class="{{ $routeName == 'permanentItem.index' ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>{{ __('Request Permanent Items') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('Requested_items access')
                    
                
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#Requested_items" data-bs-toggle="collapse" href="#" style="font-size: 100%">
                      <span>{{ __('Requested Items') }}</span><i class="bi bi-chevron-down ms-auto" style="font-size: 100%"></i>
                    </a>
                    <ul id="Requested_items" class="nav-content collapse {{ in_array($routeName, ['manager_requested_lim', 'manager_requested_per']) ? 'show' : '' }}" data-bs-parent="#equipment-nav">
                        <li>
                            <a href="{{ route('manager_requested_lim') }}" class="{{ $routeName == 'manager_requested_lim' ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>{{ __('Requested Limited Items') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('manager_requested_per') }}" class="{{ $routeName == 'manager_requested_per' ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>{{ __('Requested Permanent Items') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('My_items access')
                    
              
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#my-items" data-bs-toggle="collapse" href="#" style="font-size: 100%">
                        <span >{{ __('My Items') }}</span><i class="bi bi-chevron-down ms-auto" style="font-size: 100%"></i>
                    </a>
                    <ul id="my-items" class="nav-content collapse {{ in_array($routeName, ['requested_items','received_items']) ? 'show' : '' }}" data-bs-parent="#equipment-nav">
                        <li>
                            <a href="{{ route('requested_items') }}" class="{{ $routeName == 'requested_items' ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>{{ __('Requested Items') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('received_items') }}" class="{{ $routeName == 'received_items' ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>{{ __('Received Items') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('Approved_requests access')
                    
                
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#approved_requests" data-bs-toggle="collapse" href="#" style="font-size: 100%">
                        <span>{{ __('Approved Item Requests') }}</span><i class="bi bi-chevron-down ms-auto" style="font-size: 100%"></i>
                    </a>
                    <ul id="approved_requests" class="nav-content collapse {{ in_array($routeName, ['approved_lim_requests','approved_per_requests']) ? 'show' : '' }}" data-bs-parent="#equipment-nav">
                        <li>
                            <a href="{{ route('approved_lim_requests') }}" class="{{ $routeName == 'approved_lim_requests' ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>{{ __('Approved Limited Items') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('approved_per_requests') }}" class="{{ $routeName == 'approved_per_requests' ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>{{ __('Approved Permanent Items') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan
            </ul>
        
        </li>
        @endcan
        @can('Post access')
  
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#post" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>{{ __('Post') }} </span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="post"
                class="nav-content collapse {{ in_array($routeName, ['create-post', 'view-post']) ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
            @can('Post create')
            
                <li>
                    <a href="{{ route('create-post') }}" class="{{ $routeName == 'create-post' ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>{{ __('Create Post') }}</span>
                    </a>
                </li>
                @endcan
                @can('Post view')
                    
                
                <li>
                    <a href="{{ route('view-post') }}" class="{{ $routeName == 'view-post' ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>{{ __('View Posts') }}</span>
                    </a>
                </li>
                @endcan
            </ul>
        </li>   
        @endcan
    </ul>
</aside>
