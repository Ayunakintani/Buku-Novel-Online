<?php
	require("koneksidb.php");
	
	$email = $_POST['txtemail'];
	$password = $_POST['txtpasswd'];
				
	if($email === "" || $password === "")
	{
		$status = "email dan password harus terisi";
		header("location:../formbuatdata.php?status=$status");
	}
    else
    {
		$sql = "SELECT email FROM login WHERE email='$email'";
		$query = mysqli_query($con,$sql);
		$hasil = mysqli_fetch_array($query);
		
		$loginCek=$hasil[0];
		
		if ($emailCek === $email)
		{
			mysqli_close($con);
            $status = "Login sudah ada";
			header("location:../formbuatdata.php?status=$status");
		}
        else
        {
			$sql = "INSERT INTO login (ID, email, password) VALUES (NULL ,  '$email',md5('$password'))";
            $query = mysqli_query($con,$sql);
            mysqli_close($con);
            
            if ($query) {
                $status = "Akun berhasil dibuat";
            }
            else
            {
                $status = "Akun gagal dibuat";
            }
            
			header("location:../index.php?status=$status");            
		}
	}
?>