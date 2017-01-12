<?php
    require("dispatcher/val_login.php");
?>
<?php
    if($statusLogin == "tidak")
    {
        header("location:login.php");
    }
    else
    {
        $namaLogin = $_SESSION['login'];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Akun</title>
        <link href="css/css.css" rel="stylesheet">
    </head>
    <body>
        <h1>Akun</h1>
        <h2>Selamat datang di dashboard<?php echo ", " . $namaLogin; ?>!<strong><a href="dispatcher/logika_logout.php">logout</a></strong></h2>
        
        <p>Sistem ini akan mengelola data tabel akun di database akun.</p>
        <a href=formbuatdata.php class="tombol" >Buat baru</a>
        <table>
            <thead>
                <th>Hapus</th>
                <th>Nama Wisata</th>
                <th>Alamat</th>
                <th>Longitude</th>
                <th>Latitude</th>
            </thead>
<?php
    require( "dispatcher/koneksidb.php");
    $sql = "SELECT * FROM akun" ;
    $query = mysqli_query($con,$sql);
    $jumlah_data = mysqli_num_rows($query);
    echo "Jumlah data = " . $jumlah_data;
    mysqli_close($con);

    while ($hasil = mysqli_fetch_array($query))
    {
        echo "
            <tr>
                    <td>
                        <a href='dispatcher/deleteakun.php?id=$hasil[0]'>hapus</a>
                    </td>
                    <td>$hasil[0]</td>
                    <td>$hasil[1]</td>
                    <td>$hasil[2]</td>
                    <td>
                        <a href='formeditdata.php?id=$hasil[0]'>edit</a>
                    </td>
                </tr>
        ";
    }
?>
        </table>
<?php
    if(isset($_GET['status']))
    {
        $getStatus = $_GET['status'];
        echo "<em>".$getStatus."</em>"; 
    }
?>
    </body>
    <script src="js/js.js"></script>
</html>