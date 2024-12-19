<?php
session_start();
include 'db.php'; // Database connection

// Handle approval/rejection
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];

    // Fetch pending user details
    $stmt = $conn->prepare("SELECT * FROM pending_approvals WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        if ($action === 'approve') {
            // Move to psychologists table
            $insert_stmt = $conn->prepare("INSERT INTO psychologists (name, specialization, phone_number, email, years_of_experience, education, password) 
                                           VALUES (?, ?, ?, ?, ?, ?, ?)");
            $insert_stmt->bind_param('ssssiss', $user['username'], $user['role'], $user['phone_number'], $user['email'], 
                                     $user['years_of_experience'], $user['education'], $user['password']);
            if ($insert_stmt->execute()) {
                // Delete from pending_approvals
                $delete_stmt = $conn->prepare("DELETE FROM pending_approvals WHERE id = ?");
                $delete_stmt->bind_param('i', $id);
                $delete_stmt->execute();
                $message = "User approved and added successfully!";
            }
        } elseif ($action === 'reject') {
            // Delete from pending_approvals
            $delete_stmt = $conn->prepare("DELETE FROM pending_approvals WHERE id = ?");
            $delete_stmt->bind_param('i', $id);
            $delete_stmt->execute();
            $message = "User rejected and removed.";
        }
    }
}

// Fetch all pending approvals
$pending_stmt = $conn->prepare("SELECT * FROM pending_approvals");
$pending_stmt->execute();
$pending_result = $pending_stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Pending Approvals</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }

        .action-links a {
            margin-right: 10px;
            text-decoration: none;
            color: #007bff;
        }

        .action-links a:hover {
            text-decoration: underline;
        }

        /* Message Styles */
        .message {
            margin: 20px 0;
            padding: 10px;
            font-size: 16px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            text-align: center;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pending Registrations</h1>

        <!-- Show message if available -->
        <?php if (isset($message)): ?>
            <div class="message <?= strpos($message, 'Error') !== false ? 'error' : '' ?>">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Years of Experience</th>
                <th>Education</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $pending_result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['username']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['phone_number']) ?></td>
                    <td><?= htmlspecialchars($row['years_of_experience']) ?></td>
                    <td><?= htmlspecialchars($row['education']) ?></td>
                    <td class="action-links">
                        <a href="admin_approvals.php?action=approve&id=<?= $row['id'] ?>">Approve</a> |
                        <a href="admin_approvals.php?action=reject&id=<?= $row['id'] ?>">Reject</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
