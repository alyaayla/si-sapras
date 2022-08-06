<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon ">
                    <i class="fa fa-school"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin SiSapras<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/admin/home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="/peminjaman">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data Peminjaman</span></a>
            </li>

            
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data SAPRAS</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/sapras">Data SAPRAS Lab. TKJ</a>
                        <a class="collapse-item" href="/tkr">Data SAPRAS Lab. TKR</a>
                        <a class="collapse-item" href="/eskul">Data SAPRAS Prog. ESKUL</a>
                    </div>
                </div>
            </li> -->

            <li class="nav-item">
                <a class="nav-link" href="/sapras">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data Sapras</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/ruangan">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data Ruangan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/user">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data User</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/logout') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

           

            

        </ul>