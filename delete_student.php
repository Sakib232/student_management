<?php
require_once 'config.php';

$id = $_GET['id'];
$pdo->query("DELETE FROM students WHERE id = $id");
header(header: "Location: students.php");
?>
