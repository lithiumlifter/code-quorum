<aside id="aside-forum" class="col-md-3 mb-3">
    <!-- Aside menu -->
    <div class="container-fluid">
        <nav id="aside-nav" class="card mt-3" style="border: none">
            <ul id="sidebar-forum" style="list-style: none; padding-left: 0;">
                <li class="nav-item {{ request()->routeIs('discussions.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('discussions.index') }}">
                        <i class="fa-solid fa-comments {{ request()->routeIs('discussions.index') ? 'text-blue' : 'text-muted' }}"></i>
                        <span class="nav-text">All Discussions</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('discussions.myDiscussions') ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center" href="{{ route('discussions.myDiscussions') }}">
                        <i class="fa-solid fa-comment {{ request()->routeIs('discussions.myDiscussions') ? 'text-blue' : 'text-muted' }}"></i>
                        <span class="nav-text">My Discussions</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('discussions.myAnswers') ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center" href="{{ route('discussions.myAnswers') }}">
                        <i class="fa-solid fa-comment-dots {{ request()->routeIs('discussions.myAnswers') ? 'text-blue' : 'text-muted' }}"></i>
                        <span class="nav-text">My Answers</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('discussions.mySaves') ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center" href="{{ route('discussions.mySaves') }}">
                        <i class="fa-solid fa-bookmark {{ request()->routeIs('discussions.mySaves') ? 'text-blue' : 'text-muted' }}"></i>
                        <span class="nav-text">Bookmarks</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('discussions.tags') ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center" href="{{ route('discussions.tags') }}">
                        <i class="fa-solid fa-tags {{ request()->routeIs('discussions.tags') ? 'text-blue' : 'text-muted' }}"></i>
                        <span class="nav-text">Tags</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('profile.index') ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center" href="{{ route('profile.index') }}">
                        <i class="fa-solid fa-user {{ request()->routeIs('profile.index') ? 'text-blue' : 'text-muted' }}"></i>
                        <span class="nav-text">Profile</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('profile.settingShow') ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center" href="{{ route('profile.settingShow') }}">
                        <i class="fa-solid fa-gear {{ request()->routeIs('profile.settingShow') ? 'text-blue' : 'text-muted' }}"></i>
                        <span class="nav-text">Setting</span>
                    </a>
                </li>
            </ul>
        </nav>        
    </div>    
</aside>