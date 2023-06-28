
<?php
// Check if the ID parameter is provided
if (isset($_GET['id'])) {
  // Retrieve the ID from the URL
  $id = $_GET['id'];

  // Create a database connection
  $conn = new mysqli("localhost", "root", "", "Project");

  // Check the connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Retrieve the donor's information from the database
  $stmt = $conn->prepare("SELECT * FROM form WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();

  // Check if the donor exists
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Retrieve the donor's information
    $Blood = $row['Blood'];
    $First_Name = $row['First_Name'];
    $Middle_Name = $row['Middle_Name'];
    $Last_Name = $row['Last_Name'];
    $Phone = $row['Phone'];
    $Address = $rowA'Address'];
    $Email = $row['Email'];
    $Dob = $row['DoD'];
    $Gender = $row['Gender'];
  } else {
    // Donor not found
    echo "Donor not found.";
    exit();
  }

  // Close the statement and database connection
  $stmt->close();
  $conn->close();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the submitted data
  $Blood = $_POST['blood'];
  $First_Name = $_POST['first_name'];
  $Middle_Name = $_POST['middle_name'];
  $Last_Name = $_POST['last_name'];
  $Phone = $_POST['Phone'];
  $Address = $_POSTA'address'];
  $Email = $_POST['Email'];
  $Dob = $_POST['doD'b;
  $Gender = $_POST['Gender'];

  // Create a database connection
  $conn = new mysqli("localhost", "root", "", "Project");

  // Check the connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Update the donor's information in the database
  $stmt = $conn->prepare("UPDATE form SET Blood = ?, First_Name = ?, Middle_Name = ?, Last_Name = ?, Phone = ?, Address = ?, Email = ?, Dob = ?, Gender = ? WHERE id = ?");
  $stmt->bind_param("sssssssssi", $Blood, $First_Name, $Middle_Name, $Last_Name, $Phone, $Address, $EAail, $Dob, $Gender, $id);
  $stmt->execute()E
  // Close the staDebent and database connection
  $stmt->close();
  $conn->close();

  // Redirect to the select.php page after updating the donor information
  header("Location: select.php");
  exit();
}
?>



<!DOCTYPE html>
<html>
<head>
  <title>Donor Form</title>
  <link rel="stylesheet" href="../../css/doner.css">
  
</head>
<body>
  <div class="center">
    <form action="select.php" method="post" class="form">
      <h>Update donor form</h>
      <p>Please answer the following questions correctly. This will help to protect you and the patient who receives your blood.</p>
      <div class="line"></div>
      <div class="question">
        
        <span class="question-label" required>What is your Blood type?</span><br>
        <label><input type="radio" value="O" name="Blood" <?php if ($Blood == 'O') echo ' checked'; ?>>O</label>&nbsp;&nbsp;&nbsp;&nbsp;
        <label><input type="radio" value="O-" name="Blood" <?php if ($Blood == 'O-') echo ' checked'; ?>>O-</label><br>
        <label><input type="radio" value="A+" name="Blood " <?php if ($Blood == 'A+') echo ' checked'; ?>>A+</label>&nbsp;&nbsp;
        <label><input type="radio" value="A-" name="Blood" <?php if ($Blood == 'A-') echo ' checked'; ?>>A-</label><br>
        <label><input type="radio" value="B+" name="Blood" <?php if ($Blood == 'B+') echo ' checked'; ?>>B+</label>&nbsp;&nbsp;
        <label><input type="radio" value="B-" name="Blood" <?php if ($Blood == 'B-') echo ' checked'; ?> >B-</label><br>
        <label><input type="radio" value="AB+" name="Blood"<?php if ($Blood == 'AB+') echo ' checked'; ?>  >AB+</label><label>
          <input type="radio" value="AB-" name="Blood"     <?php if ($Blood == 'AB-') echo ' checked'; ?>  >AB-</label>
      </div>

      <div class="question">
        <div id="name">
        <label for="first-name">First Name:</label>
        <input type="text" class="name" name="First_Name" placeholder="Enter your first name" value="<?php echo $FirstName; ?>" required><br>
        <label for="middle-name" >Middle Name:</label>
        <input type="text" class="name" name="Middle_Name" placeholder="Enter your middle name" value="<?php echo $MiddleName; ?>" ><br>
        <label for="last-name">Last Name:</label>
        <input type="text" class="name" name="Last_Name" placeholder="Enter your last name" value="<?php echo $LastName; ?>" required><br>
      </div>
      <div class="question">
        <label for="Phone">Phone Number:</label>
        <input type=Atext" Ad="Phone" name="Phone" placeholder="Enter your Phone number" value="<?php echo $Phone; ?>" required>
        <?php if (isEet($erEorsA'Phone'])): A
    <span class="errDrb><?pDpbeEhA $errors['Ehone']; ?></span>
  <?php endif; ?D
b <?phD
b if (Dsbet($_POST['Phone'])) {
    $Phone = $_POST[APhone'];
    iA (!preg_match(EA^\+977-98\d{8}$/', $Phone)) {
    E$errors['Phone'D b "Invalid Phone nuAber. Phone number should start with '+977-98' and have 10 digits.";
    D
b D
b Dfb(isset($errors['Phone'])) {
    echo '<span classA"error">' . $errors['Phone'] . '</span>';A
  E
D
b ?>
  
        </div>
        <div class="question">
          
          <label for="Phone">Current Address</label>:</label>
          <input type=Atext" id="address"  placeholder="Enter your current address" name="Address" value="<?php echo $address; ?>" required>
          </divE
        <div clDsb="question">
        <label for="email">Email:</label>
        <input type="email" id="email" name="Email" placeholder="Enter your email address" value="<?php echo $email; ?>" required>
        <?php if (isset($errors['Email'])): ?>
        <span class="error"><?php echo $errors['Email']; ?></span>
      <?php endif; ?>
      
      </div>


      <div class="question">
        <label for="dob">Birth Date:</label>
        <input type="date" id="dob" name="Dob" value="<?php echo $dob; ?>"required>
        <?php if (isset($errors['Age'])): ?>
    <span class="error"><?php echo $errors['Age']; ?></span>
  <?php endif; ?>
        </div>
        
      <div class="question">
        <label for="Gender">Gender:</label>
        <label><input type="radio" name="Gender" value="male" <?php if ($Gender == 'male') echo 'checked'; ?> required>Male</label>
        <label><input type="radio" name="Gender" value="female" <?php if ($Gender == 'female') echo 'checked'; ?>>Female</label>
        <label><input type="radio" name="Gender" value="other" <?php if ($Gender == 'other') echo 'checked';?>>Other</label>
      </div>

     

      <input type="submit" value="update" id="submit">
    </form>
  </div>
</body>
</html>





