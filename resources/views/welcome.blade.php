<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== FAVICON ===============-->
        <link rel="shortcut icon" href="{{asset('backend/img/logo1.png')}}" type="image/x-icon">

        <!--=============== REMIX ICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="{{asset('backend/css/style_home.css')}}">
        <title>Istana Sumber Suci</title>
    </head>
    <body>
        <!--==================== HEADER ====================-->
        <header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo">
                    <i class="nav__logo-icon"></i> Istana Sumber Suci
                </a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="#home" class="nav__link active-link">Beranda</a>
                        </li>
                        <li class="nav__item">
                            <a href="#about" class="nav__link">Tentang</a>
                        </li>
                        <li class="nav__item">
                            <a href="#faqs" class="nav__link">FAQs</a>
                        </li>
                        <li class="nav__item">
                            <a href="{{ __('umkm') }}" class="nav__link">UMKM</a>
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
            <!--==================== HOME ====================-->
            <section class="home" id="home">
                <div class="home__container container grid">
                    <img src="{{asset('backend/img/home.png')}}" alt="" class="home__img">

                    <div class="home__data">
                        <h1 class="home__title">
                            Selamat Datang 
                        </h1>
                        <p class="home__description">
                            Di Website Istana Sumber Suci Desa Tambong
                        </p>
                        <a href="#about" class="button button--flex">
                            Selengkapnya <i class="ri-arrow-right-down-line button__icon"></i>
                        </a>
                    </div>
                </div>
            </section>

            <!--==================== ABOUT ====================-->
            <section class="about section container" id="about">
                <div class="about__container grid">
                    <img src="{{asset('backend/img/pakades.png')}}" alt="" class="about__img">

                    <div class="about__data">
                        <h2 class="section__title about__title">
                           Istana Sumber Suci <br> itu Apa Sih?
                        </h2>

                        <p class="about__description">
                            Istana Sumber Suci merupakan sebuah kelompok swadaya masyarakat desa Tambong yang bergerak dibidang pengelolaan sampah. Istana Sumber Suci Sendiri berdiri pada tahun 2020 dan sudah mengantongi SK MENKUMHAM di tahun yang sama.
                        </p>

                        <p class="about__description">
                            Hadirnya website ini sebagai sarana untuk digitalisasi Bank Sampah serta sebagai tempat para UMKM desa Tambong untuk mempromosikan barang ataupun jasa mereka. 
                        </p>

                        <a href="{{ __('umkm') }}" class="button--link button--flex">
                            Lihat produk UMKM <i class="ri-arrow-right-down-line button__icon"></i>
                        </a>
                    </div>
                </div>
            </section>

            <!--==================== STEPS ====================-->
            <section class="steps section container">
                <div class="steps__bg">
                    <h2 class="section__title-center steps__title">
                        Motto kami
                    </h2>

                    <div class="steps__container grid">
                        <div class="steps__card">
                            <div class="steps__card-number">01</div>
                            <h3 class="steps__card-title">Reduce</h3>
                            <p class="steps__card-description">
                                Reduce sendiri memiliki arti mengurangi sampah. Maksud dari langkah ini adalah mengurangi penggunaan produk yang nantinya berpotensi menjadi sampah.
                            </p>
                        </div>

                        <div class="steps__card">
                            <div class="steps__card-number">02</div>
                            <h3 class="steps__card-title">Reuse</h3>
                            <p class="steps__card-description">
                                Reuse berarti menggunakan kembali. Tahap ini mengajak untuk menggunakan kembali produk yang sudah terpakai, dengan demikian sampah produk dapat berkurang.
                            </p>
                        </div>

                        <div class="steps__card">
                            <div class="steps__card-number">03</div>
                            <h3 class="steps__card-title">Recycle</h3>
                            <p class="steps__card-description">
                                Recycle berarti mendaur ulang sampah yang tadinya tidak berguna menjadi sesuatu yang berguna, seperti mainan, kerajinan, hingga pupuk tanaman.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== QUESTIONS ====================-->
            <section class="questions section" id="faqs">
                <h2 class="section__title-center questions__title container">
                    Beberapa pertanyaan <br> yang sering diajukan
                </h2>

                <div class="questions__container container grid">
                    <div class="questions__group">
                        <div class="questions__item">
                            <header class="questions__header">
                                <i class="ri-add-line questions__icon"></i>
                                <h3 class="questions__item-title">
                                    Apa saja fungsi dari website ini?
                                </h3>
                            </header>

                            <div class="questions__content">
                                <p class="questions__description">
                                    Fungsi utama dari website ini adalah sebagai sistem digitalisasi Bank Sampah di desa Tambong dan juga merangkap sebagai tempat bagi UMKM mempromosikan barang ataupun jasa mereka.
                                </p>
                            </div>
                        </div>

                        <div class="questions__item">
                            <header class="questions__header">
                                <i class="ri-add-line questions__icon"></i>
                                <h3 class="questions__item-title">
                                    Apa benefit menjadi nasabah Bank Sampah?
                                </h3>
                            </header>

                            <div class="questions__content">
                                <p class="questions__description">
                                    Tentunya dari setiap sesi pengumpulan sampah anda akan mendapatkan bayaran berupa uang dengan nominal tertentu untuk setiap jenis sampah nya yang nantinya akan dijadikan saldo untuk akun nasabah anda.
                                </p>
                            </div>
                        </div>

                        <div class="questions__item">
                            <header class="questions__header">
                                <i class="ri-add-line questions__icon"></i>
                                <h3 class="questions__item-title">
                                    Apa yang bisa saya lakukan dengan saldo saya?
                                </h3>
                            </header>

                            <div class="questions__content">
                                <p class="questions__description">
                                    Saldo yang anda miliki nantinya dapat digunakan untuk membayar listrik, air, ataupun pajak bumi dan bangunan. Serta kedepan nya saldo anda dapat digunakan untuk membeli sembako. 
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="questions__group">
                        <div class="questions__item">
                            <header class="questions__header">
                                <i class="ri-add-line questions__icon"></i>
                                <h3 class="questions__item-title">
                                    Bisakah saya berebelanja dari website ini?
                                </h3>
                            </header>

                            <div class="questions__content">
                                <p class="questions__description">
                                  Fitur berebelanja masih dalam tahap pengembangan dan belum tersedia untuk saat ini.
                                </p>
                            </div>
                        </div>

                        <div class="questions__item">
                            <header class="questions__header">
                                <i class="ri-add-line questions__icon"></i>
                                <h3 class="questions__item-title">
                                    Siapa yang membangun sistem digitalisasi ini?
                                </h3>
                            </header>

                            <div class="questions__content">
                                <p class="questions__description">
                                    Kami dari tim Flora Politeknik Negeri Banyuwangi di beri amanah oleh Kepala Desa Tambong untuk membangun sistem digitalisasi Bank Sampah ini. Tim developer Flora sendiri terdiri dari 4 orang, 2 orang sebagai pengembangan website dan 2 orang lagi sebagai pengembangan aplikasi mobile. 
                                </p>
                            </div>
                        </div>

                        <div class="questions__item">
                            <header class="questions__header">
                                <i class="ri-add-line questions__icon"></i>
                                <h3 class="questions__item-title">
                                    Siapa saja anggota tim developer Flora?
                                </h3>
                            </header>

                            <div class="questions__content">
                                <p class="questions__description">
                                    Tim developer Flora terdiri dari 4 orang, Muhamad Aji Hermansya, Xavier Is'ad Ariel sebagai pengembang aplikasi mobile, dan Helmi Nafan Ananda, Azril Praya Prasetyo sebagai pengembang website.
                                </p>
                            </div>
                        </div>
                    </div>
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
        <script src="{{asset('backend/js/scrollreveal.min.js')}}"></script>
        
        <!--=============== MAIN JS ===============-->
        <script src="{{asset('backend/js/main.js')}}"></script>
    </body>
</html>
