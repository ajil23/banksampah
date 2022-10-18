<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Sampah</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- custom css file link  -->
    <style>
        :root {
            --green: #125f11;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
            text-transform: capitalize;
            transition: all .3s cubic-bezier(.38, 1.15, .7, 1.12);
            font-weight: normal;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        *::selection {
            background: var(--green);
            color: #fff;
        }

        html {
            font-size: 62.5%;
            overflow-x: hidden;
        }

        html::-webkit-scrollbar {
            width: 1.3rem;
        }

        html::-webkit-scrollbar-track {
            background: #eee;
        }

        html::-webkit-scrollbar-thumb {
            background: var(--green);
        }

        section {
            min-height: 100vh;
            padding: 0 7%;
            padding-top: 9rem;
        }

        .btn {
            padding: .7rem 2rem;
            font-size: 1.7rem;
            cursor: pointer;
            margin-top: 1rem;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
        }


        .heading {
            text-align: center;
            padding: 1rem;
            color: var(--green);
            font-size: 3.5rem;
        }

        header {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 2rem 7%;
            background: #fff;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        header .logo img {
            height: 4rem;
        }

        header .navbar a {
            font-size: 2rem;
            color: #aaa;
            margin-left: 3rem;
            font-weight: 600;
        }

        header .navbar a:hover {
            color: var(--green);
            font-weight: 700;
        }

        #menu {
            font-size: 3rem;
            color: #666;
            cursor: pointer;
            padding: .5rem 1rem;
            border: .2rem solid rgba(0, 0, 0, .2);
            border-radius: .5rem;
            display: none;
        }

        .home {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: url('backend/img/home-bg.jpg') no-repeat;
            background-size: cover;
            background-position: center;
        }

        .home .content {
            padding-left: 10rem;
            width: 75rem;
        }

        .home .content h3 {
            font-size: 4.5rem;
            color: var(--green);
        }

        .home .content p {
            font-size: 2rem;
            color: #aaa;
            padding: 1rem 0;
        }

        .product .box-container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
        }

        .product .box-container .box {
            border: .1rem solid rgba(0, 0, 0, .1);
            margin: 2rem;
            padding: 1rem;
            border-radius: .5rem;
            background: #fff;
            width: 30rem;
            text-align: center;
        }

        .product .box-container .box img {
            height: 20rem;
            width: 20rem;
            object-fit: cover;
        }

        .product .box-container .box h3 {
            font-size: 2rem;
            color: var(--green);
        }

        .product .box-container .box .stars i {
            font-size: 2rem;
            color: gold;
            padding: 1rem .1rem;
        }

        .product .box-container .box .price {
            font-size: 2rem;
            color: #666;
        }

        .product .box-container .box .price span {
            font-size: 1.5rem;
            color: #aaa;
            padding-right: .5rem;
            text-decoration: line-through;
        }

        .product .box-container .box .icons {
            padding: 1rem 0;
        }

        .product .box-container .box .icons a {
            font-size: 1.5rem;
            color: #666;
            height: 5rem;
            width: 5rem;
            line-height: 5rem;
            border: .1rem solid rgba(0, 0, 0, .1);
            border-radius: .5rem;
            margin: .5rem;
        }

        .product .box-container .box .icons a:hover {
            background: #eee;
        }

        .about .row {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
        }

        .about .row .image {
            flex: 1 1 40rem;
        }

        .about .row .image img {
            width: 100%;
        }

        .about .row .content {
            flex: 1 1 40rem;
            padding: 2rem 1rem;
        }

        .about .row .content h3 {
            color: var(--green);
            font-size: 2.5rem;
        }

        .about .row .content p {
            color: #aaa;
            font-size: 1.7rem;
            padding: 1rem 0;
        }

        .service .box-container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
        }

        .service .box-container .box {
            text-align: center;
            width: 30rem;
            margin: 2rem;
        }

        .service .box-container .box i {
            font-size: 5rem;
            color: #aaa;
            padding: 1rem;
        }

        .service .box-container .box h3 {
            font-size: 2rem;
            color: var(--green);
        }

        .service .box-container .box p {
            font-size: 1.5rem;
            color: #999;
            padding: 1rem 0;
        }

        .review .box-container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
        }

        .review .box-container .box {
            margin: 2rem;
            padding: 1rem;
            flex: 1 1 35rem;
        }

        .review .box-container .box .info {
            padding: 1rem 0;
            display: flex;
            align-items: center;
        }

        .review .box-container .box .info img {
            height: 7rem;
            width: 7rem;
            object-fit: cover;
            border: .5rem solid var(--green);
            border-radius: 50%;
        }

        .review .box-container .box .info .user {
            padding-left: 1rem;
        }

        .review .box-container .box .info .user h3 {
            font-size: 2rem;
            color: var(--green);
        }

        .review .box-container .box .info .user span {
            font-size: 1.5rem;
            color: #666;
        }

        .review .box-container .box p {
            font-size: 1.5rem;
            color: #999;
        }

        .contact {
            padding-bottom: 3rem;
        }

        .contact .row {
            display: flex;
            flex-wrap: wrap;
            border-radius: 2rem;
            border: .1rem solid rgba(0, 0, 0, .1);
            overflow: hidden;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
        }

        .contact .row .image {
            flex: 1 1 40rem;
        }

        .contact .row .image img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .contact .row form {
            flex: 1 1 40rem;
            padding: 2rem 4rem;
        }

        .contact .row form .inputBox {
            padding: 1rem 0;
        }

        .contact .row form .inputBox h3 {
            color: var(--green);
            padding: .5rem 0;
            font-size: 2rem;
        }

        .contact .row form .inputBox input,
        .contact .row form .inputBox textarea {
            width: 100%;
            padding: 1.5rem;
            font-size: 1.5rem;
            border: .1rem solid rgba(0, 0, 0, .1);
        }

        .contact .row form .inputBox textarea {
            resize: none;
            height: 15rem;
        }

        .footer {
            min-height: auto;
            padding-top: 2rem;
            background: linear-gradient(rgba(255, 255, 255, .7), rgba(255, 255, 255, .7)), url(../images/footer-bg.jpg) no-repeat;
            background-size: cover;
            background-position: center;
        }

        .footer .box-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .footer .box-container .box {
            margin: 2rem;
            flex: 1 1 25rem;
        }

        .footer .box-container .box img {
            height: 4rem;
        }

        .footer .box-container .box p {
            font-size: 1.5rem;
            color: #999;
            padding: 1rem 0;
        }

        .footer .box-container .box p i {
            padding-right: 1rem;
            color: var(--green);
        }

        .footer .box-container .box h3 {
            font-size: 2.5rem;
            color: var(--green);
            padding: 1rem 0;
        }

        .footer .box-container .box a {
            height: 5rem;
            width: 5rem;
            line-height: 4.8rem;
            text-align: center;
            border: .1rem solid rgba(0, 0, 0, .1);
            border-radius: 50%;
            font-size: 2rem;
            color: #aaa;
            margin-right: 1rem;
        }

        .footer .box-container .box a:hover {
            background: #999;
            color: #fff;
        }

        .footer .credit {
            padding: 2rem 1rem;
            text-align: center;
            font-size: 2rem;
            color: #999;
            border-top: .1rem solid rgba(0, 0, 0, .1);
        }

        .footer .credit span {
            color: var(--green);
            font-weight: 650;
        }

        #scroll-top {
            position: fixed;
            bottom: 7.5rem;
            right: 2rem;
            z-index: 100;
            height: 6rem;
            width: 6rem;
            line-height: 6rem;
            font-size: 3rem;
            text-align: center;
            color: var(--green);
            border: .1rem solid rgba(0, 0, 0, .1);
            border-radius: .5rem;
            background: #f9f9f9;
        }


        /* media queries  */

        @media (max-width:991px) {

            html {
                font-size: 55%;
            }

            .home .content {
                padding: 0;
            }

            #scroll-top {
                bottom: 3rem;
            }

        }

        @media (max-width:788px) {

            #menu {
                display: block;
            }

            header {
                padding: 2rem 3%;
            }

            header .navbar {
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: #f9f9f9;
                text-align: center;
                padding: 2rem 0;
                border-top: .1rem solid rgba(0, 0, 0, .1);
                transform: scaleY(0);
                transform-origin: top;
                opacity: 0;
            }

            header .navbar.nav-toggle {
                transform: scaleY(1);
                opacity: 1;
            }

            header .navbar a {
                display: block;
                padding: 1rem 0;
                margin: 1rem 0;
                font-size: 2.5rem;
            }

            section {
                padding: 0 3%;
                padding-top: 9rem;
            }

            .home {
                background: linear-gradient(rgba(255, 255, 255, .7), rgba(255, 255, 255, .7)), url('backend/img/home-bg.jpg') no-repeat;
                background-position: left;
            }

            .home .content {
                width: auto;
            }

        }

        @media (max-width:400px) {

            html {
                font-size: 50%;
            }

        }
    </style>

