<?php
include 'db.php'; // Database connection

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $role = $_POST['role']; // employee or psychologist

    // Insert into pending_approvals
    $stmt = $conn->prepare("INSERT INTO pending_approvals (username, email, password, role, date_of_birth, phone_number, gender) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssss', $username, $email, $password, $role, $dob, $phone, $gender);
    
    if ($stmt->execute()) {
        echo "Registration successful! Your account is pending approval.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <label>Date of Birth:</label>
        <input type="date" name="dob" required><br>

        <label>Phone Number:</label>
        <input type="text" name="phone" required><br>

        <label>Gender:</label>
        <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br>

        <label>Role:</label>
        <select name="role">
            <option value="employee">Employee</option>
            <option value="psychologist">Psychologist</option>
        </select><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>
