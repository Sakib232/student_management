
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4;
}

.container {
    width: 90%;
    margin: auto;
    padding: 20px;
}

.navbar {
    background: #333;
    color: white;
    padding: 1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.nav-links {
    display: flex;
    list-style: none;
}

.nav-links li a {
    color: white;
    text-decoration: none;
    padding: 0.5rem 1rem;
}

.nav-links li a:hover {
    background: #555;
}

.card {
    background: white;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.btn {
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn-primary {
    background: #333;
    color: white;
}

.btn-danger {
    background: #dc3545;
    color: white;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #333;
    color: white;
}

tr:hover {
    background-color: #f5f5f5;
}



    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">Student Management System</div>
        <ul class="nav-links">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="students.php">Students</a></li>
            <li><a href="courses.php">Courses</a></li>
            <li><a href="enrollments.php">Enrollments</a></li>
        </ul>
    </nav>
    <div class="container">


    </div>
    
   <script>
    // main.js
document.addEventListener('DOMContentLoaded', function() {
    // Form validation
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const requiredFields = form.querySelectorAll('[required]');
            requiredFields.forEach(field => {
                if (!field.value) {
                    e.preventDefault();
                    alert('Please fill in all required fields');
                    return;
                }
            });
        });
    });

    // Delete confirmation
    const deleteButtons = document.querySelectorAll('.delete-btn');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            if (!confirm('Are you sure you want to delete this record?')) {
                e.preventDefault();
            }
        });
    });
});
   </script>
</body>
</html>