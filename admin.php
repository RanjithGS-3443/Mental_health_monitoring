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
            if ($user['role'] === 'employee') {
                // Move to employees table
                $insert_stmt = $conn->prepare("INSERT INTO employees (username, email, password, date_of_birth, phone_number, gender) 
                                               VALUES (?, ?, ?, ?, ?, ?)");
                $insert_stmt->bind_param('ssssss', $user['username'], $user['email'], $user['password'], $user['date_of_birth'], $user['phone_number'], $user['gender']);
            } elseif ($user['role'] === 'psychologist') {
                // Move to psychologists table
                $insert_stmt = $conn->prepare("INSERT INTO psychologists (username, email, password, date_of_birth, phone_number, gender) 
                                               VALUES (?, ?, ?, ?, ?, ?)");
                $insert_stmt->bind_param('ssssss', $user['username'], $user['email'], $user['password'], $user['date_of_birth'], $user['phone_number'], $user['gender']);
            }

            if ($insert_stmt->execute()) {
                // Delete from pending_approvals
                $delete_stmt = $conn->prepare("DELETE FROM pending_approvals WHERE id = ?");
                $delete_stmt->bind_param('i', $id);
                $delete_stmt->execute();

                echo "User approved and added successfully!";
            }
        } elseif ($action === 'reject') {
            // Delete from pending_approvals
            $delete_stmt = $conn->prepare("DELETE FROM pending_approvals WHERE id = ?");
            $delete_stmt->bind_param('i', $id);
            $delete_stmt->execute();

            echo "User rejected and removed.";
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
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
            color: #555;
        }

        table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f4f4f9;
        }

        table tr:hover {
            background-color: #e9ecef;
        }

        .btn {
            padding: 8px 16px;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-approve {
            background-color: #28a745;
        }

        .btn-reject {
            background-color: #dc3545;
        }

        .btn:hover {
            opacity: 0.9;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
                width: 100%;
            }

            table tr {
                margin-bottom: 15px;
            }

            table th {
                display: none;
            }

            table td {
                display: flex;
                justify-content: space-between;
                text-align: left;
                padding: 10px;
                border-bottom: 1px solid #ddd;
            }

            table td::before {
                content: attr(data-label);
                font-weight: bold;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pending Registrations</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Date of Birth</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $pending_result->fetch_assoc()): ?>
                <tr>
                    <td data-label="ID"><?= $row['id'] ?></td>
                    <td data-label="Username"><?= htmlspecialchars($row['username']) ?></td>
                    <td data-label="Email"><?= htmlspecialchars($row['email']) ?></td>
                    <td data-label="Role"><?= htmlspecialchars($row['role']) ?></td>
                    <td data-label="Date of Birth"><?= htmlspecialchars($row['date_of_birth']) ?></td>
                    <td data-label="Phone Number"><?= htmlspecialchars($row['phone_number']) ?></td>
                    <td data-label="Action">
                        <a href="admin_approvals.php?action=approve&id=<?= $row['id'] ?>" class="btn btn-approve">Approve</a>
                        <a href="admin_approvals.php?action=reject&id=<?= $row['id'] ?>" class="btn btn-reject">Reject</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
