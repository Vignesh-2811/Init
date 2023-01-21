<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <!-- CUSTOM STYLESHEET -->
    <link rel="stylesheet" href="./styles.css">
    <!-- ICONSCOUT CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Rubik:wght@400;500;700&family=Urbanist:wght@100&display=swap" rel="stylesheet">
</head>

<body>
    <nav>
        <div class="container nav__container">
            <a href="index.html" class="nav__logo">INIT</a>
            <ul class="nav__items">
                <li><a href="blog.html">Blog</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="signin.html">Signin</a></li>
                <li class="nav__profile">
                    <div class="avatar">
                        <img src="./assets/images/avatar1.jpg" alt="avatar">
                    </div>

                    <ul>
                        <li><a href="dashboard.html">Dashboard</a></li>
                        <li><a href="logout.html">Logout</a></li>
                    </ul>
                </li>

            </ul>
            <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>

   <section class="search__bar">
    <form action="" class="container search__bar-container">
        <div>
            <i class="uil uil-search"></i>
            <input type="search" name="" placeholder="Search">
        </div>
        <button type="submit" class="btn">Go</button>
    </form>
   </section>

    <section class="posts">
        <div class="container posts__container">
            <article class="post">
                <div class="post__thumbnail">
                    <img src="./assets/images/blog2.jpg" alt="">
                </div>
                <div class="post__info">
                    <a href="" class="category__button">Wild Life</a>
                    <h3 class="post__title"><a href="post.html">qw6turfduuys unashfadfsd fa dfsdgfa df</a></h3>
                    <p class="post__body">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam, dolore. Atque unde eaque beatae quam obcaecati temporibus fugit similique. Minus voluptatibus debitis expedita cum ea dignissimos saepe magnam, harum accusantium.</p>
                    <div class="post__author">
                        <div class="post__author-avatar">
                            <img src="./assets/images/avatar3.jpg" alt="">
                        </div>
                        <div class="post__author-info">
                            <h5>By: Kohli</h5>
                            <small>June 13, 2002 - 10:12</small>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <section class="category__buttons">
        <div class="container category__buttons-container">
            <a href="" class="catrgory__button">Category</a>
            <a href="" class="catrgory__button">Category</a>
            <a href="" class="catrgory__button">Category</a>
            <a href="" class="catrgory__button">Category</a>
            <a href="" class="catrgory__button">Category</a>
            <a href="" class="catrgory__button">Category</a>
        </div>
    </section>

    <script src="main.js"></script>
</body>

</html>