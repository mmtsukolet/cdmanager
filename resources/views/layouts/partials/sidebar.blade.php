<aside class="sidebar">
    <div class="scroll-sidebar">

        @if(auth()->check())
            @if(session()->get('theme-layout') != 'fix-header')
                <div class="user-profile">
                    <div class="dropdown user-pro-body ">
                        <div class="profile-image">
                            @if(auth()->user()->profile->pic == null)
                                <img src="{{asset('storage/uploads/users/no_avatar.jpg')}}" alt="user-img"
                                     class="img-circle">
                            @else
                                <img src="{{asset('storage/uploads/users/'.auth()->user()->profile->pic)}}"
                                     alt="user-img" class="img-circle">
                            @endif


                            <a href="javascript:void(0);" class="dropdown-toggle u-dropdown text-blue"
                               data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="badge badge-danger">
                            <i class="fa fa-angle-down"></i>
                        </span>
                            </a>
                            <ul class="dropdown-menu animated flipInY">
                                <li><a href="{{url('profile')}}"><i class="fa fa-user"></i> Profile</a></li>
                                {{--<li><a href="javascript:void(0);"><i class="fa fa-inbox"></i> Inbox</a></li>--}}
                                <li role="separator" class="divider"></li>
                                <li><a href="{{'account-settings'}}"><i class="fa fa-cog"></i> Account Settings</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href=""><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </div>
                        <p class="profile-text m-t-15 font-16"><a
                                    href="javascript:void(0);"> {{auth()->user()->name}}</a></p>
                    </div>
                </div>
            @endif
            <nav class="sidebar-nav">
                <ul id="side-menu">

                    <li>
                        <a class="active waves-effect" href="{{url('dashboard')}}" aria-expanded="false"><i
                                    class="icon-screen-desktop fa-fw"></i> <span
                                    class="hide-menu"> Dashboard </span></a>
                    </li>
                    @if(auth()->user()->isAdmin() == true)

                        <li><a class="waves-effect" href="{{asset('role-management')}}">
                                <i class=" icon-layers fa-fw"></i><span class="hide-menu"> Roles </span></a>
                        </li>
                        <li class="two-column">
                            <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                        class="icon-user fa-fw"></i> <span class="hide-menu"> Users</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{asset('users')}}">Manage Users</a></li>
                                <li><a href="{{asset('user/create')}}">Add New User</a></li>
                                <li><a href="{{asset('user/deleted')}}">Deleted Users</a></li>

                            </ul>
                        </li>

                        <li>
                            <a class="waves-effect" href="{{ url('account-settings') }}">
                                <i class="fa fa-gear fa-fw"></i>
                                <span class="hide-menu"> Account Settings</span>
                            </a>
                        </li>

                        <li>
                            <hr/>
                        </li>

                        {{--<li><a class="waves-effect" href="{{asset('permission-management')}}"> <i--}}
                        {{--class="icon-list fa-fw"></i><span class="hide-menu"> Permissions</span></a></li>--}}

                    @endif
                    @foreach($laravelAdminMenus->menus as $section)
                        @if(count(collect($section->items)) > 0)
                            @foreach($section->items as $menu)
                                @can('view-'.str_slug($menu->title))
                                    <li>
                                        <a class="waves-effect" href="{{ url($menu->url) }}">
                                            <i class="glyphicon {{$menu->icon}} fa-fw"></i>
                                            <span class="hide-menu">  {{ $menu->title }}</span>
                                        </a>
                                    </li>
                                @endcan
                            @endforeach
                        @endif
                    @endforeach



                </ul>
            </nav>
        @else
                <div class="list-group m-b-0">
                   <h4 align="center">Welcome to Cubic</h4>
                </div>
                <div class="list-group">
                    <span class="list-group-item bg-primary no-border text-center">Tags</span>
                </div>
        @endif


    </div>
</aside>
