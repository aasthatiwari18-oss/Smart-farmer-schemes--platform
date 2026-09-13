<?php
// File Name: submit_contact.php

// --- 1. Database Connection Settings ---
$servername = "localhost";
$username = "root";        // XAMPP default user
$password = "";            // XAMPP default password (empty)
$dbname = "scheme_project_db"; // Jo naam humne Step 1 mein diya tha

// Connection banana
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Connection check karna
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// --- 2. Jab User Form Submit Karega ---
if (isset($_POST['send_msg_btn'])) {

    // HTML form se data nikalna (using name attribute)
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // --- 3. Data Database mein Save Karna (Insert Query) ---
    $sql = "INSERT INTO contact_queries (full_name, email, subject, message) 
            VALUES ('$full_name', '$email', '$subject', '$message')";

    if (mysqli_query($conn, $sql)) {
        // Success Message (Alert aur Redirect)
        echo "<script>
                alert('Thank you! Your message has been sent successfully.');
                window.location.href = 'contact.html';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Connection close karna
mysqli_close($conn);
?>