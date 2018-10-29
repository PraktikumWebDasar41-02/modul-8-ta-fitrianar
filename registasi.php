<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<center>
<h1>=== REGISTRASI ===</h1>
<br>
<form method="post">
 	<table>
		 	<tr>
		 		<td>Username</td>
		 		<td>:</td>
		 		<td><input type="text" name="username"> </td>
		 	</tr>
		 	<tr>
		 		<td>Password</td>
		 		<td>:</td>
		 		<td><input type="password" name="password"></td>
		 	</tr>
		 	<tr>
		 		<td>Ulangi Password</td>
		 		<td>:</td>
		 		<td><input type="password" name="password2"></td>
		 	</tr>
</form>
</table>
	<input style="width: 200px" type="submit" name="kirim" value="kirim">
</center>
</body>
</html>

<?php
include 'conn.php';
 if (isset($_POST['kirim'])) {
 	$username = $_POST['username'];
 	$password = $_POST['password'];
 	if ($_POST['password2']==$_POST['password'] ) {
 	
	     $sql = "INSERT INTO tabel_user (username, password)
		            VALUES ('$username', '$password')"; 
		    if (mysqli_query($conn, $sql)) {
		        header("Location: indeks.php");
		    }else {
		        echo "Error: " . $sql . "<br?" . mysqli_error($conn);
		    }
	}else{
		echo "<script>alert('Password Anda Tidak Tepat');history.go(-1)</script>";
	}
	    mysqli_close($conn);
}
?>