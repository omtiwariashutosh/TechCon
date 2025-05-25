<?php
// DB config
$host = "localhost";       // or 127.0.0.1
$user = "root";            // default XAMPP/WAMP username
$password = "";            // default XAMPP/WAMP password
$dbname = "techcon";       // make sure this matches your DB name

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get & sanitize form data
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$organization = trim($_POST['organization']);
$designation = trim($_POST['designation']);
$location = trim($_POST['location']);
$interest = trim($_POST['interest']);
$message = trim($_POST['message']);

// Prepare SQL insert
$stmt = $conn->prepare("INSERT INTO registrations (name, email, phone, organization, designation, location, interest, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $name, $email, $phone, $organization, $designation, $location, $interest, $message);

// Execute and respond
if ($stmt->execute()) {
    echo "<script>
        alert('Registration successful!');
        window.location.href = 'index.html'; // redirect back to homepage
    </script>";
} else {
    echo "<script>
        alert('Something went wrong. Please try again.');
        window.history.back();
    </script>";
}

$stmt->close();
$conn->close();
?>
