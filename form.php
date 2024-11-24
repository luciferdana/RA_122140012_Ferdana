<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input, select, button {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s;
        }
        input:focus, select:focus {
            border-color: #007bff;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            font-size: 0.9em;
            margin-bottom: 15px;
        }
    </style>
    <script>
        function validateForm() {
            const name = document.forms["registration"]["name"].value;
            const email = document.forms["registration"]["email"].value;
            const age = document.forms["registration"]["age"].value;
            const file = document.forms["registration"]["file"].files[0];

            let errors = [];

            if (name.length < 3) errors.push("Nama harus lebih dari 3 karakter.");
            if (!email.includes("@")) errors.push("Email tidak valid.");
            if (isNaN(age) || parseInt(age) < 18) errors.push("Umur harus angka dan minimal 18.");
            if (!file) {
                errors.push("File harus diupload.");
            } else {
                const fileSize = file.size / 1024; // KB
                const fileType = file.type;
                if (fileSize > 1024) errors.push("File tidak boleh lebih dari 1 MB.");
                if (fileType !== "text/plain") errors.push("File harus bertipe teks.");
            }

            const errorDiv = document.getElementById("errors");
            errorDiv.innerHTML = errors.join("<br>");
            return errors.length === 0;
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Form Pendaftaran</h2>
        <div id="errors" class="error"></div>
        <form name="registration" action="process.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            <label for="name">Nama:</label>
            <input type="text" name="name" id="name" placeholder="Masukkan Nama Anda" required>
            
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Masukkan Email Anda" required>
            
            <label for="age">Umur:</label>
            <input type="text" name="age" id="age" placeholder="Masukkan Umur Anda" required>
            
            <label for="gender">Jenis Kelamin:</label>
            <select name="gender" id="gender" required>
                <option value="">Pilih</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            
            <label for="file">Upload File (teks):</label>
            <input type="file" name="file" id="file" accept=".txt" required>
            
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
