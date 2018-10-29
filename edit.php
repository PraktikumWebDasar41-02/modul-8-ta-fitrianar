<?php 
include 'conn.php';
$datbase = new database();
    $nim      = $_GET['nim'];
    $edit     = "SELECT * FROM tadelapan WHERE nim = '$nim'";
    $sql      = mysqli_query($conn,$edit); 
    $row      = mysqli_fetch_assoc($sql);
    $sohobi   = explode(", ", $row['hobbi']);
    $sogenre  = explode(", ", $row['genre_film']);
    $sowisata = explode(", ", $row['tempat_wisata']);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
     <title></title>
 </head>
 <body>
 <center>
 <h1>=== EDIT DATA ===</h1>
    <form method="POST">
        <table>
            
            <tr>
                <td>Nama Depan</td>
                <td>:</td>
                <td><input type="text" name="nama_depan" value="<?php echo $row['nama_depan'] ?>"></td>
            </tr>
            <tr>
                <td>Nama Belakang</td>
                <td>:</td>
                <td><input type="text" name="nama_belakang" value="<?php echo $row['nama_bealakng'] ?>"></td>
            </tr>
            <tr>
                <td>Nim</td>
                <td>:</td>
                <td><input type="text" name="nim" value="<?php echo $row['nim'] ?>"></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><input type="text" name="kelas" value="<?php echo $row['kelas'] ?>"></td>
            </tr>
             <tr>
                <td>Hobi</td>
                <td>:</td>
                <td> 
                    <input type="checkbox" name="hobbi[]" value="Bersepeda" <?php if(array_search("Nonton", $sohobi) > -1 ) { echo "checked"; }?>>Bersepeda<br>
                    <input type="checkbox" name="hobbi[]" value="Berenang" <?php if(array_search("Baca", $sohobi) > -1 ) { echo "checked"; }?>>Berenang<br>
                    <input type="checkbox" name="hobbi[]" value="Bercanda" <?php if(array_search("Travelling", $sohobi) > -1 ) { echo "checked"; }?>>Bercanda<br> 
                </td>
            </tr>
            <tr>
                <td>Genre Film</td>
                <td>:</td>
                <td> 
                    <input type="checkbox" name="genre_film[]" value="Horror" <?php if(array_search("Horror", $sogenre) > -1 ) { echo "checked"; }?>> Thriller<br>
                     <input type="checkbox" name="genre_film[]" value="Anime" <?php if(array_search("Anime", $sogenre) > -1 ) { echo "checked"; }?> > Horror<br>
                     <input type="checkbox" name="genre_film[]" value="Drama" <?php if(array_search("Drama", $sogenre) > -1 ) { echo "checked"; }?>> Fantasi<br> 
                </td>
            <tr>
            </tr>
            <tr>
                <td>Tempat Wisata</td>
                <td>:</td>
                <td> <input type="checkbox" name="tempat_wisata[]" value="Bali" <?php if(array_search("Bali", $sowisata) > -1 ) { echo "checked"; }?>>Bali<br>
                     <input type="checkbox" name="tempat_wisata[]" value="Tanjung Selor" <?php if(array_search("Tanjung Selor", $sowisata) > -1 ) { echo "checked"; }?>> Tanjung Selor<br>
                     <input type="checkbox" name="tempat_wisata[]" value="Jakarta" <?php if(array_search("Jakarta", $sowisata) > -1 ) { echo "checked"; }?>>Jakarta<br> 
                     <input type="checkbox" name="tempat_wisata[]" value="Lombok" <?php if(array_search("Lombok", $sowisata) > -1 ) { echo "checked"; }?>>Lombok<br> 
                </td>
            </tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><input type="date" name="tgl_lahir" value="<?php echo $row['tgl_lahir'] ?>"></td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" value="kirim"></td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>

    <?php
    if (isset($_POST['nim'])) {
        $nama           = $_POST['nama_depan'];
        $nama           = $_POST['nama_belakang'];
        $nim            = $_POST['nim'];
        $kelas          = $_POST['kelas'];
        $list_hobi      = implode(", ",  $_POST['hobbi']);
        $genre_film     = implode(", ", $_POST['genre_film']);
        $tempat_wisata  = implode(", ", $_POST['tempat_wisata']);
		$tgl_lahir      = $_POST['tanggal_lahir'];
	
        $sql = "UPDATE tadelapan SET nama_depan='$nama_depan',nama_belakang=$nama_belakang,kelas='$kelas', hobi='$list_hobi', genre='$genre_film',tempat_wisata = '$wisata',,tanggal_lahir='$tanggal_lahir' WHERE nim='$nim'";
        if (mysqli_query($conn, $sql)) {
                header("location: daskboar.php");
        }else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
        mysqli_close($conn);
    }