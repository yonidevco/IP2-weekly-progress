<?php
$errors = [];
$success = false;
$profileName = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $gender = $_POST['gender'] ?? '';
    $profile = $_FILES['profile'] ?? null;
    if ($name === '') {
        $errors[] = "ur name is required";
    }
    if ($email === '') {
        $errors[] = "email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "invalid email";
    }
    if ($password === '') {
        $errors[] = "pass is required";
    }
    if ($gender === '') {
        $errors[] = "select a gender please";
    }
    if (empty($errors)) {
        $success = true;
        $clean_name = htmlspecialchars($name);
        $clean_gender = htmlspecialchars($gender);
        $profileName = $profile['name'] ?? 'No file uploaded';
    }
}
if ($success) {
    echo "<h2>Registration Successful</h2>";
    echo "Name: $clean_name <br>";
    echo "Gender: $clean_gender <br>";
    echo "Profile: $profileName <br>";
}
if (!empty($errors)) {
    foreach ($errors as $err) {
        echo "$err<br>";
    }
}
?>
<h2>Register</h2>
<form action="#" method="post" enctype="multipart/form-data">
    <p>
        <label>Name</label><br>
        <input type="text" name="name" >
    </p>
    <p>
        <label>Email</label><br>
        <input type="email" name="email">
    </p>
    <p>
        <label>Password</label><br>
        <input type="password" name="password">
    </p>
    <p>
        <label>Gender</label><br>
        <select name="gender" >
            <option value="nn" disabled selected>Select</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </p>
    <p>
        <label for="profile">Profile picture(optional)</label>
        <input type="file" name="profile" id="profile">
    </p>
    <button type="submit">Register</button>
</form>
