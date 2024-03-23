<?php
// Inisialisasi variabel
$upah_per_jam = $jam_kerja = $gaji_total = "";

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST" || (isset($_GET['submit']) && $_GET['submit'] == "Hitung")) {
    // Menentukan apakah harus menggunakan $_POST atau $_GET untuk mengambil nilai input dari form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $upah_per_jam = $_POST['upah_per_jam'];
        $jam_kerja = $_POST['jam_kerja'];
    } else {
        $upah_per_jam = $_GET['upah_per_jam'];
        $jam_kerja = $_GET['jam_kerja'];
    }

    // Menghitung gaji total
    if ($jam_kerja > 48) {
        $gaji_total = 48 * $upah_per_jam + ($jam_kerja - 48) * $upah_per_jam * 1.15;
    } else {
        $gaji_total = $jam_kerja * $upah_per_jam;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Gaji Karyawan Honorer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            text-align: center;
        }

        form {
            border: 1px solid #ddd;
            padding: 20px;
            width: 500px;
            margin: 0 auto;
        }

        input {
            width: 200px;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #000;
            color: #fff;
            cursor: pointer;
        }

        h3 {
            text-align: center;
        }

        .hasil {
            border: 1px solid #ddd;
            padding: 20px;
            width: 500px;
            margin: 0 auto;
            margin-top: 20px;
        }

        .hasil p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<h2>Perhitungan Gaji Karyawan Honorer</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Jumlah upah per jam: <input type="number" name="upah_per_jam" min="0" required><br>
    Jumlah jam kerja: <input type="number" name="jam_kerja" min="0" required><br>
    <input type="submit" name="submit" value="Hitung">
</form>

<?php
// Menampilkan hasil perhitungan jika telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST" || (isset($_GET['submit']) && $_GET['submit'] == "Hitung")) {
    echo "<div class=\"hasil\">";
    echo "<h3>Hasil Perhitungan</h3>";
    echo "<p>Jumlah upah per jam: Rp " . number_format($upah_per_jam) . "</p>";
    echo "<p>Jumlah jam kerja: " . $jam_kerja . " Jam</p>";
    echo "<p>Jumlah upah total: Rp " . number_format($gaji_total) . "</p>";
    echo "</div>";
}
?>

</body>
</html>
