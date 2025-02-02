<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $studentId = $_POST['student_id'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $semester = $_POST['semester'];

    $stmt = $pdo->prepare(query: "INSERT INTO students (student_id, first_name, last_name, email, phone, department, semester) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute(params: [$studentId, $firstName, $lastName, $email, $phone, $department, $semester]);
}
$students = $pdo->query("SELECT * FROM students")->fetchAll();
?>

<?php include 'header.php'; ?>
<h1>Students</h1>
<form method="post">
    <div class="form-group">
        <label>Student ID</label>
        <input type="text" name="student_id" required>
    </div>
    <div class="form-group">
        <label>First Name</label>
        <input type="text" name="first_name" required>
    </div>
    <div class="form-group">
        <label>Last Name</label>
        <input type="text" name="last_name" required>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" required>
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="text" name="phone">
    </div>
    <div class="form-group">
        <label>Department</label>
        <input type="text" name="department">
    </div>
    <div class="form-group">
        <label>Semester</label>
        <input type="number" name="semester">
    </div>
    <button type="submit" class="btn btn-primary">Add Student</button>
</form>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Student ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?= $student['id'] ?></td>
                <td><?= $student['student_id'] ?></td>
                <td><?= $student['first_name'] . ' ' . $student['last_name'] ?></td>
                <td><?= $student['email'] ?></td>
                <td>
                    <a href="edit_student.php?id=<?= $student['id'] ?>" class="btn btn-primary">Edit</a>
                    <a href="delete_student.php?id=<?= $student['id'] ?>" class="btn btn-danger delete-btn">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

