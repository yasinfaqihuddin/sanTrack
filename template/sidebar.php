<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion bg-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link" href="<?= $main_url ?>/index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <hr class="mb-0">
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <a class="nav-link" href="<?= $main_url ?>/user/add-user.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                                User
                            </a>
                            <hr class="mb-0">
                            <a class="nav-link" href="<?= $main_url ?>/user/password.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-key"></i></div>
                                Ganti Password
                            </a>
                            <hr class="mb-0">
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <a class="nav-link" href="<?= $main_url ?>/siswa/siswa.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                Santri
                            </a>
                            <hr class="mb-0">
                            <a class="nav-link" href="<?= $main_url ?>/guru/guru.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-chalkboard-user"></i></div>
                                Guru
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>/pelajaran/pelajaran.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                                Mata Pelajaran
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>/ujian/ujian.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-graduate"></i></div>
                                Ujian
                            </a>
                            <hr class="mb-0">
                            <div class="sb-sidenav-menu-heading">Poin</div>
                            <a href="<?= $main_url ?>/poin/pelanggaran.php" class="nav-link">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-star"></i></div>
                                Poin
                            </a>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-pen-to-square"></i></div>
                                    Input Poin
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                    <li><a class="dropdown-item text-primary" href="<?= $main_url ?>/input_poin/input_prestasi.php">Prestasi</a></li>
                                    <li><a class="dropdown-item text-primary" href="<?= $main_url ?>/input_poin/input_pelanggaran.php">Pelanggaran</a></li>
                                </ul>
                            </li>
                            <hr class="mb-0">
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer border">
                        <div class="small">Logged in as:</div>
                        <?= $_SESSION["ssUser"] ?>
                    </div>
                </nav>
            </div>