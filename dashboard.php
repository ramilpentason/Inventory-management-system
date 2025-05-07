<?php
include_once("connection.php");
include_once("functions.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$result = $conn->query("SELECT name FROM Users WHERE user_id = $user_id");
$user = $result->fetch_assoc();

$result = $conn->query("SELECT name, profile_picture FROM Users WHERE user_id = $user_id");
$user = $result->fetch_assoc();
echo "<img src='uploads/" . $user['profile_picture'] . "' width='100' height='100'><br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* Base Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #1C1C1C; /* Dark background */
            color: #E0E0E0; /* Light gray text */
            margin: 0;
            padding: 0;
        }
        h1, h2, h3 {
            font-weight: bold;
            color: #FFD700; /* Gold */
        }
        a {
            color: #FFD700;
            text-decoration: none;
            font-weight: 500;
        }
        a:hover {
            color: #FF4500; /* Orange Red */
        }

        /* Header */
        header {
            background-color: #333333; /* Dark gray */
            padding: 20px;
            text-align: center;
            border-bottom: 5px solid #FFD700;
        }

        /* Navigation */
        nav {
            background-color: #333333;
            padding: 10px;
            text-align: center;
            border-radius: 10px;
            margin: 20px;
        }
        nav a {
            margin: 0 15px;
            font-size: 18px;
            border-radius: 5px;
            padding: 5px 10px;
            background-color: #444444; /* Slightly lighter gray */
        }
        nav a:hover {
            background-color: #FF4500;
            color: white;
        }

        /* Main Content */
        .main-content {
            padding: 30px;
            background-color: #2C2C2C; /* Darker gray */
            margin: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
        }
        .main-content h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }
        .main-content h3 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .main-content p {
            font-size: 16px;
            line-height: 1.6;
        }

        /* Footer */
        footer {
            background-color: #333333;
            padding: 10px;
            text-align: center;
            color: #FFD700;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>

<header>
    <h2>Welcome, <?php echo $user['name']; ?>!</h2>
</header>

<nav>
    <a href="library.php">Library</a> |
    <a href="changepassword.php">Change Password</a> |
    <a href="update_profile.php">Change Profile</a> |
    <?php if (isAdmin()): ?>
        <a href="manage_users.php">Manage Users</a> |
    <?php endif; ?>
    <a href="logout.php">Logout</a>
</nav>

<div class="main-content">
    <h1>Inventory Management System</h1>
    <h3>Welcome Panel</h3>
    <p>This is a standard dashboard for our website project. You can manage your projects, view the library, and change your password.</p>
</div>

<footer>
    <p>&copy; 2025 Your Company. All rights reserved.</p>
</footer>

</body>
</html>
