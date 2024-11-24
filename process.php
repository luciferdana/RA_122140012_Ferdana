<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    // Validasi input
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $age = (int) $_POST['age'];
    $gender = $_POST['gender'];
    $file = $_FILES['file'];

    if (strlen($name) < 3) $errors[] = "Nama harus lebih dari 3 karakter.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email tidak valid.";
    if ($age < 18) $errors[] = "Umur harus minimal 18 tahun.";
    if ($file['size'] > 1024 * 1024) $errors[] = "File tidak boleh lebih dari 1 MB.";
    if (pathinfo($file['name'], PATHINFO_EXTENSION) !== 'txt') $errors[] = "File harus berupa teks.";

    if (!empty($errors)) {
        echo "<h3>Errors:</h3><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        exit;
    }

    // Membaca isi file
    $fileContent = file_get_contents($file['tmp_name']);
    $fileLines = explode("\n", $fileContent);

    // Menyimpan data ke session
    session_start();
    $_SESSION['data'] = [
        'name' => $name,
        'email' => $email,
        'age' => $age,
        'gender' => $gender,
        'fileContent' => $fileLines,
        'browser' => $_SERVER['HTTP_USER_AGENT'],
    ];

    header("Location: result.php");
    exit;
}
