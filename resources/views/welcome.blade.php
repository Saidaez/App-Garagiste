<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garagiste</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        header {
            background-color: #333;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        
        }

        header .logo img {
            height: 50px;
            margin-right: 500px;
            margin-left: 3px;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 15px;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .brand-name {
            font-size: 1.5em;
            color: white;
        }

        .auth-links {
            display: flex;
            gap: 10px;
        }

        .auth-links a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border: 1px solid white;
            border-radius: 5px;
         
        }

        .auth-links a:hover {
            background-color: white;
            color: #333;
        }

        /* Main Content Styles */
        main {
            padding: 20px;
            background-color: #f4f4f4;
            min-height: calc(100vh - 160px);
        }

        section {
            margin-bottom: 20px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -1px 10px rgba(0, 0, 0, 0.1);
        }

        footer .footer-content {
            padding: 10px;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <div class="logo ml-20">
            <img src="{{ asset('logo.jpg')}}" alt="Logo" style="width: 100px; margin-top:5px; height: auto;">
            </div>

            <div class="auth-links">
                <a href="#home" >Home</a>
                <a href="#services">Services</a>
                <a href="#contact">Contact</a>
                <a href="#about">About</a>
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            </div>

        </div>
    </header>

    <main>
        <section id="home">
            <h2>Welcome to Garagiste</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non urna nec tortor feugiat faucibus.</p>
        </section>
        <section id="about">
            <h2>About Us</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non urna nec tortor feugiat faucibus.</p>
        </section>
        <section id="services">
            <h2>Our Services</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non urna nec tortor feugiat faucibus.</p>
        </section>
        <section id="contact">
            <h2>Contact Us</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non urna nec tortor feugiat faucibus.</p>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <p>&copy; 2024 Garagiste. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>