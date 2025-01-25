<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Form untuk ADDING -->
    <form action="" method="post" enctype="multipart/form-data" name="form1">
        <label for="name">Nama : </label><br>
        <input type="text" name="name" id="name" required><br>
        <label for="files">File : </label><br>
        <input type="file" name="gambar" id="gambar"><br>
        <input type="submit" value="Kirim Data" name="submit" id="submit">
    </form>

    <?php
// Include
include_once "./config.php";

// Adding Data
if(isset($_POST['submit'])){
    $nama = mysqli_real_escape_string($con, $_POST['name']);
    $filename = $_FILES['gambar']['name'];
    
    // Validasi Form
    if(empty($nama) || empty($filename)){
        if (empty($nama)) {
            echo "<font color='red'>Kolom Nama tidak boleh kosong.</font><br/>";
        }
        if (empty($filename)) {
            echo "<font color='red'>Kolom File tidak boleh kosong.</font><br/>";
        }

        echo "<br><a href='javascript:self.history.back()'>Kembali</a></br>";
    } else {
        $filetmpname = $_FILES['gambar']['tmp_name'];
        // Save in folder image;
        $folder = 'image/';
        // Move upload 
        move_uploaded_file($filetmpname, $folder. $filename);
        // Masuk data ke database;
        $result = mysqli_query($con, "INSERT INTO users (nama, gambar) VALUES('$nama', '$filename')");
        // Verification
        echo "<font color='green'>Data Berhasil di tambahkan</font>";
        echo "<a href='index.php'>Lihat Hasilnya</a>";
    }
}

?>
</body>

</html>