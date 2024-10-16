<?php
// Get form data
$email = $_POST['email'];
$studentname = $_POST['studentname'];
$mobileno = $_POST['mobileno'];
$class = $_POST['class'];
$branch = $_POST['branch'];
$address = $_POST['address'];
$event = $_POST['event'];

// Database connection
$severname = "localhost";
$username = "root";
$password = "";
$database = "registration";

$con = mysqli_connect($severname, $username, $password, $database);

if (!$con) {
    die("Error detected: " . mysqli_error($con));
} else {
  
    // Prepare SQL statement
    $stmt = mysqli_prepare($con, "INSERT INTO college_form (email, studentname, mobileno, class, branch, address, event) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sssssss", $email, $studentname, $mobileno, $class, $branch, $address, $event);

        // Execute statement
        if (mysqli_stmt_execute($stmt)) {
            echo "<h1>College form submission successful!</h1>";
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }
    } else {
        echo "Error preparing statement: " . mysqli_error($con);
    }

    // Close connections
    // mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>