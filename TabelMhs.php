<?php
function hitungratarata($tugas, $uts, $uas){
    $ratarata = ($tugas + $uts + $uas) / 3;
    return $ratarata;
}

function nilaiakhir($avg){
    if($avg > 80){
        return "A";
    } elseif($avg > 70){
        return "B";
    } elseif($avg > 60){
        return "C";
    } else {
        return "D";
    }
}

// Associative satu dimensi
$namaKolom = array(
    "nama" => "Nama",
    "tugas" => "Nilai Tugas",
    "uts" => "Nilai UTS",
    "uas" => "Nilai UAS",
    "avg" => "Nilai Rata-rata",
    "nilai" => "Nilai Akhir"
);
// Associative multidimensi
$datamhs = array(
    array(
        $namaKolom["nama"] => "Wayan",
        $namaKolom["tugas"] => 70,
        $namaKolom["uts"] => 80,
        $namaKolom["uas"] => 80,
    ),
    array(
        $namaKolom["nama"] => "Made",
        $namaKolom["tugas"] => 80,
        $namaKolom["uts"] => 70,
        $namaKolom["uas"] => 70
    ),
    array(
        $namaKolom["nama"] => "Nyoman",
        $namaKolom["tugas"] => 90,
        $namaKolom["uts"] => 70,
        $namaKolom["uas"] => 60
    ) 
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Nilai Mahasiswa</title>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
</style>
</head>
<body>

<h2>Daftar Nilai Mahasiswa</h2>
<table>
    <thead>
        <tr>
            <?php foreach ($namaKolom as $kolom) : ?>
                <th><?php echo $kolom; ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datamhs as $data) : ?>
            <tr>
                <?php 
                    $avg = round (hitungratarata($data[$namaKolom["tugas"]], $data[$namaKolom["uts"]], $data[$namaKolom["uas"]]),2); 
                    $nilai = nilaiakhir($avg);
                ?>
                <?php foreach ($data as $key => $value) : ?>
                    <td><?php echo $value; ?></td>
                <?php endforeach; ?>
                <td><?php echo $avg; ?></td>
                <td><?php echo $nilai; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>

