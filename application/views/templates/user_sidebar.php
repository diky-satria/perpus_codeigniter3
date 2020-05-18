<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <?php if($this->session->userdata('role_user') == 1): ?>
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <a class="nav-link" href="<?php echo base_url() ?>admin">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                             <!-- <div class="dropdown-divider"></div> -->
                        <?php endif; ?>
                        <?php if($this->session->userdata('role_user') == 1 || $this->session->userdata('role_user') == 2): ?>
                             <div class="dropdown-divider"></div>
                            <div class="sb-sidenav-menu-heading">Petugas</div>
                            <a class="nav-link" href="<?php echo base_url() ?>petugas/mahasiswa">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                                Data mahasiswa
                            </a>
                            <a class="nav-link" href="<?php echo base_url() ?>petugas">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                                Peminjaman
                            </a>
                        <?php endif; ?>
                            <div class="dropdown-divider"></div>
                            <div class="sb-sidenav-menu-heading">Mahasiswa</div>
                            <a class="nav-link" href="<?php echo base_url() ?>mahasiswa">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-basket"></i></div>
                                Peminjaman saya
                            </a>
                            <a class="nav-link" href="<?php echo base_url() ?>mahasiswa/ubah_password">
                                <div class="sb-nav-link-icon"><i class="fas fa-exchange-alt"></i></div>
                                Ubah password
                            </a>
                            <a class="nav-link" data-toggle="modal" data-target="#logout">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Selamat datang:</div>
                        <?php echo $this->session->userdata('nama_user') ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">