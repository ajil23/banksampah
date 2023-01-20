<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="{{ asset('backend/images/logo.png') }}" type="image/x-icon">

    <!--=============== REMIX ICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('backend/css/style_home.css') }}">

    <title>UMKM - Desa Tambong</title>
</head>

<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="{{ __('/') }}" class="nav__logo">
                <i class="nav__logo-icon"></i> Istana Sumber Suci
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="{{ __('/') }}" class="nav__link">Beranda</a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ __('/#about') }}" class="nav__link">Tentang</a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ __('/#faqs') }}" class="nav__link">FAQs</a>
                    </li>
                    <li class="nav__item">
                        <a href="#" class="nav__link active-link">UMKM</a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('login') }}" class="nav__link">Login</a>
                    </li>
                </ul>

                <div class="nav__close" id="nav-close">
                    <i class="ri-close-line"></i>
                </div>
            </div>

            <div class="nav__btns">
                <!-- Theme change button -->
                <i class="ri-moon-line change-theme" id="theme-button"></i>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-line"></i>
                </div>
            </div>
        </nav>
    </header>

    <main class="main">
        <!--==================== PRODUCTS ====================-->
        <section class="product section container" id="products">
            <h2 class="section__title-center">
                Produk UMKM Desa Tambong
            </h2>

            <p class="product__description">
                Temukan berbagai produk yang berkualitas hasil buah tangan dari masyarakat desa Tambong asli.
            </p>

            <div class="product__container grid">
                @foreach ($data as $item => $row)
                    <article class="product__card">
                         <div class="product__circle"></div>
                        <img src="{{asset('fotoBarang/'.$row->gambar)}}" alt="" class="product__img">
                        <h3 class="product__title">{{$row->judul}}</h3>
                        <span class="product__price">Rp. {{$row->harga}}</span>
                        <a href="https://api.whatsapp.com/send?phone={{$row->no_wa}}">
                            <button class="button--flex product__button">
                                <i class="ri-shopping-bag-line"></i>
                            </button>
                        </a>
                    </article>
                @endforeach
            </div>
        </section>
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <div class="footer__container container grid">
            <div class="footer__content">
                <h3 class="footer__title">Alamat Kami</h3>

                <ul class="footer__data">
                    <li class="footer__information">Desa Tambong, Kec.Kabat,</li>
                    <li class="footer__information"> Banyuwangi - 68461.</li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Kontak kami</h3>

                <ul class="footer__data">
                    <li class="footer__information">0823-5059-9316</li>
                    <li class="footer__information">0813-3411-1111</li>
                </ul>
            </div>
        </div>

        <p class="footer__copy">&#169; Bedimcode. All rigths reserved</p>
    </footer>

    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-fill scrollup__icon"></i>
    </a>

    <!--=============== SCROLL REVEAL ===============-->
    <script src="{{ asset('backend/js/scrollreveal.min.js') }}"></script>

    <!--=============== MAIN JS ===============-->
    <script src="{{ asset('backend/js/main.js') }}"></script>
</body>

</html>
