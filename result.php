<?php
session_start();

if (!isset($_SESSION['data'])) {
    echo "Tidak ada data yang tersedia.";
    exit;
}

$data = $_SESSION['data'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 700px;
            margin: 50px auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #007bff;
            color: white;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hasil Pendaftaran</h2>
        <table>
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Nama</td>
                <td><?= htmlspecialchars($data['name']) ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= htmlspecialchars($data['email']) ?></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td><?= htmlspecialchars($data['age']) ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td><?= htmlspecialchars($data['gender']) ?></td>
            </tr>
            <tr>
                <td>Browser</td>
                <td><?= htmlspecialchars($data['browser']) ?></td>
            </tr>
        </table>

        <h3>Isi File</h3>
        <table>
            <tr>
                <th>Baris</th>
                <th>Isi</th>
            </tr>
            <?php foreach ($data['fileContent'] as $index => $line): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($line) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
