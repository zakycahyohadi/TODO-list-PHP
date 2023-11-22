<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "note");

// Mendapatkan kata kunci pencarian
$keyword = mysqli_real_escape_string($koneksi, $_GET['title_note']);

// Query pencarian
$query = "SELECT * FROM tabel_note WHERE title_note LIKE '%$keyword%'";
$result = mysqli_query($koneksi, $query);

// Tampilkan hasil pencarian
while ($row = mysqli_fetch_assoc($result)) {
    // Tampilkan data sesuai kebutuhan
    echo $row['title_note'] . "<br>";
}

// Tutup koneksi
mysqli_close($koneksi);
?>
