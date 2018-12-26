<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{route('home')}}">YJcrypt</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive" style=" ">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

                <li class="nav-item" data-toggle="tooltip" data-placement="right">
                    <a class="nav-link {{ request()->is('inbox') ? 'active-link' : request()->is('inbox/*') ? 'active-link' : ''}}" href="{{route('home')}}">
                        <i class="fa fa-fw fa-inbox"></i>
                        <span class="nav-link-text">Inbox</span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" >
                    <a class="nav-link {{ request()->is('compose') ? 'active-link' : ''}}" href="{{route('compose.view')}}">
                        <i class="fa fa-fw fa-plus"></i>
                        <span class="nav-link-text">Compose</span>
                    </a>
                </li>

        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">

            <li class="nav-item" >
                <a class="nav-link" style="cursor: context-menu;">
                    <i class="fa fa-fw fa-user"></i>

                    <span class="nav-link-text">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link" href=""
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fa fa-fw fa-sign-out"></i>Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>