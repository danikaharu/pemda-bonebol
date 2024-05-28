<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href="beranda">
                            <img src="{{ asset('assets/template_user/img/logo1.png') }}" alt="logo"
                                class="mobile-hide">
                        </a>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul>
                            <li class="current-list-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                            <li class="current-list-item"><a href="#">Profil</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('profil.visi-misi') }}">Visi Misi</a></li>
                                    <li><a href="{{ route('profil.strukturSKPD') }}">Struktur Perangkat Daerah</a></li>
                                    <li><a href="{{ route('profil.daftarSKPD') }}">Daftar Perangkat Daerah</a></li>
                                    <li><a href="{{ route('profil.daftarKecamatan') }}">Daftar Kecamatan</a></li>
                                    <li><a href="{{ route('profil.prestasiBoneBolango') }}">Prestasi Bone Bolango</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">Informasi</a>
                                <ul class="sub-menu">
                                    <li class="dropdown">

                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                            aria-expanded="false">
                                            SAKIP
                                        </a>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('informasi.renstra') }}">RENSTRA</a>
                                            <a class="dropdown-item" href="{{ route('informasi.renja') }}">RENJA</a>
                                            <a class="dropdown-item" href="{{ route('informasi.iku') }}">Indikator
                                                Kinerja Utama</a>
                                            <a class="dropdown-item" href="{{ route('informasi.pohonKinerja') }}">Pohon
                                                Kinerja & Cascading</a>
                                            <a class="dropdown-item"
                                                href="{{ route('informasi.perjanjianKinerja') }}">Perjanjian
                                                Kinerja</a>
                                            <a class="dropdown-item"
                                                href="{{ route('informasi.rencanaAksi') }}">Rencana Aksi</a>
                                            <a class="dropdown-item"
                                                href="{{ route('informasi.laporanKinerja') }}">Laporan Kinerja</a>
                                            <a class="dropdown-item" href="{{ route('informasi.monevAksi') }}">Monev
                                                Rencana Aksi</a>
                                        </div>
                                    </li>
                                    <li><a href="{{ route('informasi.keuangan') }}">Keuangan</a></li>
                                    <li><a href="{{ route('informasi.perencanaan') }}">Dokumen Perencanaan</a></li>
                                    <li><a href="{{ route('informasi.pertanggungjawaban') }}">Laporan
                                            Pertanggungjawaban</a></li>
                                </ul>
                            </li>
                            <li><a href="https://ppid.bonebolangokab.go.id" target="blank">PPID</a></li>
                            <li><a href="https://jdih.bonebolangokab.go.id" target="blank">Regulasi</a></li>
                            <li><a href="https://gis.bonebolangokab.go.id" target="blank">WEB GIS</a></li>
                        </ul>
                    </nav>
                    <div class="mobile-menu"></div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>
