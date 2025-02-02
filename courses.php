<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $courseCode = $_POST['course_code'];
    $courseName = $_POST['course_name'];
    $credits = $_POST['credits'];
    $department = $_POST['department'];

    try {
        $stmt = $pdo->prepare(query: "INSERT INTO courses (course_code, course_name, credits, department) VALUES (?, ?, ?, ?)");
        $stmt->execute(params: [$courseCode, $courseName, $credits, $department]);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
$courses = $pdo->query("SELECT * FROM courses")->fetchAll();
?>

<?php include 'header.php'; ?>
<h1>Courses</h1>
<form method="post">
    <div class="form-group">
        <label>Course Code</label>
        <input type="text" name="course_code" required>
    </div>
    <div class="form-group">
        <label>Course Name</label>
        <input type="text" name="course_name" required>
    </div>
    <div class="form-group">
        <label>Credits</label>
        <input type="number" name="credits" required>
    </div>
    <div class="form-group">
        <label>Department</label>
        <input type="text" name="department">
    </div>
    <button type="submit" class="btn btn-primary">Add Course</button>
</form>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Course Code</th>
            <th>Course Name</th>
            <th>Credits</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($courses as $course): ?>
            <tr>
                <td><?= $course['id'] ?></td>
                <td><?= $course['course_code'] ?></td>
                <td><?= $course['course_name'] ?></td>
                <td><?= $course['credits'] ?></td>
                <td>
                    <a href="edit_course.php?id=<?= $course['id'] ?>" class="btn btn-primary">Edit</a>
                    <a href="delete_course.php?id=<?= $course['id'] ?>" class="btn btn-danger delete-btn">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

