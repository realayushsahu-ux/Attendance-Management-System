<?php

require_once '../includes/auth.php';
require_once '../includes/db.php';

requireRole('Teacher');

// -------------------------
// Fetch Subjects
// -------------------------

$subjectStmt = $pdo->query("
SELECT id, subject_name
FROM subjects
ORDER BY subject_name ASC
");

$subjects = $subjectStmt->fetchAll(PDO::FETCH_ASSOC);

// -------------------------
// Fetch Students
// -------------------------

$studentStmt = $pdo->query("
SELECT
id,
roll_no,
full_name
FROM students
ORDER BY roll_no ASC
");

$students = $studentStmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Mark Attendance</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<?php require_once '../includes/navbar.php'; ?>

<div class="container">

<div class="attendance-card">

<?php if(isset($_SESSION['success'])): ?>

<div class="success-message">
    <?= $_SESSION['success']; ?>
</div>

<?php unset($_SESSION['success']); ?>

<?php endif; ?>

<?php if(isset($_SESSION['error'])): ?>

<div class="error-message">
    <?= $_SESSION['error']; ?>
</div>

<?php unset($_SESSION['error']); ?>

<?php endif; ?>

<h2>Mark Attendance</h2>

<form id="attendanceForm"
      action="save_attendance.php"
      method="POST">

<!-- Subject -->

<div class="form-row">

<label>Subject</label>

<select name="subject" id="subject" required>

<option value="">Select Subject</option>

<?php foreach($subjects as $subject): ?>

<option value="<?= $subject['id']; ?>">

<?= htmlspecialchars($subject['subject_name']); ?>

</option>

<?php endforeach; ?>

</select>

</div>

<!-- Lecture -->

<div class="form-row">

<label>Lecture Name</label>

<input
type="text"
name="lecture_name"
id="lecture_name"
placeholder="Enter Lecture Name"
maxlength="100"
required>

</div>

<!-- Start Time -->

<div class="form-row">

<label>Start Time</label>

<input
type="time"
name="start_time"
id="start_time"
required>

</div>

<!-- End Time -->

<div class="form-row">

<label>End Time</label>

<input
type="time"
name="end_time"
id="end_time"
required>

</div>

<hr>

<!-- Search -->

<div class="top-actions">

<input
type="text"
id="searchStudent"
placeholder="Search Roll No or Student Name">

<button type="button" id="allPresent">

All Present

</button>

<button type="button" id="allAbsent">

All Absent

</button>

<button type="button" id="clearAttendance">

Clear

</button>

</div>

<!-- Counter -->

<div class="attendance-count">

<span>

Total Students :
<strong>

<?= count($students); ?>

</strong>

</span>

<span>

Present :
<strong id="presentCount">

0

</strong>

</span>

<span>

Absent :
<strong id="absentCount">

0

</strong>

</span>

</div>

<!-- Student Table -->

<div class="table-wrapper">

<table class="attendance-table">

<thead>

<tr>

<th>Roll No</th>

<th>Student Name</th>

<th>Present</th>

<th>Absent</th>

</tr>

</thead>

<tbody>

<?php foreach($students as $student): ?>

<tr>

<td>

<?= $student['roll_no']; ?>

</td>

<td>

<?= htmlspecialchars($student['full_name']); ?>

</td>

<td>

<input
type="radio"
name="attendance[<?= $student['id']; ?>]"
value="Present">

</td>

<td>

<input
type="radio"
name="attendance[<?= $student['id']; ?>]"
value="Absent">

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

<div class="save-area">

<button
type="submit"
class="btn"
id="saveAttendance"
disabled>

Save Attendance

</button>

</div>

</form>

</div>

</div>

<script src="../js/script.js"></script>

<?php require_once '../includes/footer.php'; ?>

</body>

</html>