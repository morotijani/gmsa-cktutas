    <div class="app">
        <header class="app-header app-header-dark bg-success">
            <div class="top-bar">
                <div class="top-bar-brand">
                    <button class="hamburger hamburger-squeeze mr-2" type="button" data-toggle="aside-menu" aria-label="toggle aside menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
                    <a href="index.html">
                        <img src="<?= PROOT; ?>assets/media/logo/logo.png" class="img-fluid rounded" width="40">
                    </a>
                </div>
                <div class="top-bar-list">
                    <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
                        <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
                    </div>
                    <div class="top-bar-item top-bar-item-full">
                        <form class="top-bar-search">
                            <div class="input-group input-group-search dropdown">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                                </div>
                                <input type="text" class="form-control" data-toggle="dropdown" aria-label="Search" placeholder="Search">
                            </div>
                        </form>
                    </div>
                    <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
                        <ul class="header-nav nav">
                            <li class="nav-item dropdown header-nav-dropdown has-notified">
                                <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="oi oi-pulse"></span></a>
                            </li>
                            <li class="nav-item dropdown header-nav-dropdown has-notified">
                                <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="oi oi-envelope-open"></span></a>
                            </li>
                        </ul>
                        <div class="dropdown d-none d-md-flex">
                            <button class="btn-account" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="user-avatar user-avatar-md"><img src="assets/images/avatars/profile.jpg" alt=""></span> <span class="account-summary pr-lg-4 d-none d-lg-block"><span class="account-name">Ibrahim Dramani </span> <span class="account-description">IT Committee</span></span></button>
                            <div class="dropdown-menu">
                                <div class="dropdown-arrow d-lg-none" x-arrow=""></div>
                                <div class="dropdown-arrow ml-3 d-none d-lg-block"></div>
                                <h6 class="dropdown-header d-none d-md-block d-lg-none"> Beni Arisandi </h6>
                                <a class="dropdown-item" href="user-profile.html"><span class="dropdown-icon oi oi-person"></span> Profile</a> 
                                <a class="dropdown-item" href="auth-signin-v1.html"><span class="dropdown-icon oi oi-account-logout"></span> Logout</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Help Center</a> 
                                <a class="dropdown-item" href="#">Ask Forum</a> 
                                <a class="dropdown-item" href="#">Keyboard Shortcuts</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>