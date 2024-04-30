<?php
// Start session to manage user authentication
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if it's a login or register form submission based on form name or hidden input
    if(isset($_POST['loginForm'])) {
        // Login form is submitted
        // Retrieve username and password from the form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Perform authentication (e.g., check credentials against a database)
        // This is a basic example. In a real application, you would use a secure method to verify credentials.
        if ($username === 'example_user' && $password === 'example_password') {
            // Authentication successful
            // Set session variables to indicate user is logged in
            $_SESSION['username'] = $username;
            // You can add more user data to session if needed (e.g., user ID)
            // Redirect to dashboard or send success response
            echo json_encode(array('success' => true));
        } else {
            // Authentication failed
            // Send error response
            echo json_encode(array('success' => false, 'message' => 'Invalid username or password'));
        }
    } elseif(isset($_POST['registerForm'])) {
        // Register form is submitted
        // Handle registration process here
        // This is just a placeholder
        echo json_encode(array('success' => true, 'message' => 'Registration successful'));
    } else {
        // Invalid form submission
        echo json_encode(array('success' => false, 'message' => 'Invalid form submission'));
    }
} else {
    // If the form is not submitted, redirect to login page
    header('Location: login.html');
    exit();
}
?>