</head>

<body>

    <!-- header section starts  -->

    <header>

        <a href="#" class="logo"><img src="{{asset('backend/img/fix.png')}}" alt=""></a>

        <div id="menu" class="fas fa-bars"></div>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#motto">motto</a>
            <a href="#develop">develop</a>
        </nav>

    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="content">
            <h3>Selamat Datang di Website Istana Sumber Suci <br> Desa Tambong</h3>
            <p>Reduce, Reuse, Recycle</p>
            <a href="{{ route('login') }}"><button class="btn btn-success">Login dulu yuk!</button></a>
        </div>


    </section>

    <!-- home section ends -->

    <!-- about section starts  -->

    <section class="about" id="about">

        <h1 class="heading">about us</h1>

        <div class="row">

            <div class="image">
                <img src="{{asset('backend/img/logo1.png')}}" alt="">
            </div>

            <div class="content">
                <h3>Apa itu Istana Sumber Suci?</h3>
                <p>Istana Sumber Suci merupakan sebuah kelompok swadaya masyarakat desa Tambong yang bergerak dibidang pengelolaan sampah. Istana Sumber Suci Sendiri berdiri pada tahun 2020 dan sudah mengantongi SK MENKUMHAM di tahun yang sama.</p>
            </div>

        </div>

    </section>

    <!-- about section ends -->

    <!-- service section starts  -->

    <section class="service" id="motto">

        <h1 class="heading">motto</h1>

        <div class="box-container">

            <div class="box">
                <i class="fas fa-solid fa-filter"></i>
                <h3>Reduce</h3>
                <p>Reduce sendiri memiliki arti mengurangi sampah. Maksud dari langkah ini adalah mengurangi penggunaan produk yang nantinya berpotensi menjadi sampah</p>
            </div>

            <div class="box">
                <i class="fas fa-solid fa-hourglass-start"></i>
                <h3>Reuse</h3>
                <p>Reuse berarti menggunakan kembali. Tahap ini mengajak untuk menggunakan kembali produk yang sudah terpakai, dengan demikian sampah produk dapat berkurang.</p>
            </div>

            <div class="box">
                <i class="fas fa-solid fa-recycle"></i>
                <h3>Recycle</h3>
                <p>Recycle berarti mendaur ulang sampah yang tadinya tidak berguna menjadi sesuatu yang berguna, seperti mainan, kerajinan, hingga pupuk tanaman</p>
            </div>
        </div>

        </div>

    </section>

    <!-- service section ends -->

    <!-- review section starts  -->

    <section class="review" id="develop">

        <h1 class="heading">Developed by Flora🍃</h1>

        <div class="box-container">

            <div class="box">
                <div class="info">
                    <img src="{{asset('backend/img/pic1.png')}}" alt="">
                    <div class="user">
                        <h3>Mohamad Aji Hermansya</h3>
                        <span>362155401145</span>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum expedita cum iure nulla. Error hic facilis impedit ut inventore velit? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae, odit!</p>
            </div>

            <div class="box">
                <div class="info">
                    <img src="{{asset('backend/img/pic2.png')}}" alt="">
                    <div class="user">
                        <h3>Xavier Is'ad Ariel</h3>
                        <span>362155401117</span>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum expedita cum iure nulla. Error hic facilis impedit ut inventore velit? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae, odit!</p>
            </div>

            <div class="box">
                <div class="info">
                    <img src="{{asset('backend/img/pic3.png')}}" alt="">
                    <div class="user">
                        <h3>Helmi Nafan Ananda</h3>
                        <span>362155401149</span>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum expedita cum iure nulla. Error hic facilis impedit ut inventore velit? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae, odit!</p>
            </div>

            <div class="box">
                <div class="info">
                    <img src="{{asset('backend/img/pic4.png')}}" alt="">
                    <div class="user">
                        <h3>Azril Praya Prasetyo</h3>
                        <span>362155401107</span>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum expedita cum iure nulla. Error hic facilis impedit ut inventore velit? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae, odit!</p>
            </div>

        </div>

    </section>

    <!-- review section ends -->

    <!-- footer section  -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <img src="{{asset('backend/img/fix.png')}}" alt="">
                <p>Mari menjaga kebersihan lingkungan kita dengan selalu menerapkan prinsip Reduce, Reuse, Recycle demi kelangsungan hidup anak cucu kita di masa yang akan datang.</p>
            </div>

            <div class="box">
                <h3>contact details</h3>
                <p> <i class="fas fa-phone"></i> 0823-5059-9316 | 0813-3411-1111 </p>
                <p> <i class="fas fa-map-marker-alt"></i>Desa Tambong, Kec.Kabat, Banyuwangi - 68461. </p>
            </div>

        </div>

        <h1 class="credit"> Made with ❤️<span>by Flora Poliwangi</span></h1>

    </section>

    <!-- scroll top  -->
    <a href="#home" class="fas fa-arrow-up" id="scroll-top"></a>

    <!-- jquery cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- custom js file link  -->
    <script src="{{asset('backend/js/landingscript.js')}}"></script>

</body>

</html>