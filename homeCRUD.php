<!DOCTYPE HTML>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
    <h1>DATA MAHASISWA</h1>
    <form action="search.php" method="get">
        cari data mahasiswa berdasarkan nama:
        <input type="text" name="carinama">
        <input type="submit" value="Cari">
    </form>
    <br>
    <a href="insertForm.html"><button>Tambah Data</button></a>
    <br>
    <br>
    <br>

    <table>
        <tr>
            <th> ID </th>
            <th> NAMA </th>
            <th> Alamat </th>
            <th> Nama Foto </th>
            <th> Foto </th>
            <th> Aksi </th>
        </tr>
        <?php
            include "myconnection.php";

            $query = "SELECT * FROM murid";
            $result = mysqli_query($connect, $query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td> <?php echo $row["id"]; ?> </td>
            <td> <?php echo $row["name"]; ?> </td>
            <td> <?php echo $row["address"]; ?> </td>
            <td> <?php echo $row["photo"]; ?> </td>
            <td> <img src="gambar/<?php echo $row["photo"];?>" width=100> </td>
            <td>
                <a href="editForm.php?id=<?php echo $row["id"];?>">
                <button>Edit</button></a>
                <a href="delete.php?id=<?php echo $row["id"]; ?>">
                <button>Hapus</button></a>
            </td>
        </tr>
        <?php
                }
            }
            else{
                echo "0 results";
            }
        ?>
    </table>
    <a href="cetak.php"><button>Cetak Laporan</button></a>
</body>
</html>