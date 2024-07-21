    
    <aside class="app-aside app-aside-expand-md app-aside-light">
        <div class="aside-content">
            <header class="aside-header d-block d-md-none">
                <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside"><span class="user-avatar user-avatar-lg"><img src="assets/images/avatars/profile.jpg" alt=""></span> <span class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span> <span class="account-summary"><span class="account-name">Ibranim Dramani</span> <span class="account-description">IT Committee</span></span></button>
                <div id="dropdown-aside" class="dropdown-aside collapse">
                    <div class="pb-3">
                        <a class="dropdown-item" href="user-profile.html"><span class="dropdown-icon oi oi-person"></span> Profile</a> <a class="dropdown-item" href="auth-signin-v1.html"><span class="dropdown-icon oi oi-account-logout"></span> Logout</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Help Center</a> <a class="dropdown-item" href="#">Ask Forum</a> <a class="dropdown-item" href="#">Keyboard Shortcuts</a>
                    </div>
                </div>
            </header>


            <div class="aside-menu overflow-hidden">
                <nav id="stacked-menu" class="stacked-menu">
                    <ul class="menu">
                        <li class="menu-item has-active">
                            <a href="<?= PROOT; ?>admin" class="menu-link"><span class="menu-icon fas fa-home"></span> <span class="menu-text">Dashboard</span></a>
                        </li>
                        <li class="menu-item has-child">
                            <a href="javascript:;" class="menu-link"><span class="menu-icon fa-regular fa-newspaper"></span> <span class="menu-text">Blog / News</span> <span class="badge badge-warning">New</span></a>
                            <ul class="menu">
                                <li class="menu-item">
                                    <a href="<?= PROOT; ?>admin/blog/all" class="menu-link">All</a>
                                </li>
                                <li class="menu-item">
                                    <a href="<?= PROOT; ?>admin/blog/category" class="menu-link">Category</a>
                                </li>
                                <li class="menu-item">
                                    <a href="<?= PROOT; ?>admin/blog/archive" class="menu-link">Archive</a>
                                </li>
                                <li class="menu-item">
                                    <a href="<?= PROOT; ?>admin/blog/add" class="menu-link">Make new Post</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item has-child">
                            <a href="javascript:;" class="menu-link"><span class="menu-icon fa-solid fa-people-pulling"></span> <span class="menu-text">Members</span></a>
                            <ul class="menu">
                                <li class="menu-item">
                                    <a href="<?= PROOT; ?>admin/members" class="menu-link">All</a>
                                </li>
                                <li class="menu-item">
                                    <a href="<?= PROOT; ?>admin/dues" class="menu-link">Dues Payment</a>
                                </li>
                                <li class="menu-item">
                                    <a href="<?= PROOT; ?>admin/subscribers" class="menu-link">Subscibers</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item has-child">
                            <a href="javascript:;" class="menu-link"><span class="menu-icon fa-solid fa-person-rays"></span> <span class="menu-text">Executives</span></a>
                            <ul class="menu">
                                <li class="menu-item">
                                    <a href="<?= PROOT; ?>admin/executives/all" class="menu-link">All</a>
                                </li>
                                <li class="menu-item">
                                    <a href="<?= PROOT; ?>admin/executives/position" class="menu-link">Positions</a>
                                </li>
                                <li class="menu-item">
                                    <a href="<?= PROOT; ?>admin/members" class="menu-link">Add new Executive</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item">
                            <a href="<?= PROOT; ?>admin/dues" class="menu-link"><span class="menu-icon fa-brands fa-envira"></span> <span class="menu-text">Dues</span></a>
                        </li>
                        <li class="menu-item">
                            <a href="<?= PROOT; ?>admin/donations" class="menu-link"><span class="menu-icon fa-brands fa-envira"></span> <span class="menu-text">Donations</span></a>
                        </li>
                        <li class="menu-item">
                            <a href="<?= PROOT; ?>admin/contacts" class="menu-link"><span class="menu-icon oi oi-envelope-open"></span> <span class="menu-text">Contacts</span></a>
                        </li>
                        <li class="menu-header">Interfaces </li>
                        <li class="menu-item">
                            <a href="<?= PROOT; ?>admin/prayer-time" class="menu-link"><span class="menu-icon fa-solid fa-person-praying"></span> <span class="menu-text">Prayer Time</span></a>
                        </li>
                        <li class="menu-item">
                            <a href="<?= PROOT; ?>admin/activity" class="menu-link"><span class="menu-icon fas fa-globe"></span> <span class="menu-text">Activities</span></a>
                        </li>
                        <li class="menu-item">
                            <a href="<?= PROOT; ?>admin/gallery" class="menu-link"><span class="menu-icon fa-brands fa-envira"></span> <span class="menu-text">Gallery</span></a>
                        </li>
                        <hr>
                        <li class="menu-item">
                            <a href="<?= PROOT; ?>admin/site" class="menu-link"><span class="menu-icon fas fa-globe"></span> <span class="menu-text">Site</span></a>
                        </li>
                        <li class="menu-item has-child">
                            <a href="javascript:;" class="menu-link"><span class="menu-icon fa-solid fa-person"></span> <span class="menu-text"><?= ucwords($admin_data['admin_fullname']); ?> </span></a>
                            <ul class="menu">
                                <li class="menu-item">
                                    <a href="<?= PROOT; ?>admin/profile" class="menu-link">Profile</a>
                                </li>
                                <li class="menu-item">
                                    <a href="<?= PROOT; ?>admin/settings" class="menu-link">Settings</a>
                                </li>
                                <li class="menu-item">
                                    <a href="<?= PROOT; ?>admin/auth/logout" class="menu-link">Log out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>

            <footer class="aside-footer border-top p-2">
                <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span class="d-compact-menu-none">Night mode</span> <i class="fas fa-moon ml-1"></i></button>
            </footer>
        </div>
    </aside>