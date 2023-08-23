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
        *{
    margin:0;
    padding:0;
    box-sizing: border-box;
    list-style-type:none;
    text-decoration: none;

}
h1,h2,h3,h4,h5,h6{
    font-family: 'Roboto', sans-serif;

}
p,a{
    font-family: 'Roboto', sans-serif;
}
img_responsive{
    display:block;
    max-width :0 auto;
    height:auto;
   

}

.container{
    max-width:1330px;
    margin:0 auto;
    padding-left:15px ;
    padding-right:15px ;

}

.clear{
    clear:both;


}
   

/*sidebar*/
section#sidebar {
    width: 20%;
    background-color: #e11818;
    color: #fff;
    top: 0;
    left: 0;
    position: fixed;
    height: 100%;
   
}
/*main-content*/
section#main-content {
    width: 80%;
    float: right;
    
}

.sidebar.brand {
    padding: 40px 40px;
}

.sidebar-menu ul li a {
    display: block;
    padding: 10px 40px;
    color: #fff;
}

.sidebar-menu {
    margin-top: 30px;
}

header.main-header {
    
   
    position: fixed;
    background-color: #fff;
    width: 100%;
    box-shadow: 10px 10px 20px #bbb;
}

.sidebar-menu li:hover {
    background-color:rgba(0,0,0,0,5) ;
}

.sidebar-menu li {
   transition: all 0.5s ease;
}

.header-left {
    float: left;
    width: 33%;
    padding: 20px;
}

input.Search.bar {
    width: 50%;
    border-radius: 20px;
    padding: 8px 12px;
    border: 2px solid #bbb;

}
input.Search.bar:focus {
    outline: none;
    border: 2px solid #fd5a5e;
    width: 95%;
}


.card-box {
    background-color:rgb(114, 182, 114);
    
    margin-left: 2%;
    margin-right: 2%;
    float: left;
    width: 21%;
    margin-top: 120px;
    padding: 25px;
}
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
           <li><a href="../logout.php"><i class="fa fa-users"></i><span>Log out</span></a></li>
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
        // Your PHP code here...
// Your database connection and query to get donors with the selected blood type
// For this example, assume you have a MySQL database with a "form" table


// Create a database connection
$conn = new mysqli("localhost", "root", "", "project");

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Sample query to fetch donors for each blood group
$query = "SELECT * FROM form";
$result = mysqli_query($conn, $query);

// Fetch donors from the result
$donors = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Calculate the total number of donors for each blood group
$bloodGroups = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
$donorCounts = array_fill_keys($bloodGroups, 0);

foreach ($donors as $donor) {
    $bloodType = $donor['Blood'];
    if (in_array($bloodType, $bloodGroups)) {
        $donorCounts[$bloodType]++;
    }
}

// Close the database connection
mysqli_close($conn);

// Return the donor counts as JSON
echo json_encode($donorCounts);
?>

        // ... (the PHP code you provided earlier)
      <!-- Blood Group A+ -->
        <div class="card-box">
            <h2>A+</h2>
            <p><?php echo $donorCounts['A+']; ?> Donors Available</p>
        </div>

        <!-- Blood Group A- -->
        <div class="card-box">
            <h2>A-</h2>
            <p><?php echo $donorCounts['A-']; ?> Donors Available</p>
        </div>

        <!-- Blood Group B+ -->
        <div class="card-box">
            <h2>B+</h2>
            <p><?php echo $donorCounts['B+']; ?> Donors Available</p>
        </div>

        <!-- Blood Group B- -->
        <div class="card-box">
            <h2>B-</h2>
            <p><?php echo $donorCounts['B-']; ?> Donors Available</p>
        </div>

        <!-- Blood Group AB+ -->
        <div class="card-box">
            <h2>AB+</h2>
            <p><?php echo $donorCounts['AB+']; ?> Donors Available</p>
        </div>

        <!-- Blood Group AB- -->
        <div class="card-box">
            <h2>AB-</h2>
            <p><?php echo $donorCounts['AB-']; ?> Donors Available</p>
        </div>

        <!-- Blood Group O- -->
        <div class="card-box">
            <h2>O-</h2>
            <p><?php echo $donorCounts['O-']; ?> Donors Available</p>
        </div>

        <!-- Blood Group O+ -->
        <div class="card-box">
            <h2>O+</h2>
            <p><?php echo $donorCounts['O+']; ?> Donors Available</p>
        </div>
    </div>
</section>
</body>
</html>
