<?php
// Start session to manage user authentication
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if it's a registration form submission
    if(isset($_POST['registerForm'])) {
        // Registration form is submitted
        // Retrieve form data
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validate form data (you can add more validation as needed)
        if (empty($username) || empty($email) || empty($password)) {
            // Send error response if any field is empty
            echo json_encode(array('success' => false, 'message' => 'All fields are required'));
            exit();
        }

        // Perform registration logic here (e.g., insert data into database)
        // This is a basic example. In a real application, you would use a secure method to store user data.
        // For demonstration purposes, let's assume registration is successful

        // Set session variables to indicate user is logged in
        $_SESSION['username'] = $username;
        // You can add more user data to session if needed (e.g., user ID)

        // Send success response
        echo json_encode(array('success' => true));
    } else {
        // Invalid form submission
        echo json_encode(array('success' => false, 'message' => 'Invalid form submission'));
    }
} else {
    // If the form is not submitted, redirect to register page
    header('Location: register.html');
    exit();
}
?>