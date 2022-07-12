        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->

            <?php if (in_groups('admin')) : ?>
                <!-- Divider -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/index">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-medkit"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Medical Check Up</div>
                </a>

                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="/admin/index">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Pasien
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="/admin/indexpasien">
                        <i class="fas fa-hospital-user"></i>
                        <span>Data Pasien</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/indexperiksa">
                        <i class="fas fa-stethoscope"></i>
                        <span>Periksa</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Laboratorium
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="/admin/indexlaborat">
                        <i class="fas fa-flask"></i>
                        <span>Laboratorium</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/indexmasterlab">
                        <i class="fas fa-vials"></i>
                        <span>Master Laboratorium</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Radiologi
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="/admin/indexradiologi">
                        <i class="fas fa-x-ray"></i>
                        <span>Radiologi</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/indexmasterrad">
                        <i class="fas fa-bone"></i>
                        <span>Master Radiologi</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">


                <li class="nav-item">
                    <a class="nav-link" href="/admin/indexkesimpulan">
                        <i class="far fa-file"></i>
                        <span>Kesimpulan</span></a>
                </li>

            <?php endif; ?>

            <?php if (in_groups('radiologi')) : ?>
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/radiologi/index">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-medkit"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Medical Check Up</div>
                </a>

                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="/radiologi/index">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Radiologi
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="/radiologi/indexradiologi">
                        <i class="fas fa-x-ray"></i>
                        <span>Radiologi</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/radiologi/indexmasterrad">
                        <i class="fas fa-bone"></i>
                        <span>Master Radiologi</span></a>
                </li>
                <hr class="sidebar-divider">
            <?php endif; ?>

            <?php if (in_groups('laborat')) : ?>
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/laborat/index">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-medkit"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Medical Check Up</div>
                </a>

                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="/laborat/index">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Laboratorium
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="/laborat/indexlaborat">
                        <i class="fas fa-flask"></i>
                        <span>Laboratorium</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/laborat/indexmasterlab">
                        <i class="fas fa-vials"></i>
                        <span>Master Laboratorium</span></a>
                </li>
                <hr class="sidebar-divider">
            <?php endif; ?>

            <?php if (in_groups('dokter')) : ?>
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/pasien/index">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-medkit"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Medical Check Up</div>
                </a>
                <hr class="sidebar-divider my-0">

                <li class="nav-item">
                    <a class="nav-link" href="/pasien/index">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Pasien
                </div>

                <!-- <li class="nav-item">
                    <a class="nav-link" href="/pasien/indexpasien">
                        <i class="fas fa-hospital-user"></i>
                        <span>Data Pasien</span></a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="/pasien/indexperiksa">
                        <i class="fas fa-stethoscope"></i>
                        <span>Periksa</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pasien/indexkesimpulan">
                        <i class="far fa-file"></i>
                        <span>Kesimpulan</span></a>
                </li>
                <hr class="sidebar-divider">
            <?php endif; ?>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>