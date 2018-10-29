<?php
    require_once "conn.php";
    $nim    = $_GET['nim'];
    $delete = "DELETE FROM tadelapan WHERE nim='$nim'"; 
	    if (mysqli_query($conn, $delete)) {
	        header("location: daskboar.php");
	    }else {
	        echo "Error: " . $delete . "<br?" . mysqli_error($conn);
	    }
    mysqli_close($conn);
?>