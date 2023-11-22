<?php
$koneksi = mysqli_connect("localhost", "root", "", "coba");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mendapatkan nilai dari formulir
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];

// Mendapatkan tanggal dan waktu saat ini
$tanggal_waktu = date('Y-m-d H:i:s');

// Query untuk menambahkan data ke dalam tabel
$query = "INSERT INTO data (nama, alamat, tanggal_input) VALUES ('$nama', '$alamat', '$tanggal_waktu')";

if (mysqli_query($koneksi, $query)) {
    echo "Data berhasil ditambahkan!";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
