<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation Homepage</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
 
</head>
<body>
    <header>
        <nav class="navbar">
            <ul class="nav-list">
                <li><a href="userpage.php">Home </a></li>
                <li><a href="html/donor.php">Donote now</a></li>
                <li><a href="html/about.html">About Us</a></li>
                <li><a href="html/contact.html">contact Us</a></li>
                <li><a href="./php/homepage.php">Logout</a></li>
                <li><a href=".html">User</a></li>
               
            </ul>
    </header>

    <main>
        <div class="bgimg"></div>
            <section class="hero">
                    <h1>Welcome to Blood Donation</h1>
                    <p>Save lives by donating blood</p>
                    <a href="php/patient/formp.php" class="btn"><p class="animate__heartBeat">Request Now</p></a>
      
  
        

        <select id="bloodTypeSelect" class="animate__heartBeat">
        <option value="A-">A-</option>
        <option value="A+">A+</option>
        <option value="B-">B-</option>
        <option value="B+">B+</option>
        <option value="AB-">AB-</option>
        <option value="AB+">AB+</option>
        <option value="O-">O-</option>
        <option value="O+">O+</option>
    </select>

    <div id="bloodTypeContent" style="display: none;">
        <!-- Data for each blood type will be displayed here -->
    </div>

    

    <button id="viewDataButton">Search</button>

    <script>
    var selectedValue = "none"; // Default value

    document.getElementById("bloodTypeSelect").addEventListener("change", function() {
        selectedValue = this.value;
    });

    document.getElementById("viewDataButton").addEventListener("click", function() {
        if (selectedValue !== "none") {
            window.location.href = "donors.php?bloodType=" + selectedValue;
        }
    });
    </script>
</a>


            
                    
            </div>
        </section>

        <!-- Other sections/content of your homepage can be added here -->
    </main>

    <footer>
        <!-- ... your existing footer content ... -->
    </footer>

    <script src="script.js"></script></boody>

                    
            </section>
            
    
            <!-- Other sections/content of your homepage can be added here -->
        
            <footer>
"               <div class="container">
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
              
    
        <script src="script.js"></script>
    </body>
    
    </html>


 
    <?php
    if (isset($_GET['bloodType'])) {
        $selectedBloodType = $_GET['bloodType'];

        // Create a database connection
        $conn = new mysqli("localhost", "root", "", "Project");

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch data based on selected blood type
        $sql = "SELECT * FROM your_table_name WHERE Blood = '$selectedBloodType'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>Name: " . $row['First_Name'] . " " . $row['Middle_Name'] . " " . $row['Last_Name'] . "</p>";
                echo "<p>Phone: " . $row['Phone'] . "</p>";
                echo "<p>Address: " . $row['Address'] . "</p>";
                echo "<p>Email: " . $row['Email'] . "</p>";
                echo "<p>Date of Birth: " . $row['Dob'] . "</p>";
                echo "<p>Gender: " . $row['Gender'] . "</p>";
                // Add more fields as needed
            }
        } else {
            echo "No data available for the selected blood type.";
        }

        $conn->close();
    } else {
        echo "Blood type not specified.";
    }
    ?>



    
