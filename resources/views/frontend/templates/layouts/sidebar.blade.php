<aside id="aside-forum" class="col-md-3 mb-3">
    <!-- Aside menu -->
    <div class="container-fluid">
        <nav id="aside-nav" class="card mt-3">
            <ul id="sidebar-forum">
                <li class="nav-item {{ request()->routeIs('discussions.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('discussions.index') }}">
                        <i class="fa-solid fa-comments"></i>
                        <span>All Discussion</span></a>
                </li>
                <li class="nav-item {{ request()->routeIs('discussions.myDiscussions') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('discussions.myDiscussions') }}">
                        <i class="fa-solid fa-comment"></i>
                        <span>My Discussion</span></a>
                </li>
                <li class="nav-item {{ request()->routeIs('discussions.myAnswers') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('discussions.myAnswers') }}">
                        <i class="fa-solid fa-comment-dots"></i>
                        <span>My Answer</span></a>
                </li>
                <li class="nav-item {{ request()->routeIs('discussions.mySaves') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('discussions.mySaves') }}">
                        <i class="fa-solid fa-bookmark"></i>
                        <span>Save</span></a>
                </li>
                <li class="nav-item {{ request()->routeIs('discussions.tags') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('discussions.tags') }}">
                        <i class="fa-solid fa-tags"></i>
                        <span>Tags</span></a>
                </li>
                <li class="nav-item {{ request()->routeIs('profile.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('profile.index') }}">
                        <i class="fa-solid fa-user"></i>
                        <span>Profile</span></a>
                </li>
            </ul>
        </nav>
    </div>    
</aside>