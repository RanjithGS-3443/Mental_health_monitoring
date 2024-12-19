<?php
session_start();
include 'db.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user from the database
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify password (assuming passwords are hashed)
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id']; // Adjust based on your database column
            header("Location: users_menu.php"); // Redirect to a dashboard or homepage
            exit();
        } else {
            echo "<script>alert('Invalid password.'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('No account found with that email.'); window.location.href='login.php';</script>";
    }
}
?>
