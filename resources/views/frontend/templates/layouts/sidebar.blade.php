<aside id="aside-forum" class="col-md-3 mb-3">
    <!-- Aside menu -->
    <div class="container-fluid">
        <nav id="aside-nav" class="card mt-3" style="border: none">
            <ul id="sidebar-forum">
                <li class="nav-item {{ request()->routeIs('discussions.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('discussions.index') }}">
                        <i class="fa-solid fa-comments {{ request()->routeIs('discussions.index') ? 'text-blue' : 'text-muted' }}"></i>
                        <span>All Discussions</span></a>
                </li>
                <li class="nav-item {{ request()->routeIs('discussions.myDiscussions') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('discussions.myDiscussions') }}">
                        <i class="fa-solid fa-comment {{ request()->routeIs('discussions.myDiscussions') ? 'text-blue' : 'text-muted' }}"></i>
                        <span>My Discussions</span></a>
                </li>
                <li class="nav-item {{ request()->routeIs('discussions.myAnswers') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('discussions.myAnswers') }}">
                        <i class="fa-solid fa-comment-dots {{ request()->routeIs('discussions.myAnswers') ? 'text-blue' : 'text-muted' }}"></i>
                        <span>My Answers</span></a>
                </li>
                <li class="nav-item {{ request()->routeIs('discussions.mySaves') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('discussions.mySaves') }}">
                        <i class="fa-solid fa-bookmark {{ request()->routeIs('discussions.mySaves') ? 'text-blue' : 'text-muted' }}"></i>
                        <span>Bookmarks</span></a>
                </li>
                <li class="nav-item {{ request()->routeIs('discussions.tags') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('discussions.tags') }}">
                        <i class="fa-solid fa-tags {{ request()->routeIs('discussions.tags') ? 'text-blue' : 'text-muted' }}"></i>
                        <span>Tags</span></a>
                </li>
                <li class="nav-item {{ request()->routeIs('profile.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('profile.index') }}">
                        <i class="fa-solid fa-user {{ request()->routeIs('profile.index') ? 'text-blue' : 'text-muted' }}"></i>
                        <span>Profile</span></a>
                </li>
            </ul>
        </nav>
    </div>    
</aside>