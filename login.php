<?php
    require("dispatcher/val_login.php");
?>
<?php
    if($statusLogin == "ya"){
        header("location:dashboard.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LOGIN Akun: Login</title>
        <link href="css/css.css" rel="stylesheet">
    </head>
    <body>
        <h1>Login</h1>
        <form action="dispatcher/logika_login.php" method="post">
            <table>
                <tr>
                    <td>Login :</td>
                    <td><input type="text" size="16" name="txtlogin" placeholder="nama login" required="required" /></td>
                </tr>
                <tr>
                    <td >Password :</td>
                    <td><input type="password" size="16" name="txtpasswd" required="required" /></td>
                </tr>
                <tr>
                    <td>~</td>
                    <td><input type="submit" class="tombol" /></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_GET['status'])){
                $getStatus = $_GET['status'];
                echo "<em>".$getStatus."</em>"; 
            }
        ?>
    </body>
    <script src="js/js.js"></script>
</html>