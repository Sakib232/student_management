<?php
require_once 'config.php';

$id = $_GET['id'];
$student = $pdo->query("SELECT * FROM students WHERE id = $id")->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $stmt = $pdo->prepare(query: "UPDATE students SET first_name = ?, last_name = ?, email = ?, phone = ? WHERE id = ?");
    $stmt->execute(params: [$firstName, $lastName, $email, $phone, $id]);
    header(header: "Location: students.php");
}
?>

<form method="post">
    <label>First Name</label>
    <input type="text" name="first_name" value="<?= $student['first_name'] ?>" required>
    <label>Last Name</label>
    <input type="text" name="last_name" value="<?= $student['last_name'] ?>" required>
    <label>Email</label>
    <input type="email" name="email" value="<?= $student['email'] ?>" required>
    <label>Phone</label>
    <input type="text" name="phone" value="<?= $student['phone'] ?>">
    <button type="submit">Update</button>
</form>
