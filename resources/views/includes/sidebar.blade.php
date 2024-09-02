<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="#" class="logo logo-dark">
            <span class="img img-thumbnail">
                <img class="rounded-circle " src={{ asset("assets/images/logo.jpg") }} alt="" height="90">
            </span>
        </a>
        <a href="#" class="logo logo-light">
            <span class="img img-thumbnail ">
                <img class="rounded-circle " src={{ asset("assets/images/logo.jpg") }} alt="" height="90">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-3xl header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#sidebarDashboards" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="fa fa-dashboard "></i> <span data-key="t-dashboards">Dashboard</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="nav-link" data-key="t-analytics">
                                    Analytics </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('employees.list') }}" class="nav-link" data-key="t-crm"> Employees
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#sidebarLayouts" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="fa fa-bar-chart"></i> <span data-key="t-layouts">Performance</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" target="_blank" class="nav-link" data-key="t-horizontal">Employee
                                    Performance</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" target="_blank" class="nav-link" data-key="t-detached">Goals/KPAs</a>
                            </li>
                            <li class="nav-item">
                                <a href="l#" target="_blank" class="nav-link" data-key="t-two-column">Appraisals</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#sidebarLayouts" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="fa fa-files-o"></i> <span data-key="t-layouts">Documents</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="l#" target="_blank" class="nav-link" data-key="t-horizontal">Policies
                                    and Procedures</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" target="_blank" class="nav-link" data-key="t-detached">Employee
                                    Documents</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="{{ route('leave.applications.list') }}" class="nav-link menu-link"> <i
                            class="fa fa-calendar-check-o"></i> <span>Leave
                            Management</span> </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('salaries.list') }}" class="nav-link menu-link"> <i class="a fa-list-ol"></i>
                        <span>Payroll</span> </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link menu-link"> <i class="fa fa-graduation-cap"></i> <span>Training &
                            Dev</span> </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('organization.profile') }}" class="nav-link menu-link"> <i
                            class="fa fa-building-o"></i> <span>Organization
                        </span> </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>