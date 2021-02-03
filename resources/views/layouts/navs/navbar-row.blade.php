<!-- Debut Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-absolute" style="background-color: #1F3E63;">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler" name="Hello">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <!--a class="navbar-brand" ></a-->
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <!--cest les 3 points lorsque navbar extend-->
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <!--recherche field --
            <form>
                <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                    </div>
                </div>
                </div>
            </form-->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" >
                        <i class="now-ui-icons media-2_sound-wave"></i>
                        <p>
                            <span class="d-lg-none d-md-block">{{ __("Stats") }}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="now-ui-icons location_world"></i>
                        <p>
                            <span class="d-lg-none d-md-block">{{ __("Some Actions") }}</span>
                        </p>
                        <p>
                            <span class="d-lg-none d-md-block">{{ __("Some Actions") }}</span>
                        </p>
                        <p>
                            <span class="d-lg-none d-md-block">{{ __("Some Actions") }}</span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">{{ __("Action") }}</a>
                        <a class="dropdown-item" href="#">{{ __("Another action") }}</a>
                        <a class="dropdown-item" href="#">{{ __("Something else here") }}</a>
                    </div>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user" aria-hidden="true"></i>
                        <p>
                            <span class="d-lg-none d-md-block">{{ __("Account") }}</span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" >{{ __("My profile") }}</a>
                        <a class="dropdown-item" >{{ __("Edit profile") }}</a>
                        <a class="dropdown-item" 
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->