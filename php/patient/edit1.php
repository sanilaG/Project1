<?php
$errors = array();
$patient = array();

// Check if the patient ID is provided through the URL parameter
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Perform database query to fetch patient information using the provided ID
    $connection = mysqli_connect('localhost', 'root', '', 'project');

    // Check if the connection was successful
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $select_query = "SELECT * FROM patient WHERE id = ?";
    $stmt_select = $connection->prepare($select_query);
    $stmt_select->bind_param('i', $id);
    $stmt_select->execute();
    $result = $stmt_select->get_result();
    $patient = $result->fetch_assoc();

    // Close the database connection
    $stmt_select->close();
    mysqli_close($connection);

    if (!$patient) {
        die("Patient not found with the given ID.");
    }

    // Check if the form is submitted for updating patient information
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Validation and data processing logic

        // Validate Phone Number
        $phone = $_POST['Phone'];
        if (!preg_match('/^\+977-98\d{8}$/', $phone)) {
            $errors['Phone'] = "Invalid phone number. Phone number should start with '+977-98' and have 10 digits.";
        }

        // Validate First Name, Middle Name, and Last Name
        $firstName = $_POST['First_Name'];
        $middleName = $_POST['Middle_Name'];
        $lastName = $_POST['Last_Name'];
        if (!preg_match('/^[a-zA-Z]+$/', $firstName)) {
            $errors['First_Name'] = "First name should only contain letters.";
        }
        if (!preg_match('/^[a-zA-Z]*$/', $middleName)) {
            $errors['Middle_Name'] = "Middle name should only contain letters.";
        }
        if (!preg_match('/^[a-zA-Z]+$/', $lastName)) {
            $errors['Last_Name'] = "Last name should only contain letters.";
        }

        if (empty($errors)) {
            // Update data in the database
            $connection = mysqli_connect('localhost', 'root', '', 'project');

            // Check if the connection was successful
            if (!$connection) {
                die("Database connection failed: " . mysqli_connect_error());
            }

            $update_query = "UPDATE patient SET Blood = ?, First_Name = ?, Middle_Name = ?, Last_Name = ?, Phone = ?, Address = ?, Gender = ? WHERE id = ?";
            $stmt_update = $connection->prepare($update_query);
            $stmt_update->bind_param('sssssssi', $_POST['Blood'], $_POST['First_Name'], $_POST['Middle_Name'], $_POST['Last_Name'], $_POST['Phone'], $_POST['Address'], $_POST['Gender'], $id);

            if ($stmt_update->execute()) {
                echo "Patient information updated successfully!";
                // Optionally, you can redirect the user to a confirmation page or back to the edit form after updating.
                // header("Location: confirmation_page.php");
                // exit();
            } else {
                echo "Error updating patient information: " . $stmt_update->error;
            }

            // Close the database connection
            $stmt_update->close();
            mysqli_close($connection);
        }
    }
} else {
    die("Missing patient ID parameter.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Patient Form</title>
    <link rel="stylesheet" href="../../css/doner.css">
</head>
<body>
<div class="center">
    <form action="insert.php?id=<?php echo $id; ?>" method="POST" class="form">
        <div class="question">
            <span class="question-label">What is the patient's blood type?</span><br>
            <label><input type="radio" value="O" name="Blood" <?php echo $patient['Blood'] === 'O' ? 'checked' : ''; ?>>O</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <!-- Add other blood type options here -->
        </div>

        <div class="question">
            <label for="first-name">First Name:</label>
            <input type="text" class="name" name="First_Name" placeholder="Enter your first name" value="<?php echo $patient['First_Name']; ?>" required><br>
            <!-- Add input fields for Middle_Name, Last_Name, Phone, Address, and Gender -->
        </div>

        <!-- Display validation errors here -->

        <input type="submit" value="Update" id="submit">
    </form>
</div>
</body>
</html>
