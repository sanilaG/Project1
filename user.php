<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation Homepage</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
        }

        .navbar {
            display: flex;
            position: sticky;
            top: 0;
            z-index: 1;
            background-color: maroon;
            padding: 0;
            margin: 0;
        }

        .nav-list {
            display: flex;
            width: 80%;
            justify-content: space-around;
            align-items: center;
            margin: 0;
            height: 60px;
        }

        .nav-list li {
            list-style: none;
        }

        .nav-list li a {
            text-decoration: none;
            color: white;
            font-weight: 600;
        }

        .rightnav {
            width: 20%;
            text-align: center;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .bgimg {
            background-image: url('../jpg/hm.jpg');
            background-size: cover;
            background-position: center;
            min-height: 100vh; /* Full viewport height */
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
        }

        .bgimg::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.65);
        }

        .hero {
            font-size: 40px;
            margin-bottom: 10px;
            height: 200px;
            color: #fff;
            position: absolute;
            text-align: center;
            top: 40%;
            left: 50%;
            transform: translateX(-50%);
            animation: animate 1.5s steps(10) infinite;
        }

        .btn {
            display: inline-block;
            padding: 10px 30px;
            background-color: maroon;
            color: white;
            font-size: 20px;
            font-weight: bold;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            outline: none;
            transition: background-color 0.3s ease;
            text-align: center;
        }

        .btn:hover {
            background-color: #9c1919;
        }

        footer {
            background-color: black;
            padding: 40px 0;
            color: white;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .footer-section {
            flex-basis: 30%;
            margin-bottom: 20px;
        }

        .footer-section h4 {
            font-size: 20px;
            color: white;
            margin-bottom: 10px;
        }

        .footer-section p {
            font-size: 14px;
            color: white;
            margin-bottom: 10px;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin-bottom: 10px;
        }

        .footer-section ul li a {
            text-decoration: none;
            color: white;
            font-size: 14px;
        }

        .footer-section ul li a:hover {
            color: #000;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }

        .footer-bottom p {
            font-size: 12px;
            color: white;
            background-color: #000;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar">
            <ul class="nav-list">
                <li><a href="homepage.php">Home</a></li>
                <li><a href="../html/donor.php">Donate Now</a></li>
                <li><a href="../html/about.html">About Us</a></li>
                <li><a href="../html/contact.html">Contact Us</a></li>
                <li><a href="php/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="bgimg">
            <section class="hero">
                <h1>Welcome to Blood Donation</h1>
                <p>Save lives by donating blood</p>
                <a href="patient/formp.php" class="btn animate__heartBeat">Request Now</a>
            </section>
        </div>
        
        <!-- ... Rest of your content ... -->

        <footer>
            <div class="container">
                <div class="footer-content">
                    <div class="footer-section about">
                        <h4>About Us</h4>
                        <p>The blood donation system is dedicated to connecting blood donors with those in need. We strive to save lives and improve the health of individuals by facilitating the process of blood donation. Join us in this noble cause and make a difference.</p>
                    </div>
                    <div class="footer-section contact">
                        <h4>Contact Us</h4>
                        <p><i class="fa fa-map-marker"></i> 123 Main Street, City, Country</p>
                        <p><i class="fa fa-envelope"></i> info@blooddonationsystem.com</p>
                        <p><i class="fa fa-phone"></i> +1 123 456 7890</p>
                    </div>
                    <div class="footer-section links">
                        <h4>Quick Links</h4>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Donate Blood</a></li>
                            <li><a href="#">Find Donors</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-bottom">
                    <p>&copy; 2023 Blood Donation System. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </main>

    <script src="script.js"></script>
</body>

</html>

