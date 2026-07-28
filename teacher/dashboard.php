<?php

require_once '../includes/auth.php';

requireRole('Teacher');

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Teacher Dashboard</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<?php require_once '../includes/navbar.php'; ?>

<div class="container">

<div class="attendance-card">

<h1>Teacher Dashboard</h1>

<p>Welcome, <strong><?= htmlspecialchars($_SESSION['username']); ?></strong></p>

<hr><br>

<div class="dashboard-grid">

    <a href="mark_attendance.php" class="dashboard-card">
        📝
        <h3>Mark Attendance</h3>
        <p>Take attendance for today's lecture.</p>
    </a>

    <a href="attendance_history.php" class="dashboard-card">
        📋
        <h3>Attendance History</h3>
        <p>View previously saved attendance records.</p>
    </a>

</div>

</div>

</div>

<?php require_once '../includes/footer.php'; ?>

</body>

</html>