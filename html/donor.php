<!DOCTYPE html>
<html>
<head>
  <title>Donor Form</title>
  <link rel="stylesheet" href="../css/doner.css">
  
</head>
<body>
  <div class="center">
    <form action="../php/donor/form.php" method="Post" class="form">
      <h>Blood Donation Form</h>
      <p>Please answer the following questions correctly. This will help to protect you and the patient who receives your blood.</p>
      <div class="line"></div>
      <div class="question">
        <span class="question-label" required>What is your blood type?</span><br>
        <label><input type="radio" value="O+" name="Blood" >O</label>&nbsp;&nbsp;&nbsp;&nbsp;
        <label><input type="radio" value="O-" name="Blood">O-</label><br>
        <label><input type="radio" value="A+" name="Blood">A+</label>&nbsp;&nbsp;
        <label><input type="radio" value="A-" name="Blood">A-</label><br>
        <label><input type="radio" value="B+" name="Blood">B+</label>&nbsp;&nbsp;
        <label><input type="radio" value="B-" name="Blood">B-</label><br>
        <label><input type="radio" value="AB+" name="Blood">AB+</label><label>
          <input type="radio" value="AB-" name="Blood">AB-</label>
      </div>

      <div class="question">
        <div id="name">
        <label for="first-name">First Name:</label>
        <input type="text" class="name" name="First_Name" placeholder="Enter your first name" required><br>
        <label for="middle-name" >Middle Name:</label>
        <input type="text" class="name" name="Middle_Name" placeholder="Enter your middle name"><br>
        <label for="last-name">Last Name:</label>
        <input type="text" class="name" name="Last_Name" placeholder="Enter your last name" required><br>
      </div>
      <div class="question">
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="Phone" placeholder="Enter your phone number" required>
        <?php if (isset($errors['Phone'])): ?>
    <span class="error"><?php echo $errors['Phone']; ?></span>
  <?php endif; ?>
  <?php
  if (isset($_POST['Phone'])) {
    $phone = $_POST['Phone'];
    if (!preg_match('/^\+977-98\d{8}$/', $phone)) {
      $errors['Phone'] = "Invalid phone number. Phone number should start with '+977-98' and have 10 digits.";
    }
  }
  if (isset($errors['Phone'])) {
    echo '<span class="error">' . $errors['Phone'] . '</span>';
  }
  ?>
  
        </div>
        <div class="question">
          
          <label for="phone">Current Address</label>:</label>
          <input type="text" id="address"  placeholder="Enter your current address" name="Address" required>
          </div>
        <div class="question">
        <label for="email">Email:</label>
        <input type="email" id="email" name="Email" placeholder="Enter your email address" required>
        <?php if (isset($errors['Email'])): ?>
        <span class="error"><?php echo $errors['Email']; ?></span>
      <?php endif; ?>
      
      </div>


      <div class="question">
        <label for="dob">Birth Date:</label>
        <input type="date" id="dob" name="Dob" required>
        <?php if (isset($errors['Age'])): ?>
    <span class="error"><?php echo $errors['Age']; ?></span>
  <?php endif; ?>
        </div>
        
      <div class="question">
        <label for="gender">Gender:</label>
        <label><input type="radio" name="Gender" value="male" required>Male</label>
        <label><input type="radio" name="Gender" value="female">Female</label>
        <label><input type="radio" name="Gender" value="other">Other</label>
      </div>

     

      <input type="submit" value="Submit" id="submit">
    </form>
  </div>
</body>
</html>