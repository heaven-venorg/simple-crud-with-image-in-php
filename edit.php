<?php
// Include Once;
include_once './config.php';

// Inisialisassi
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_array($result);
?>

<!-- Form edit -->
<form action="" method="post" enctype="multipart/form-data">
    <label for="nama">Nama : </label><br>
    <input type="text" name="nama" value="<?php echo $data['nama'] ?>" required><br>
    <label for="file">file : </label><br>
    <input type="file" name="file" required><br>
    <input type="hidden" value="<?php echo $_GET['id']?>" name="id">
    <input type="submit" value="Update" name="update">
</form>

<?php
// Proses edit form ke db;
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $filename = $_FILES['file']['name'];
    $filetmpname = $_FILES['file']['tmp_name'];
    if(empty($nama) || empty($file)){
        if(empty($nama)){
            echo "<font color='red'>Nama tidak boleh kosong</font>";
        }
        if (empty($filename)) {
            echo "<font color='red'>Kolom File tidak boleh kosong.</font><br/>";
        }
    }
    if($filename){
        move_uploaded_file($filetmpname, "image/".$filename);
    }
    $image = $filename;
    $sql = "UPDATE users SET nama= '$nama', gambar = '$image' WHERE id = '$id'";
    if($result = mysqli_query($con, $sql)){
        echo "<font color='green'>Update Data Berhasil</font>";
        echo "<a href='index.php'>Kembali ke menu utama</a>";
    } else {
        echo "<font color='red'>Edit Failed</font>";
    }
}
?>