<?php
// Connection Database;
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "crudphoto";

// Connection
$con = mysqli_connect($host, $user, $pass, $dbname);

// Validate Connection
// if($con){
//     echo "Connection Ke DB Berhasil";
// } else {
//     echo "Connection Ke DB Tidak Berhasil";
// }

?>

<!-- Form upload file -->
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="files" required><br>
    <input type="submit" value="Kirim" name="submit">
</form>

<?php
// Upload file in server DB
if(isset($_POST['submit'])){
    $filename = $_FILES['files']['name'];
    $filetmpname = $_FILES['files']['tmp_name'];
    if($filename){
        move_uploaded_file($filetmpname, "image/".$filename);
    }
    $image = $filename;
    $sql = "INSERT INTO users (gambar) VALUES ('$image')";
    if($result = mysqli_query($con, $sql)){
        echo "Uploading Successfully";
        echo "<a href='index.php'>Kembali ke menu awal</a>";
    } else {
        echo "Upload File Not Success";
    }
}