@extends('layouts.user.index')

@section('content')
    <!-- hero area -->
    <div class="hero-area hero-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 offset-lg-2 text-center">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <img src="{{ asset('assets/template_user/img/logo-hero.png') }}" alt="logo" width="7%"
                                class="mb-2">
                            <p class="subtitle">Selamat Datang di Situs Resmi</p>
                            <h1>Pemerintah Kabupaten Bone Bolango</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end hero area -->

    <!-- home page slider -->
    <div class="container-fluid">
        <div class="homepage-slider mt-100 mb-50">
            <!-- single home slider -->
            @foreach ($banners as $banner)
                <div class="single-homepage-slider">
                    <img src="{{ asset('storage/upload/banner/' . $banner->file) }}" alt="slider"
                        style="display:block; width:100%;">
                </div>
            @endforeach
            <!-- end single home slider -->
        </div>
    </div>
    <!-- end home page slider -->

    <!-- latest news -->
    <div class="latest-news pt-150 pb-100">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Berita</span> Terkini</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach (array_slice($articles, 0, 4) as $article)
                    <div class="col-lg-3 col-md-6">
                        <div class="single-latest-news">
                            <a href="{{ $article['link'] }}" target="blank">
                                <div class="latest-news-bg">
                                    <img src="{{ $article['yoast_head_json']['og_image'][0]['url'] }}" alt="Thumbnail"
                                        height="200vh" width="100%">
                                </div>
                            </a>
                            <div class=" news-text-box">
                                <h3>
                                    <a href="{{ $article['link'] }}">
                                        {{ $article['title']['rendered'] }}
                                    </a>
                                </h3>
                                <p class="blog-meta">
                                    <span class="author"><i class="fas fa-user"></i> Admin</span>
                                    <span class="date"><i class="fas fa-calendar"></i>
                                        {{ Carbon\Carbon::parse($article['date'])->format('F d Y') }}</span>
                                </p>
                                <p class="excerpt"></p>
                                <h5 style="text-align: justify">{!! Str::limit($article['excerpt']['rendered'], 150, '...') !!}
                                    <a href="{{ $article['link'] }}" class="read-more-btn">Selengkapnya<i
                                            class="fas fa-angle-right"></i></a>
                                </h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end latest news -->

    <!-- Pelayanan publik-->
    <div class="latest-news mb-5" id="service">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title" style="margin-bottom: 50px;">
                        <h3><span class="orange-text">Pelayanan</span> Publik</h3>
                    </div>
                </div>
            </div>

            <div class="row padding-sm">
                <div class="col-4 col-md-4 p-1 px-lg-2">
                    <a target="_blank" href="#">
                        <div class="service-box">
                            <span class="number">1</span>
                            <span class="header">PPID</span>
                            <div class="body">Layanan informasi publik daerah</div>
                        </div>
                    </a>
                </div>
                <div class="col-4 col-md-4 p-1 px-lg-2">
                    <a target="_blank" href="#">
                        <div class="service-box">
                            <span class="number">2</span>
                            <span class="header">TRANSPARANSI ANGGARAN</span>
                            <div class="body"></div>
                        </div>
                    </a>
                </div>
                <div class="col-4 col-md-4 p-1 px-lg-2">
                    <a target="_blank" href="#">
                        <div class="service-box">
                            <span class="number">3</span>
                            <span class="header">ALOKASI DANA DESA</span>
                            <div class="body"></div>
                        </div>
                    </a>
                </div>
                <div class="col-4 col-md-4 p-1 px-lg-2">
                    <a target="_blank" href="http://covid-19.bonebolangokab.go.id/">
                        <div class="service-box">
                            <span class="number">4</span>
                            <span class="header">LAWAN CORONA</span>
                            <div class="body"></div>
                        </div>
                    </a>
                </div>
                <div class="col-4 col-md-4 p-1 px-lg-2">
                    <a target="_blank" href="#">
                        <div class="service-box">
                            <span class="number">5</span>
                            <span class="header">DISDAG ONLINE</span>
                            <div class="body">Info harga</div>
                        </div>
                    </a>
                </div>
                <div class="col-4 col-md-4 p-1 px-lg-2">
                    <a target="_blank" href="#">
                        <div class="service-box">
                            <span class="number">6</span>
                            <span class="header">KOPERASI DAN UKM ONLINE</span>
                            <div class="body"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row padding-sm">

            </div>
        </div>
    </div>
    <!-- end pelayanan publik -->

    <!-- agenda section -->
    <div class="abt-section mb-150">
        <div class="container">
            <div class="row">
                <div class=" col-lg-7 col-md-12">
                    <h3>Daftar <span class="orange-text">Agenda</span></h3>
                    @foreach ($agendas as $agenda)
                        <ul style="list-style:none; padding:0;">
                            <li style="font-weight:bold;">
                                <a href="" style="color: #FF556E;">
                                    <?= $agenda['title'] ?>
                                </a>
                            </li>
                            <li><span class="text-muted"><?= $agenda['place'] ?></span></li>
                        </ul>
                    @endforeach
                </div>
                <div class="col-lg-5 col-md-12">
                    <h3>GPR <span class="orange-text">Widget</span></h3>
                    <script type="text/javascript" src="https://widget.kominfo.go.id/gpr-widget-kominfo.min.js" async></script>
                    <div id="gpr-kominfo-widget-container" style="width: 100% !important;"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end agenda section -->


    <!-- wisata -->
    {{-- <div class="latest-news pb-100" id="wisata">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Wisata</span> Populer</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="row pr-2">
                    <div class="col-12">
                        <div class="img-box">
                            <img src="public/assets/admin/image/wisata/olele.jpg" alt=""
                                style="height: 260px; width: 100%; object-fit: cover;">
                            <a href="https://goo.gl/maps/CGATuCmAFmuxnFAg9" target="blank" class="btn btn-circle">
                                <i class="fas fa-map-marker-alt"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-12">
                        <a href="https://goo.gl/maps/CGATuCmAFmuxnFAg9" target="blank">Taman Laut Olele </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="row pr-2">
                    <div class="col-12">
                        <div class="img-box">
                            <img src="public/assets/admin/image/wisata/ulanta.jpeg" alt=""
                                style="height: 260px; width: 100%; object-fit: cover;">
                            <a href="https://goo.gl/maps/AKNf2fvqNiCUtmvj7" target="blank" class="btn btn-circle">
                                <i class="fas fa-map-marker-alt"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-12">
                        <a href="https://goo.gl/maps/AKNf2fvqNiCUtmvj7" target="blank">Benteng Ulantha</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="row pr-2">
                    <div class="col-12">
                        <div class="img-box">
                            <img src="public/assets/admin/image/wisata/hiu_paus.jpeg" alt=""
                                style="height: 260px; width: 100%; object-fit: cover;">
                            <a href="https://goo.gl/maps/EKweUCjmLa2N2hfL8" target="blank" class="btn btn-circle">
                                <i class="fas fa-map-marker-alt"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-12">
                        <a href="https://goo.gl/maps/EKweUCjmLa2N2hfL8" target="blank">Wisata Hiu Paus Botubarani </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="row pr-2">
                    <div class="col-12">
                        <div class="img-box">
                            <img src="public/assets/admin/image/wisata/lombongo.jpeg" alt=""
                                style="height: 260px; width: 100%; object-fit: cover;">
                            <a href="https://goo.gl/maps/AKNf2fvqNiCUtmvj7" target="blank" class="btn btn-circle">
                                <i class="fas fa-map-marker-alt"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-12">
                        <a href="https://goo.gl/maps/AKNf2fvqNiCUtmvj7" target="blank">Pemandian Air Panas Lombongo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <!-- end wisata -->
@endsection
