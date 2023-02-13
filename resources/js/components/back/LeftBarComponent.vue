<template>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">MaterialAdminLTE</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./index.html" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v1</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index2.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v2</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index3.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v3</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="pages/widgets.html" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Widgets
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Layout Options
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right">6</span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/layout/top-nav.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Top Navigation</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Top Navigation + Sidebar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/boxed.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Boxed</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fixed Sidebar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fixed Sidebar <small>+ Custom Area</small></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/fixed-topnav.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fixed Navbar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/fixed-footer.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fixed Footer</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Collapsed Sidebar</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Charts
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/charts/chartjs.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ChartJS</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/charts/flot.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Flot</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/charts/inline.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Inline</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                UI Elements
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/UI/general.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>General</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/UI/icons.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Icons</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/UI/buttons.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Buttons</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/UI/sliders.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sliders</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/UI/modals.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Modals & Alerts</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/UI/navbar.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Navbar & Tabs</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/UI/timeline.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Timeline</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/UI/ribbons.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ribbons</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Forms
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/forms/general.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>General Elements</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/forms/advanced.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Advanced Elements</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/forms/editors.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Editors</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/forms/validation.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Validation</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Tables
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/tables/simple.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Simple Tables</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/tables/data.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>DataTables</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/tables/jsgrid.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>jsGrid</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">EXAMPLES</li>
                    <li class="nav-item">
                        <a href="pages/calendar.html" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                Calendar
                                <span class="badge badge-info right">2</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/gallery.html" class="nav-link">
                            <i class="nav-icon far fa-image"></i>
                            <p>
                                Gallery
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/kanban.html" class="nav-link">
                            <i class="nav-icon fas fa-columns"></i>
                            <p>
                                Kanban Board
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-envelope"></i>
                            <p>
                                Mailbox
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/mailbox/mailbox.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Inbox</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/mailbox/compose.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Compose</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/mailbox/read-mail.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Read</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Pages
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/examples/invoice.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Invoice</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/profile.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Profile</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/e-commerce.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>E-commerce</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/projects.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Projects</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/project-add.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Project Add</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/project-edit.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Project Edit</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/project-detail.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Project Detail</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/contacts.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Contacts</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/faq.html" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>FAQ</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/contact-us.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Contact us</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-plus-square"></i>
                            <p>
                                Extras
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Login & Register v1
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="pages/examples/login.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Login v1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/register.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Register v1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/forgot-password.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Forgot Password v1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/recover-password.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Recover Password v1</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Login & Register v2
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="pages/examples/login-v2.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Login v2</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/register-v2.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Register v2</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/forgot-password-v2.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Forgot Password v2</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/recover-password-v2.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Recover Password v2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/lockscreen.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Lockscreen</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Legacy User Menu</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/language-menu.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Language Menu</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/404.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Error 404</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/500.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Error 500</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/pace.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pace</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/blank.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Blank Page</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="starter.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Starter Page</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-search"></i>
                            <p>
                                Search
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/search/simple.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Simple Search</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/search/enhanced.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Enhanced</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">MISCELLANEOUS</li>
                    <li class="nav-item">
                        <a href="https://adminlte.io/docs/3.0/" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>Documentation</p>
                        </a>
                    </li>
                    <li class="nav-header">MULTI LEVEL EXAMPLE</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Level 1</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                Level 1
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Level 2</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Level 2
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Level 3</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Level 3</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Level 3</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Level 2</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Level 1</p>
                        </a>
                    </li>
                    <li class="nav-header">LABELS</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-danger"></i>
                            <p class="text">Important</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-warning"></i>
                            <p>Warning</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>Informational</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!--<div class="navbar no-radius">
        &lt;!&ndash; brand &ndash;&gt;
        <router-link to="/user" class="navbar-brand">
            <div data-ui-include="'images/logo.svg'"></div>
            <img src="/back/images/logo.png" alt="." class="hide">
            <span class="hidden-folded inline">aside</span>
        </router-link>
        &lt;!&ndash; / brand &ndash;&gt;
    </div>
    <div data-flex class="hide-scroll">
        <nav class="scroll nav-stacked nav-stacked-rounded nav-color">

            <ul class="nav" data-ui-nav>
                <li class="nav-header hidden-folded">
                    <span class="text-xs">Main</span>
                </li>
                <li>
                    <router-link to="/user" class="b-danger">
          <span class="nav-icon text-white no-fade">
            <i class="ion-filing"></i>
          </span>
                        <span class="nav-text">Dashboard</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="/user/free/courses" class="b-success">
          <span class="nav-icon text-white no-fade">
            <i class="ion-android-apps"></i>
          </span>
                        <span class="nav-text">Бесплатные курсы</span>
                    </router-link>
                </li>
                <li>
                    <a href="app.inbox.html" class="b-info">
          <span class="nav-icon text-white no-fade">
            <i class="ion-email"></i>
          </span>
                        <span class="nav-text">Inbox</span>
                    </a>
                </li>
                <li>
                    <a href="app.message.html" class="b-default">
          <span class="nav-label">
            <b class="label label-xs rounded danger"></b>
          </span>
                        <span class="nav-icon">
            <i class="ion-chatbubble-working"></i>
          </span>
                        <span class="nav-text">Messages</span>
                    </a>
                </li>
                <li>
                    <a href="app.contact.html" class="b-default">
          <span class="nav-icon">
            <i class="ion-person"></i>
          </span>
                        <span class="nav-text">Contacts</span>
                    </a>
                </li>

                <li class="nav-header hidden-folded m-t">
                    <span class="text-xs">UI Elements</span>
                </li>
                <li>
                    <a>
          <span class="nav-caret">
            <i class="fa fa-caret-down"></i>
          </span>
                        <span class="nav-icon">
            <i class="ion-plus-circled"></i>
          </span>
                        <span class="nav-text">UI kit</span>
                    </a>
                    <ul class="nav-sub nav-mega nav-mega-3">
                        <li>
                            <a href="ui.arrow.html" >
                                <span class="nav-text">Arrow</span>
                            </a>
                        </li>
                        <li>
                            <a href="ui.box.html" >
                                <span class="nav-text">Box</span>
                            </a>
                        </li>
                        <li>
                            <a href="ui.button.html" >
                                <span class="nav-text">Button</span>
                            </a>
                        </li>
                        <li>
                            <a href="ui.color.html" >
                                <span class="nav-text">Color</span>
                            </a>
                        </li>
                        <li>
                            <a href="ui.dropdown.html" >
                                <span class="nav-text">Dropdown</span>
                            </a>
                        </li>
                        <li>
                            <a href="ui.grid.html" >
                                <span class="nav-text">Grid</span>
                            </a>
                        </li>
                        <li>
                            <a href="ui.icon.html" >
                                <span class="nav-text">Icon</span>
                            </a>
                        </li>
                        <li>
                            <a href="ui.label.html" >
                                <span class="nav-text">Label</span>
                            </a>
                        </li>
                        <li>
                            <a href="ui.list.html" >
                                <span class="nav-text">List Group</span>
                            </a>
                        </li>
                        <li>
                            <a href="ui.modal.html" >
                                <span class="nav-text">Modal</span>
                            </a>
                        </li>
                        <li>
                            <a href="ui.nav.html" >
                                <span class="nav-text">Nav</span>
                            </a>
                        </li>
                        <li>
                            <a href="ui.progress.html" >
                                <span class="nav-text">Progress</span>
                            </a>
                        </li>
                        <li>
                            <a href="ui.social.html" >
                                <span class="nav-text">Social</span>
                            </a>
                        </li>
                        <li>
                            <a href="ui.sortable.html" >
                                <span class="nav-text">Sortable</span>
                            </a>
                        </li>
                        <li>
                            <a href="ui.streamline.html" >
                                <span class="nav-text">Streamline</span>
                            </a>
                        </li>
                        <li>
                            <a href="ui.timeline.html" >
                                <span class="nav-text">Timeline</span>
                            </a>
                        </li>
                        <li>
                            <a href="map.vector.html" >
                                <span class="nav-text">Vector Map</span>
                            </a>
                        </li>
                        <li>
                            <a href="ui.widget.html" >
                                <span class="nav-text">Widget</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a>
          <span class="nav-caret">
            <i class="fa fa-caret-down"></i>
          </span>
                        <span class="nav-icon">
            <i class="ion-ios-photos"></i>
          </span>
                        <span class="nav-text">Pages</span>
                    </a>
                    <ul class="nav-sub nav-mega">
                        <li>
                            <a href="profile.html" >
                                <span class="nav-text">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="setting.html" >
                                <span class="nav-text">Setting</span>
                            </a>
                        </li>
                        <li>
                            <a href="search.html" >
                                <span class="nav-text">Search</span>
                            </a>
                        </li>
                        <li>
                            <a href="faq.html" >
                                <span class="nav-text">FAQ</span>
                            </a>
                        </li>
                        <li>
                            <a href="gallery.html" >
                                <span class="nav-text">Gallery</span>
                            </a>
                        </li>
                        <li>
                            <a href="invoice.html" >
                                <span class="nav-text">Invoice</span>
                            </a>
                        </li>
                        <li>
                            <a href="price.html" >
                                <span class="nav-text">Price</span>
                            </a>
                        </li>
                        <li>
                            <a href="blank.html" >
                                <span class="nav-text">Blank</span>
                            </a>
                        </li>
                        <li>
                            <a href="signin.html" >
                                <span class="nav-text">Sign In</span>
                            </a>
                        </li>
                        <li>
                            <a href="signup.html" >
                                <span class="nav-text">Sign Up</span>
                            </a>
                        </li>
                        <li>
                            <a href="forgot-password.html" >
                                <span class="nav-text">Forgot Password</span>
                            </a>
                        </li>
                        <li>
                            <a href="lockme.html" >
                                <span class="nav-text">Lockme Screen</span>
                            </a>
                        </li>
                        <li>
                            <a href="404.html" >
                                <span class="nav-text">Error 404</span>
                            </a>
                        </li>
                        <li>
                            <a href="505.html" >
                                <span class="nav-text">Error 505</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a>
          <span class="nav-caret">
            <i class="fa fa-caret-down"></i>
          </span>
                        <span class="nav-icon">
            <i class="ion-checkmark-circled"></i>
          </span>
                        <span class="nav-text">Form</span>
                    </a>
                    <ul class="nav-sub">
                        <li>
                            <a href="form.layout.html" >
                                <span class="nav-text">Form Layout</span>
                            </a>
                        </li>
                        <li>
                            <a href="form.element.html" >
                                <span class="nav-text">Form Element</span>
                            </a>
                        </li>
                        <li>
                            <a href="form.validation.html" >
                                <span class="nav-text">Form Validation</span>
                            </a>
                        </li>
                        <li>
                            <a href="form.select.html" >
                                <span class="nav-text">Select</span>
                            </a>
                        </li>
                        <li>
                            <a href="form.editor.html" >
                                <span class="nav-text">Editor</span>
                            </a>
                        </li>
                        <li>
                            <a href="form.picker.html">
                                <span class="nav-text">Picker</span>
                            </a>
                        </li>
                        <li>
                            <a href="form.wizard.html">
                                <span class="nav-text">Wizard</span>
                            </a>
                        </li>
                        <li>
                            <a href="form.dropzone.html" class="no-ajax" >
                                <span class="nav-text">File Upload</span>
                            </a>
                        </li>
                        <li>
                            <a href="form.calendar.html">
                                <span class="nav-text">Calendar</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a>
          <span class="nav-caret">
            <i class="fa fa-caret-down"></i>
          </span>
                        <span class="nav-icon">
            <i class="ion-ios-grid-view"></i>
          </span>
                        <span class="nav-text">Tables</span>
                    </a>
                    <ul class="nav-sub">
                        <li>
                            <a href="static.html" >
                                <span class="nav-text">Static table</span>
                            </a>
                        </li>
                        <li>
                            <a href="datatable.html" >
                                <span class="nav-text">Datatable</span>
                            </a>
                        </li>
                        <li>
                            <a href="footable.html" >
                                <span class="nav-text">Footable</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a>
          <span class="nav-caret">
            <i class="fa fa-caret-down"></i>
          </span>
                        <span class="nav-icon">
            <i class="ion-pie-graph"></i>
          </span>
                        <span class="nav-text">Charts</span>
                    </a>
                    <ul class="nav-sub">
                        <li>
                            <a href="chart.html" >
                                <span class="nav-text">Chart</span>
                            </a>
                        </li>
                        <li>
                            <a href="chartjs.html" >
                                <span class="nav-text">Chartjs</span>
                            </a>
                        </li>
                        <li>
                            <a>
              <span class="nav-caret">
                <i class="fa fa-caret-down"></i>
              </span>
                                <span class="nav-text">Echarts</span>
                            </a>
                            <ul class="nav-sub">
                                <li>
                                    <a href="echarts-line.html" >
                                        <span class="nav-text">line</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="echarts-bar.html" >
                                        <span class="nav-text">Bar</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="echarts-pie.html" >
                                        <span class="nav-text">Pie</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="echarts-scatter.html" >
                                        <span class="nav-text">Scatter</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="echarts-radar-chord.html" >
                                        <span class="nav-text">Radar &amp; Chord</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="echarts-gauge-funnel.html" >
                                        <span class="nav-text">Gauges &amp; Funnel</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="echarts-map.html" >
                                        <span class="nav-text">Map</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <div data-flex-no-shrink>
        <div class="nav-fold dropup">
            <a data-toggle="dropdown">
                <div class="pull-left">
                    <div class="inline"><span class="avatar w-40 grey">JR</span></div>
                    <img src="/back/images/a0.jpg" alt="..." class="w-40 img-circle hide">
                </div>
                <div class="clear hidden-folded p-x">
                    <span class="block _500 text-muted">Jean Reyes</span>
                    <div class="progress-xxs m-y-sm lt progress">
                        <div class="progress-bar info" style="width: 15%;">
                        </div>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu w dropdown-menu-scale ">
                <router-link class="dropdown-item" to="/user/free/courses">
                    <span>Бесплатные курсы</span>
                </router-link>
                <div class="dropdown-divider"></div>
                <router-link class="dropdown-item" to="/user/profile">
                    <span>Профиль</span>
                </router-link>
                <router-link class="dropdown-item" to="/user/settings">
                    <span>Настройки</span>
                </router-link>
                &lt;!&ndash;<a class="dropdown-item" href="app.inbox.html">
                    <span>Inbox</span>
                </a>
                <a class="dropdown-item" href="docs.html">
                    Need help?
                </a>&ndash;&gt;
                <a class="dropdown-item" href="/logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Выйти</a>
                <form id="logout-form" action="/logout" method="POST" class="d-none">
                    <input type="hidden" :value="csrf" name="_token">
                </form>
            </div>
        </div>
    </div>-->
</template>
<script>
    export default {
        name: "LeftBarComponent",
        props: ['data'],
        data(){
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        mounted() {

        },
        created() {

        }
    }
</script>
