<!DOCTYPE html>
<html>

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Laporan Sampah Jogja</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- font css -->
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
</head>

<body>
    <?php
    include "layout/header.html"
    ?>
    <!-- banner section start -->

    <div class="banner_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <style>
                        :root {
                            --primary-color: #00c6aa;
                            --secondary-color: #2b2b2b;
                            --text-color-light: #666;
                            --text-color-dark: #333;
                        }

                        body {
                            height: 400vh;
                        }

                        .container {
                            padding-top: 20px;
                            max-width: 70%;
                            margin: 0 auto;
                            height: 100vh;
                        }

                        .banner_taital {
                            font-size: clamp(3.5rem, 5vw, 2.5rem);
                            font-weight: 800;
                            color: var(--text-color-dark);
                            line-height: 1.3;
                            margin-bottom: 20px;
                            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
                            padding-right: 30px;
                        }

                        .banner_taital span {
                            color: var(--secondary-color);
                            font-weight: 700;
                        }

                        .banner_text {
                            font-size: clamp(1rem, 4vw, 1.1rem);
                            color: var(--text-color-light);
                            margin-bottom: 30px;
                            line-height: 1.6;
                            padding-right: 30px;
                        }

                        .started_text {
                            margin-bottom: 20px;
                            transition: transform 0.3s ease;
                        }

                        .started_text a {
                            display: inline-block;
                            padding: 12px 25px;
                            background-color: rgba(0, 198, 170, 0.1);
                            color: var(--primary-color);
                            text-decoration: none;
                            border-radius: 10px;
                            font-weight: 600;
                            text-transform: uppercase;
                            transition: all 0.3s ease;
                            border: 2px solid var(--primary-color);
                            position: relative;
                            overflow: hidden;
                            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                        }

                        .started_text a:before {
                            content: '';
                            position: absolute;
                            top: 0;
                            left: -100%;
                            width: 100%;
                            height: 100%;
                            background-color: var(--primary-color);
                            transition: all 0.3s ease;
                            z-index: -1;
                        }

                        .started_text a:hover {
                            color: white;
                            transform: translateY(-3px);
                            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
                        }

                        .started_text a:hover:before {
                            left: 0;
                        }

                        .started_text a:active {
                            transform: scale(0.95);
                        }

                        .play_icon {
                            margin-top: 10px;
                        }

                        .play_icon img {
                            max-width: 100px;
                            opacity: 0.7;
                            transition: all 0.3s ease;
                            border-radius: 70%;
                            padding: 5px;
                        }

                        .play_icon img:hover {
                            opacity: 4;
                            transform: scale(1.2);
                            background-color: rgba(0, 198, 170, 0.1);
                        }

                        @media (max-width: 768px) {

                            .banner_taital,
                            .banner_text {
                                padding-right: 0;
                            }
                        }
                    </style>
                    <h1 class="banner_taital">Laporan Progress Infrastruktur Persampahan <span>Kota Jogja</span></h1>
                    <p class="banner_text">Langsung gaskan upload laporan kamu pakai tombol dibawah ini!</p>
                    <div class="started_text"><a href="progressReport.php">Unggah Laporan</a></div>
                    <div class="play_icon"><img src="images/play-icon.png"></div>
                </div>
                <div class="col-md-6">
                    <style>
                        #banner_slider {
                            width: 100%;
                            max-width: 100%;
                            margin: 0 auto;
                            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                            border-radius: 15px;
                            overflow: hidden;
                        }

                        .banner_img {
                            height: 50vh;
                            width: 100%;
                            overflow: hidden;
                            border-radius: 15px;
                        }

                        .banner_img img {
                            width: 100%;
                            height: 100%;
                            object-fit: cover;
                            object-position: center;
                            transition: transform 0.3s ease;
                        }

                        .banner_img img:hover {
                            transform: scale(1.05);
                        }

                        .carousel-indicators {
                            bottom: 10px;
                        }

                        .carousel-indicators li {
                            width: 10px;
                            height: 10px;
                            border-radius: 50%;
                            background-color: rgba(255, 255, 255, 0.5);
                            margin: 0 5px;
                        }

                        .carousel-indicators .active {
                            background-color: white;
                        }

                        .carousel-caption {
                            background-color: rgba(0, 0, 0, 0.5);
                            padding: 10px;
                            border-radius: 5px;
                        }

                        .carousel-control-prev,
                        .carousel-control-next {
                            width: 5%;
                            opacity: 0.7;
                            transition: opacity 0.3s ease;
                        }

                        .carousel-control-prev:hover,
                        .carousel-control-next:hover {
                            opacity: 1;
                        }

                        .carousel-caption h5 {
                            font-family: 'clamp';
                            font-weight: 300;
                            font-size: 30px;
                            color: rgb(255, 255, 255);
                            padding-bottom: 0px;
                        }
                    </style>

                    <div id="banner_slider" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#banner_slider" data-slide-to="0" class="active"></li>
                            <li data-target="#banner_slider" data-slide-to="1"></li>
                            <li data-target="#banner_slider" data-slide-to="2"></li>
                            <li data-target="#banner_slider" data-slide-to="3"></li>
                            <li data-target="#banner_slider" data-slide-to="4"></li>
                        </ol>

                        <div class="carousel-inner rounded">
                            <div class="carousel-item active">
                                <div class="banner_img"><img src="images/jogja-1.jpg" class="img-fluid mx-auto d-block"></div>
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Yogyakarta</h5>
                                    <p>Kota Budaya dan Pendidikan</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="banner_img"><img src="images/jogja-2.jpg" class="img-fluid mx-auto d-block"></div>
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Yogyakarta</h5>
                                    <p>Kota Istimewa</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="banner_img"><img src="images/jogja-3.jpg" class="img-fluid mx-auto d-block"></div>
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Yogyakarta</h5>
                                    <p>Kota Wisata</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="banner_img"><img src="images/jogja-4.jpg" class="img-fluid mx-auto d-block"></div>
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Yogyakarta</h5>
                                    <p>Kota Sejahtera</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="banner_img"><img src="images/jogja-5.jpg" class="img-fluid mx-auto d-block"></div>
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Yogyakarta</h5>
                                    <p>Kota Kreatif</p>
                                </div>
                            </div>
                        </div>

                        <a class="carousel-control-prev" href="#banner_slider" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#banner_slider" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner section end -->
    <!-- header section end -->


    <!-- services section start -->
    <div class="services_section layout_padding">
        <div class="container">
            <div class="row_services">
                <div class="col-md-4">
                    <style>
                        :root {
                            --primary-color: #00c6aa;
                            --secondary-color: #2b2b2b;
                            --text-color-light: #666;
                            --text-color-dark: #333;
                            --box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                        }

                        .services_section {
                            align-items: center;
                        }

                        .row_services {
                            margin-top: 100px;
                        }

                        .services_taital {
                            font-size: 3.5rem;
                            font-weight: 800;
                            color: var(--text-color-dark);
                            margin-bottom: 30px;
                            line-height: 1.3;
                        }

                        .services_text {
                            font-size: 1.1rem;
                            color: var(--text-color-light);
                            margin-bottom: 35px;
                            line-height: 1.6;
                        }

                        .readmore_btn a {
                            display: inline-block;
                            padding: 12px 25px;
                            background-color: rgba(0, 198, 170, 0.1);
                            color: var(--primary-color);
                            text-decoration: none;
                            border-radius: 10px;
                            font-weight: 600;
                            text-transform: uppercase;
                            transition: all 0.3s ease;
                            border: 2px solid var(--primary-color);
                            box-shadow: var(--box-shadow);
                            position: relative;
                            overflow: hidden;
                        }

                        .readmore_btn a:before {
                            content: '';
                            position: absolute;
                            top: 0;
                            left: -100%;
                            width: 100%;
                            height: 100%;
                            background-color: var(--primary-color);
                            transition: all 0.3s ease;
                            z-index: -1;
                        }

                        .readmore_btn a:hover {
                            color: white;
                            transform: translateY(-3px);
                        }

                        .readmore_btn a:hover:before {
                            left: 0;
                        }
                    </style>
                    <h1 class="services_taital">Total Laporan Masuk</h1>
                    <p class="services_text">Visualisasi data laporan infrastruktur persampahan yang telah diterima dari berbagai kategori dan wilayah di Kota Yogyakarta.</p>
                    <div class="readmore_btn"><a href="visualization.php">Lihat Detail</a></div>
                </div>
                <div class="col-md-8">
                    <style>
                        .services_box_container {
                            display: grid;
                            grid-template-columns: repeat(3, 1fr);
                            gap: 30px;
                            margin-left: 50px;
                        }

                        .services_box {
                            background-color: #f9f9f9;
                            border-radius: 15px;
                            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                            justify-content: center;
                            text-align: center;
                            padding: 25px;
                            transition: all 0.3s ease;
                            position: relative;
                        }

                        .services_box:nth-child(1) {
                            transform: translateY(-20px);
                        }

                        .services_box:nth-child(2) {
                            transform: translateY(20px);
                        }

                        .services_box:nth-child(3) {
                            transform: translateY(-20px);
                        }

                        .services_box:nth-child(4) {
                            transform: translateY(20px);
                        }

                        .services_box:nth-child(5) {
                            transform: translateY(-20px);
                        }

                        .services_box:nth-child(6) {
                            transform: translateY(20px);
                        }

                        .services_box:hover {
                            transform: scale(1.05);
                            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
                            z-index: 10;
                        }

                        .fashion_text {
                            font-size: 1.2rem;
                            color: var(--secondary-color, #2b2b2b);
                            margin-bottom: 15px;
                            font-weight: 600;
                        }

                        .services_box img {
                            max-width: 100px;
                            margin-bottom: 15px;
                            transition: transform 0.3s ease;
                        }

                        .services_box img:hover {
                            transform: scale(1.1);
                        }

                        .services_box_overlay {
                            position: fixed;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            background: rgba(0, 0, 0, 0.7);
                            display: none;
                            align-items: center;
                            justify-content: center;
                            z-index: 1000;
                            opacity: 0;
                            transition: opacity 0.5s ease;
                        }

                        .services_box_zoom {
                            width: 80%;
                            max-width: 600px;
                            background: white;
                            padding: 30px;
                            border-radius: 20px;
                            text-align: center;
                            transform: scale(0.5);
                            opacity: 0;
                            transition: all 0.5s ease;
                        }

                        .services_box_overlay.active {
                            display: flex;
                            opacity: 1;
                        }

                        .services_box_overlay.active .services_box_zoom {
                            transform: scale(1);
                            opacity: 1;
                        }

                        .report_count {
                            position: absolute;
                            top: -10px;
                            right: -10px;
                            background-color: var(--primary-color, #00c6aa);
                            color: white;
                            border-radius: 50%;
                            width: 40px;
                            height: 40px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-weight: bold;
                            font-size: 1.1rem;
                        }

                        @media (max-width: 768px) {
                            .services_box_container {
                                grid-template-columns: repeat(2, 1fr);
                                margin-left: 0;
                            }

                            .services_box:nth-child(1),
                            .services_box:nth-child(2),
                            .services_box:nth-child(3),
                            .services_box:nth-child(4),
                            .services_box:nth-child(5),
                            .services_box:nth-child(6) {
                                transform: none;
                            }
                        }

                        @media (max-width: 480px) {
                            .services_box_container {
                                grid-template-columns: 1fr;
                            }
                        }
                    </style>
                    <div class="services_box_container">
                        <div class="services_box position-relative" onclick="openOverlay(this, 'Infrastruktur', 42)">
                            <h5 class="fashion_text">Infrastruktur</h5>
                            <img src="images/icon-1.png">
                            <div class="report_count">42</div>
                        </div>
                        <div class="services_box position-relative" onclick="openOverlay(this, 'Kebersihan', 28)">
                            <h5 class="fashion_text">Kebersihan</h5>
                            <img src="images/icon-2.png">
                            <div class="report_count">28</div>
                        </div>
                        <div class="services_box position-relative" onclick="openOverlay(this, 'Pengangkutan', 35)">
                            <h5 class="fashion_text">Pengangkutan</h5>
                            <img src="images/icon-3.png">
                            <div class="report_count">35</div>
                        </div>
                        <div class="services_box position-relative" onclick="openOverlay(this, 'Pemrosesan', 19)">
                            <h5 class="fashion_text">Pemrosesan</h5>
                            <img src="images/icon-4.png">
                            <div class="report_count">19</div>
                        </div>
                        <div class="services_box position-relative" onclick="openOverlay(this, 'Lingkungan', 22)">
                            <h5 class="fashion_text">Lingkungan</h5>
                            <img src="images/icon-5.png">
                            <div class="report_count">22</div>
                        </div>
                        <div class="services_box position-relative" onclick="openOverlay(this, 'Transportasi', 31)">
                            <h5 class="fashion_text">Transportasi</h5>
                            <img src="images/icon-6.png">
                            <div class="report_count">31</div>
                        </div>
                    </div>

                    <div class="services_box_overlay" onclick="closeOverlay()">
                        <div class="services_box_zoom">
                            <h2 id="overlay-title"></h2>
                            <p>Jumlah Laporan: <span id="overlay-count"></span></p>
                            <img id="overlay-image" src="" style="max-width: 200px;">
                            <p>Detail informasi akan ditambahkan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- services section end -->
    <!-- shop section start -->
    <div class="blog_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="blog_taital">Laporan terbaru yang telah terunggah</h1>
                </div>
            </div>
            <div class="blog_section_2">
                <div id="main_slider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="blog_img"><img src="images/blog-img.png"></div>
                                    <h6 class="number_text">01</h6>
                                    <div class="callnow_btn">
                                        <div class="chat_bt"><a href="#">Chat Now</a></div>
                                        <div class="call_bt active"><a href="#">Call Now</a></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="blog_img"><img src="images/blog-img1.png"></div>
                                    <h6 class="number_text">02</h6>
                                    <div class="callnow_btn">
                                        <div class="chat_bt"><a href="#">Chat Now</a></div>
                                        <div class="call_bt active"><a href="#">Call Now</a></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="blog_img"><img src="images/blog-img2.png"></div>
                                    <h6 class="number_text">03</h6>
                                    <div class="callnow_btn">
                                        <div class="chat_bt"><a href="#">Chat Now</a></div>
                                        <div class="call_bt active"><a href="#">Call Now</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="blog_img"><img src="images/blog-img.png"></div>
                                    <h6 class="number_text">01</h6>
                                    <div class="callnow_btn">
                                        <div class="chat_bt"><a href="#">Chat Now</a></div>
                                        <div class="call_bt active"><a href="#">Call Now</a></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="blog_img"><img src="images/blog-img1.png"></div>
                                    <h6 class="number_text">02</h6>
                                    <div class="callnow_btn">
                                        <div class="chat_bt"><a href="#">Chat Now</a></div>
                                        <div class="call_bt active"><a href="#">Call Now</a></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="blog_img"><img src="images/blog-img2.png"></div>
                                    <h6 class="number_text">03</h6>
                                    <div class="callnow_btn">
                                        <div class="chat_bt"><a href="#">Chat Now</a></div>
                                        <div class="call_bt active"><a href="#">Call Now</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="blog_img"><img src="images/blog-img.png"></div>
                                    <h6 class="number_text">01</h6>
                                    <div class="callnow_btn">
                                        <div class="chat_bt"><a href="#">Chat Now</a></div>
                                        <div class="call_bt active"><a href="#">Call Now</a></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="blog_img"><img src="images/blog-img1.png"></div>
                                    <h6 class="number_text">02</h6>
                                    <div class="callnow_btn">
                                        <div class="chat_bt"><a href="#">Chat Now</a></div>
                                        <div class="call_bt active"><a href="#">Call Now</a></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="blog_img"><img src="images/blog-img2.png"></div>
                                    <h6 class="number_text">03</h6>
                                    <div class="callnow_btn">
                                        <div class="chat_bt"><a href="#">Chat Now</a></div>
                                        <div class="call_bt active"><a href="#">Call Now</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- shop section end -->
    <!-- Contact and Footer Section -->
    <div class="contact_footer_section layout_padding">
        <div class="container">
            <!-- Contact Us Section -->
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="contact_taital contact_heading">Contact Us</h1>
                </div>
            </div>
            <div class="contact_section_2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mail_section map_form_container">
                            <form id="contactForm" action="" method="post">
                                <input type="text" class="mail_text" placeholder="Your Name" name="name" required>
                                <input type="email" class="mail_text" placeholder="Email" name="email" required>
                                <textarea class="massage-bt" placeholder="Message" rows="5" name="message" required></textarea>
                                <div class="contact_btn_main">
                                    <div class="send_bt active"><button type="submit" class="btn">Send</button></div>
                                    <div class="map_bt"><button type="button" id="showMap" class="btn">Map</button></div>
                                </div>
                            </form>

                            <div class="map_main map_container" id="mapContainer" style="display:none;">
                                <div class="map-responsive">
                                    <iframe
                                        src="https://www.google.com/maps/embed/v1/place?key=YOUR_API_KEY&q=Yogyakarta+Indonesia"
                                        width="100%"
                                        height="368"
                                        frameborder="0"
                                        style="border:0;"
                                        allowfullscreen="">
                                    </iframe>
                                    <div class="btn_main text-center mt-3">
                                        <button type="button" id="showForm" class="btn btn-primary">Back to Form</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Section -->
            <div class="footer_section_2 mt-5">
                <div class="row">
                    <!-- Useful Links -->
                    <div class="col-lg-3 col-sm-6">
                        <h2 class="useful_text">Useful Links</h2>
                        <div class="footer_menu">
                            <ul class="list-unstyled">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="services.php">Services</a></li>
                                <li><a href="sell.php">Sell</a></li>
                                <li><a href="products.php">Products</a></li>
                                <li><a href="contact.php">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Portfolio -->
                    <div class="col-lg-3 col-sm-6">
                        <h2 class="useful_text">Portfolio</h2>
                        <div class="footer_menu">
                            <ul class="list-unstyled">
                                <li><a href="#">Liodeno</a></li>
                                <li><a href="jokri.php">Jokri</a></li>
                                <li><a href="begana.php">Begana</a></li>
                                <li><a href="sell.php">Sell</a></li>
                                <li><a href="products.php">Products</a></li>
                                <li><a href="contact.php">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="col-lg-3 col-sm-6">
                        <h2 class="useful_text">Contact Info</h2>
                        <div class="location_text mb-2">
                            <i class="fas fa-phone mr-2"></i>
                            <a href="tel:+011234567">+01 1234567</a>
                        </div>
                        <div class="location_text">
                            <i class="fas fa-envelope mr-2"></i>
                            <a href="mailto:demo@gmail.com">demo@gmail.com</a>
                        </div>
                    </div>

                    <!-- Social Links -->
                    <div class="col-lg-3 col-sm-6">
                        <h2 class="useful_text">Social Links</h2>
                        <p class="footer_text">Stay connected with us on social media</p>
                        <div class="social_icon">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Copyright Section -->
            <div class="copyright_section mt-4">
                <p class="copyright_text text-center">
                    <?php echo date('Y'); ?> All Rights Reserved.
                    Design by <a href="https://html.design">Free Html Templates</a>
                    Distribution by <a href="https://themewagon.com">ThemeWagon</a>
                </p>
            </div>
        </div>
    </div>
    <style>
        /* Fonts and Colors */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            color: #212121;
        }

        .footer_section {
            background-color: #28454e;
            padding: 50px 0;
        }

        .footer_logo img {
            max-height: 70px;
            margin-bottom: 30px;
        }

        .useful_text {
            color: #000;
            font-size: 22px;
            text-transform: uppercase;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .useful_text::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 2px;
            background-color: #000;
        }

        .footer_menu ul {
            padding: 0;
            list-style: none;
        }

        .footer_menu ul li {
            margin-bottom: 10px;
        }

        .footer_menu ul li a {
            color: #000;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer_menu ul li a:hover {
            color: #007bff;
        }

        .location_text {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .location_text img {
            width: 20px;
            margin-right: 15px;
        }

        .location_text a {
            color: #000;
            text-decoration: none;
        }

        .social_icon ul {
            padding: 0;
            list-style: none;
            display: flex;
        }

        .social_icon ul li {
            margin-right: 15px;
        }

        .social_icon ul li a {
            color: #000;
            font-size: 20px;
            transition: color 0.3s ease;
        }

        .social_icon ul li a:hover {
            color: #007bff;
        }

        .footer_text {
            color: #666;
            margin-bottom: 15px;
        }

        .input_main {
            margin-top: 30px;
            display: flex;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .email_text {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 0;
        }

        .subscribe_bt {
            background-color: #000;
        }

        .subscribe_bt a {
            color: #fff;
            padding: 10px 20px;
            display: inline-block;
            text-decoration: none;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Contact Form Submission
            const contactForm = document.getElementById('contactForm');
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                // Implement actual form submission logic
                alert('Form submitted! Implement server-side processing.');
            });

            // Newsletter Subscription
            const newsletterForm = document.getElementById('newsletterForm');
            newsletterForm.addEventListener('submit', function(e) {
                e.preventDefault();
                // Implement actual newsletter subscription logic
                alert('Subscribed! Implement server-side processing.');
            });

            // Map and Form Toggle
            const showMapBtn = document.getElementById('showMap');
            const showFormBtn = document.getElementById('showForm');
            const contactFormEl = document.querySelector('.mail_section form');
            const mapContainer = document.getElementById('mapContainer');

            showMapBtn.addEventListener('click', function() {
                contactFormEl.style.display = 'none';
                mapContainer.style.display = 'block';
            });

            showFormBtn.addEventListener('click', function() {
                mapContainer.style.display = 'none';
                contactFormEl.style.display = 'block';
            });
        });
    </script>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <?php
    include "layout/scriptBody.html"
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const playIcon = document.querySelector('.play_icon');

            playIcon.addEventListener('click', function() {
                // Find the next section after the banner section
                const bannerSection = document.querySelector('.banner_section');
                const nextSection = bannerSection.nextElementSibling;

                if (nextSection) {
                    // Smooth scroll to the next section
                    nextSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
    <script>
        function openOverlay(element, title, count) {
            const overlay = document.querySelector('.services_box_overlay');
            const titleEl = document.getElementById('overlay-title');
            const countEl = document.getElementById('overlay-count');
            const imageEl = document.getElementById('overlay-image');

            titleEl.textContent = title;
            countEl.textContent = count;
            imageEl.src = element.querySelector('img').src;

            overlay.classList.add('active');
        }

        function closeOverlay() {
            const overlay = document.querySelector('.services_box_overlay');
            overlay.classList.remove('active');
        }
    </script>
</body>

</html>