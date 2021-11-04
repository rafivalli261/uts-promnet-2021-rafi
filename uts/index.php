<?php 
	require "functions.php";
	$data = query("SELECT * FROM menu");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Initial CSS -->
    <link rel="stylesheet" href="css/style.css" />

    <title>Rafi Valli</title>
    <!-- Rencana File
    Nav
    Header contain slideshow
    Content consist of 
    1. Hero Section
    2. Dishes
    3. Order form
    Footer
    -->
</head>

<body>
    <header class="header">
        <nav class="navbar">
            <a href="#" class="nav-logo">RafiValli</a>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#home" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#hero" class="nav-link">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="#dishes" class="nav-link">Dishes</a>
                </li>
                <li class="nav-item">
                    <a href="#order" class="nav-link">Order</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>
    <section id="home">
        <div class="container-satu">
            <div class="slider">
                <div class="slides">
                    <!-- radio button start -->
                    <input type="radio" name="radio-btn" id="radio1" />
                    <input type="radio" name="radio-btn" id="radio2" />
                    <input type="radio" name="radio-btn" id="radio3" />
                    <input type="radio" name="radio-btn" id="radio4" />
                    <!-- radio button end -->
                    <!-- slide image start -->
                    <div class="slide first">
                        <img src="image/album1.png" alt="" />
                    </div>
                    <div class="slide">
                        <img src="image/album2.png" alt="" />
                    </div>
                    <div class="slide">
                        <img src="image/album3.png" alt="" />
                    </div>
                    <div class="slide">
                        <img src="image/album4.png" alt="" />
                    </div>
                    <!-- slide image end -->
                    <!-- automatic navigation start -->
                    <div class="navigation-auto">
                        <div class="auto-btn1"></div>
                        <div class="auto-btn2"></div>
                        <div class="auto-btn3"></div>
                        <div class="auto-btn4"></div>
                    </div>

                    <!-- automatic navigation end -->
                    <!-- manual navigation start -->

                    <div class="navigation-manual">
                        <label for="radio1" class="manual-btn"></label>
                        <label for="radio2" class="manual-btn"></label>
                        <label for="radio3" class="manual-btn"></label>
                        <label for="radio4" class="manual-btn"></label>
                    </div>
                    <!-- manual navigation end -->
                </div>
            </div>
        </div>
    </section>
    <!-- Slideshow End -->

    <!-- Hero Start -->
    <section id="hero">
        <div class="container-dua">
            <div class="row-1">
                <p>Restoran Kuliner Nusantara</p>
            </div>
            <div class="row-2">
                <img src="image/profil.png" alt="" />
                <p>
                    Restoran kecil yang menyediakan masakan daerah di Indonesia. Makanan Nusantara tak kalah jauh dengan
                    produk impor luar negeri, seringlah mengunjungi restoran kami untuk mengetahui rahasia kuliner
                    negeri yang belum
                    sepenuhnya digali ~ <i>Rafi Valli</i>.
                </p>
            </div>
        </div>
    </section>

    <!-- Hero End -->

    <!-- Dishes Section Start -->
    <section id="dishes">
        <div class="container-tiga">
            <div class="row-1">
                <p>Dishes</p>
            </div>
            <div class="row-2">
                <?php foreach ($data as $key) : ?>
                <div class="card">
                    <div class="card-image">
                        <img src="image/<?php echo $key["foto"] ; ?>" alt="" />
                    </div>
                    <h2><?= $key["nama"]; ?></h2>
                    <p>Rp<?= $key["harga"]; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Dishes Section ENd -->
    <!-- Order Start -->
    <section id="order">
        <div class="container-empat">
            <div class="row-1">
                <p>Pesan Sekarang</p>
            </div>
            <div class="row-2">
                <div class="col-1">
                    <p>Whatsapp</p>
                </div>
                <div class="col-2">
                    <p>Instagram</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Order End -->
    <!-- Footer Start -->
    <footer>
        <p>Created with Love by Rafi Valli</p>
    </footer>
    <!-- Footer End -->
    <!-- Script JS  -->
    <script src="script.js"></script>
</body>

</html>