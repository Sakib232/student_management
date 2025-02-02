<?php
require_once 'config.php';

// Fetch metrics
$totalStudents = $pdo->query("SELECT COUNT(*) FROM students")->fetchColumn();
$totalCourses = $pdo->query("SELECT COUNT(*) FROM courses")->fetchColumn();
$totalEnrollments = $pdo->query("SELECT COUNT(*) FROM enrollments")->fetchColumn();
?>

<?php include 'header.php'; ?>
<h1>Dashboard</h1>
<div class="card">
    <h3>Total Students: <?= $totalStudents ?></h3>
</div>
<div class="card">
    <h3>Total Courses: <?= $totalCourses ?></h3>
</div>
<div class="card">
    <h3>Total Enrollments: <?= $totalEnrollments ?></h3>
</div>

