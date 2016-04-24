<nav class="navbar-default navbar-static-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <h1><a class="navbar-brand" href="0_index.html"><span class="fa fa-child"></span> Posyandu</a></h1>
    </div>
    <div class=" border-bottom">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="drop-men">
            <ul class=" nav_1">

                <li class="dropdown at-drop">
                    <a href="#" class="dropdown-toggle dropdown-at " data-toggle="dropdown"><i
                            class="fa fa-globe"></i> <span class="number">5</span></a>
                    <ul class="dropdown-menu menu1 " role="menu">
                        <li><a href="#">

                            <div class="user-new">
                                <p>New user registered</p>
                                <span>40 seconds ago</span>
                            </div>
                            <div class="user-new-left">

                                <i class="fa fa-user-plus"></i>
                            </div>
                            <div class="clearfix"></div>
                        </a></li>
                        <li><a href="#">
                            <div class="user-new">
                                <p>Someone special liked this</p>
                                <span>3 minutes ago</span>
                            </div>
                            <div class="user-new-left">

                                <i class="fa fa-heart"></i>
                            </div>
                            <div class="clearfix"></div>
                        </a></li>
                        <li><a href="#">
                            <div class="user-new">
                                <p>John cancelled the event</p>
                                <span>4 hours ago</span>
                            </div>
                            <div class="user-new-left">

                                <i class="fa fa-times"></i>
                            </div>
                            <div class="clearfix"></div>
                        </a></li>
                        <li><a href="#">
                            <div class="user-new">
                                <p>The server is status is stable</p>
                                <span>yesterday at 08:30am</span>
                            </div>
                            <div class="user-new-left">

                                <i class="fa fa-info"></i>
                            </div>
                            <div class="clearfix"></div>
                        </a></li>
                        <li><a href="#">
                            <div class="user-new">
                                <p>New comments waiting approval</p>
                                <span>Last Week</span>
                            </div>
                            <div class="user-new-left">

                                <i class="fa fa-rss"></i>
                            </div>
                            <div class="clearfix"></div>
                        </a></li>
                        <li><a href="#" class="view">View all messages</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span
                            class=" name-caret">Rackham<i class="caret"></i></span><img src="<?php echo $BASE_URL .'gambar/admin/wo2.jpeg'; ?>"
                                                                                        width="60"></a>
                    <ul class="dropdown-menu " role="menu">
                        <li><a href="/profile"><i class="fa fa-user"></i>Ubah Profil</a></li>
                        <li><a href="inbox.html"><i class="fa fa-clipboard"></i>Daftar Tugas</a></li>
                        <li><a href="/logout"><i class="fa fa-sign-out"></i>Keluar</a></li>
                    </ul>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
        <div class="clearfix">

        </div>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <li>
                        <a href="<?php echo $BASE_URL; ?>" class=" hvr-bounce-to-right"><i class="fa fa-home nav_icon "></i><span
                                class="nav-label">Beranda</span> </a>
                    </li>

                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-hospital-o nav_icon"></i> <span
                                class="nav-label">Data Posyandu</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="daftar-posyandu.html" class=" hvr-bounce-to-right"> <i
                                    class="fa fa-clipboard nav_icon"></i>Daftar Posyandu</a></li>
                            <li><a href="#" class=" hvr-bounce-to-right"> <i class="fa fa-area-chart nav_icon"></i>Statistik</a>
                            </li>
                            <li><a href="#" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>Lokasi</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-female nav_icon"></i> <span
                                class="nav-label">Data Ibu</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="#" class=" hvr-bounce-to-right"> <i class="fa fa-clipboard nav_icon"></i>Daftar
                                Ibu</a></li>
                            <li><a href="#" class=" hvr-bounce-to-right"> <i class="fa fa-area-chart nav_icon"></i>Statistik</a>
                            </li>
                            <li><a href="#" class=" hvr-bounce-to-right"><i class="fa fa-heart nav_icon"></i>Kehamilan</a>
                            </li>
                            <li><a href="#" class=" hvr-bounce-to-right"><i class="fa fa-ambulance nav_icon"></i>Kematian</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-check-circle-o nav_icon"></i> <span
                                class="nav-label">Layanan Ibu</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="#" class=" hvr-bounce-to-right"> <i class="fa fa-heart nav_icon"></i>Ibu
                                hamil</a></li>
                            <li><a href="#" class=" hvr-bounce-to-right"> <i class="fa fa-eyedropper nav_icon"></i>Imunisasi
                                TT</a></li>
                            <li><a href="#" class=" hvr-bounce-to-right"><i class="fa fa-group nav_icon"></i>Keluarga
                                berencana</a></li>
                            <li><a href="#" class=" hvr-bounce-to-right"><i class="fa fa-arrows-alt nav_icon"></i>Pengukuran
                                LILA</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-child nav_icon"></i> <span
                                class="nav-label">Data Anak</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="daftar-anak.html" class=" hvr-bounce-to-right"> <i
                                    class="fa fa-clipboard nav_icon"></i>Daftar Anak</a></li>
                            <li><a href="profil-anak.html" class=" hvr-bounce-to-right"> <i class="fa fa-area-chart nav_icon"></i>Statistik</a>
                            </li>
                            <li><a href="profil-anak.html" class=" hvr-bounce-to-right"><i class="fa fa-ambulance nav_icon"></i>Kematian</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-check-circle-o nav_icon"></i> <span
                                class="nav-label">Layanan Anak</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="profil-anak.html" class=" hvr-bounce-to-right"> <i class="fa fa-dashboard nav_icon"></i>Pengukuran
                                anak</a></li>
                            <li><a href="profil-anak.html" class=" hvr-bounce-to-right"> <i class="fa fa-eyedropper nav_icon"></i>Imunisasi</a>
                            </li>
                            <li><a href="#" class=" hvr-bounce-to-right"><i class="fa fa-male nav_icon"></i>Status
                                gizi</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="layout.html" class=" hvr-bounce-to-right"><i
                                class="fa fa-file-text-o nav_icon"></i> <span class="nav-label">Laporan</span> </a>
                    </li>
                    <li>
                        <a href="layout.html" class=" hvr-bounce-to-right"><i
                                class="fa fa-institution nav_icon"></i> <span class="nav-label">Petugas</span> </a>
                    </li>
                </ul>
            </div>
        </div>
</nav>