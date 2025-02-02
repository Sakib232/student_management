<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $studentId = $_POST['student_id'];
    $courseId = $_POST['course_id'];

    try {
        $stmt = $pdo->prepare(query: "INSERT INTO enrollments (student_id, course_id) VALUES (?, ?)");
        $stmt->execute(params: [$studentId, $courseId]);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Fetch students and courses
$students = $pdo->query("SELECT id, CONCAT(first_name, ' ', last_name) AS name FROM students")->fetchAll();
$courses = $pdo->query("SELECT id, course_name FROM courses")->fetchAll();
$enrollments = $pdo->query("SELECT enrollments.id, students.first_name, students.last_name, courses.course_name 
                            FROM enrollments 
                            JOIN students ON enrollments.student_id = students.id 
                            JOIN courses ON enrollments.course_id = courses.id")->fetchAll();
?>

<?php include 'header.php'; ?>
<h1>Enrollments</h1>
<form method="post">
    <div class="form-group">
        <label>Student</label>
        <select name="student_id" required>
            <option value="">Select Student</option>
            <?php foreach ($students as $student): ?>
                <option value="<?= $student['id'] ?>"><?= $student['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Course</label>
        <select name="course_id" required>
            <option value="">Select Course</option>
            <?php foreach ($courses as $course): ?>
                <option value="<?= $course['id'] ?>"><?= $course['course_name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Enroll</button>
</form>

<table>
    <thead>
        <tr>
            <th>Student Name</th>
            <th>Course Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($enrollments as $enrollment): ?>
            <tr>
                <td><?= $enrollment['first_name'] . ' ' . $enrollment['last_name'] ?></td>
                <td><?= $enrollment['course_name'] ?></td>
                <td>
                    <a href="delete_enrollment.php?id=<?= $enrollment['id'] ?>" class="btn btn-danger delete-btn">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

