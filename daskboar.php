<?php 
include 'conn.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>dashboard</title>
</head>
<body>
<center>
<h1>=== DASHBOARD ===</h1>
	<table border="1" cellspacing="2" cellpadding="20">
		<form action="daskboar.php" method="POST">
			<tr>
				<td colspan="10" align="right">
				Nim : 	<input type="text" name="search"> 
						<input type="submit" name="kirim" value="Cari">

					<a style="padding-left: 200px" href="databaru.php">Tambah data</a> 
					<a href="profile.php">Lihat Profil</a>
				</td>
			</tr>
		</form>
			<tr>
				<th>Nama Depan</th>
				<th>Nama Belakang</th>
				<th>Nim</th>
				<th>Kelas</th>
				<th>Hobbi</th>
				<th>Genre Film</th>
				<th>Tempat Wisata</th>
				<th>Tanggal Lahir</th>
				<th colspan="2">Action</th>
			</tr>
	</table>
</center>
</body>
</html>

	<?php
		@$search = $_POST['search'];
		include 'conn.php';
		$sql1 = "SELECT * FROM tadelapan WHERE nim LIKE '%$search%'";
			
		if (mysqli_num_rows($view)>0) {
			while ($row = mysqli_fetch_assoc($view)) {
			?>
			<tr>
				<td><?php echo $row['nama_depan']?></td>
				<td><?php echo $row['namabe_lakang']?></td>
				<td><?php echo $row['nim']?></td>
				<td><?php echo $row['kelas']?></td>
				<td><?php echo $row['hobi']?></td>
				<td><?php echo $row['genre_film']?></td>
				<td><?php echo $row['tempat_wisata']?></td>
				<td><?php echo $row['tanggal_lahir']?></td>
				<a href="edit.php?id=<?php echo $x['id']; ?>&aksi=edit">Edit</a>
				<a href="proses.php?id=<?php echo $x['id']; ?>&aksi=hapus">Hapus</a>
			</tr>
			<?php
			}
		} else{
			echo "0 results";
		}
	
	?>