<?php
session_start();

require_once 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: login.php");
    exit;
}

// ----------------------
// Get & Clean Input
// ----------------------

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');
$role = trim($_POST['role'] ?? '');

// ----------------------
// Validation
// ----------------------

if (empty($username) || empty($password) || empty($role)) {

    $_SESSION['error'] = "All fields are required.";

    header("Location: login.php");
    exit;
}

// ----------------------
// Admin / Teacher Login
// ----------------------

if ($role === "Admin" || $role === "Teacher") {

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND role = ?");

    $stmt->execute([$username, $role]);

    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {

        session_regenerate_id(true);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        if ($role === "Admin") {

            header("Location: admin/dashboard.php");

        } else {

            header("Location: teacher/dashboard.php");

        }

        exit;
    }

}

// ----------------------
// Student Login
// ----------------------

if ($role === "Student") {

    $stmt = $pdo->prepare("SELECT * FROM students WHERE roll_no = ?");

    $stmt->execute([$username]);

    $student = $stmt->fetch();

    if ($student && password_verify($password, $student['password'])) {

        session_regenerate_id(true);

        $_SESSION['student_id'] = $student['id'];
        $_SESSION['student_name'] = $student['full_name'];
        $_SESSION['role'] = "Student";

        header("Location: student/dashboard.php");

        exit;
    }

}

// ----------------------
// Invalid Login
// ----------------------

$_SESSION['error'] = "Invalid username or password.";

header("Location: login.php");

exit;