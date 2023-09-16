<!-- // Halaman edit_absensi.php -->

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Proses perubahan data kehadiran dan simpan ke basis data
    $id_kehadiran = $_POST['id_kehadiran'];
    $status = $_POST['status'];

    // Lakukan validasi data jika diperlukan

    // Buat koneksi ke basis data (gantilah dengan koneksi ke basis data Anda)
    $conn = new mysqli('localhost', 'username', 'password', 'nama_database');

    if ($conn->connect_error) {
        die("Koneksi ke basis data gagal: " . $conn->connect_error);
    }

    // Simpan perubahan kehadiran ke basis data
    $sql = "UPDATE data_kehadiran SET status = '$status' WHERE id_kehadiran = $id_kehadiran";

    if ($conn->query($sql) === TRUE) {
        echo "Data kehadiran berhasil diperbarui";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi ke basis data
    $conn->close();
} else {
    // Tampilkan formulir pengeditan data kehadiran
    $id_kehadiran = $_GET['id_kehadiran'];

    // Buat koneksi ke basis data (gantilah dengan koneksi ke basis data Anda)
    $conn = new mysqli('localhost', 'username', 'password', 'nama_database');

    if ($conn->connect_error) {
        die("Koneksi ke basis data gagal: " . $conn->connect_error);
    }

    // Ambil data kehadiran berdasarkan ID
    $sql = "SELECT * FROM data_kehadiran WHERE id_kehadiran = $id_kehadiran";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Tampilkan data dalam formulir
    } else {
        echo "Data kehadiran tidak ditemukan";
    }

    // Tutup koneksi ke basis data
    $conn->close();
}
?>
