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
    <section class="form__section">
        <div class="container form__section-container">
            <h2>Add User</h2>
            <div class="alert__message success">
                <p>This is an alert message</p>
            </div>
            <form action="" enctype="multipart/form-data">
                <input type="text" placeholder="First Name">
                <input type="text" placeholder="Last Name">
                <input type="text" placeholder="Username">
                <input type="text" placeholder="Email">
                <input type="text" placeholder="Create Password">
                <input type="text" placeholder="Confirm Password">
                <select name="" id="">
                    <option value="0">Author</option>
                    <option value="1">Admin</option>

                </select>
               
                <div class="form__control">
                    <label for="avatar" class="">Add Avatar</label>
                    <input type="file" name="" id="avatar">
                </div>
                <button type="submit" class="btn">Add User</button>
            </form>
        </div>
    </section>
    
</body>
</html>