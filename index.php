<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
// Include Config;
include_once './config.php';

// Ambil data dari database;
$result = mysqli_query($con, "SELECT * FROM users ORDER BY id DESC");
?>

    <!-- Indexing Database -->
    <center>
        <a href="add.php">Tambah Data</a>

        <table width="80%" border="0">
            <tr bgcolor="#CCCCCCC">
                <td>Name</td>
                <td>Gambar</td>
                <td>Action</td>
            </tr>
            <?php
                while($res= mysqli_fetch_array($result)){
                    echo "<tr></tr>";
                    echo "<td>". $res['nama'] ."</td>";
                    echo "<td><img width='80' src='image/" . $res['gambar'] . "'</td>";
                    echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Kamu yakin untuk delete ini?')\">Delete</a></td>";
                }
            ?>
        </table>
    </center>
</body>

</html>