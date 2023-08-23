<!DOCTYPE HTML>
<html>
<head>
    <title>Admin Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        /* Your CSS styles here */
        /* ... */
    </style>
</head>
<body>
<section id="sidebar">
    <div class="sidebar brand">
       <h2><i class="fa fa-desktop"></i><span>BDMS</span></h2>
    </div>
    <div class="sidebar-menu"> 
       <ul>
           <li><a href="dashboard.php"><i class="fa fa-desktop"></i><span>Dashboard</span></a></li>
           <li><a href="stock.php"><i class="fa fa-users"></i><span>Stock</span></a></li>
           <li><a href="select.php"><i class="fa fa-file"></i><span>Donor list</span></a></li>
           <li><a href="requestblood/request_blood.php"><i class="fa fa-users"></i><span>Request</span></a></li>
           <li><a href="../patient/display.php"><i class="fa fa-users"></i><span>Patient</span></a></li>
           <li><a href="../homepage.php"><i class="fa fa-users"></i><span>Log out</span></a></li>
        </ul>
    </div>
</section>

<section id="main-content">
    <header class="main-header">
        <div class="header-left">
            <h2><i class="fa-solid fa-bars"></i>Dashboard</h2>
        </div>

        <div class="header-left">
            <input class="search-bar" type="text" placeholder="Search here...">
            <i class="fa fa-search"></i>
        </div>

        <div class="header-left">
            <h2>BDMS</h2>
            <p>Admin</p>
        </div>
        <div class="clear"></div>
    </header>
    <div class="clear"></div>

    <div class="main-content-info container">
        <?php
        // Create a database connection
        $conn = new mysqli("localhost", "root", "", "project");

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to get total donors
        $queryTotalDonors = "SELECT COUNT(*) AS total_donors FROM form";
        $resultTotalDonors = mysqli_query($conn, $queryTotalDonors);
        $rowTotalDonors = mysqli_fetch_assoc($resultTotalDonors);
        $totalDonors = $rowTotalDonors['total_donors'];

        // Query to get total patients
        $queryTotalPatients = "SELECT COUNT(*) AS total_patients FROM patient";
        $resultTotalPatients = mysqli_query($conn, $queryTotalPatients);
        $rowTotalPatients = mysqli_fetch_assoc($resultTotalPatients);
        $totalPatients = $rowTotalPatients['total_patients'];

        // Close the database connection
        mysqli_close($conn);
        ?>

        <div class="card-box">
            <h2>Total donors</h2>
            <p><?php echo $totalDonors; ?> donors Available</p>
        </div>

        <div class="card-box">
            <h2>Total patients</h2>
            <p><?php echo $totalPatients; ?> patient Available</p>
        </div>
    </div>
</section>
</body>
</html>
