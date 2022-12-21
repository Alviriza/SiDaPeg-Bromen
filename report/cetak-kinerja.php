<?php
	include "../inc/koneksi.php";
	
	$nip = $_GET['nip_kinerja'];

	$sql_cek = "SELECT * FROM tb_profil";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
	{
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Cetak Data Kinerja</title>
	<link rel="icon" href="../dist/img/solomon.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
	<img src="../dist/img/kopsurat.jpg" style="width:100%;">

		<?php
			}

			$sql_tampil = "SELECT tb_kinerja.nip_kinerja,tb_kinerja.kinerja,tb_pegawai.nama,tb_pegawai.jabatan FROM tb_kinerja INNER JOIN tb_pegawai ON tb_kinerja.nip_kinerja=tb_pegawai.nip WHERE tb_kinerja.nip_kinerja ='".$nip."'";
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
		?>
	<center>
		<br><h4>
			DATA PEGAWAI
		</h4>
	</center>
	
	<table border="0" cellspacing="5" cellpadding="5" style="width: 90%" align="center">
		<tbody>
			<tr>
				<td>NIP</td>
				<td>:</td>
				<td>
					<?php echo $data['nip_kinerja']; ?>
				</td>
				
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<?php echo $data['nama']; ?>
				</td>
			</tr>			
			<tr>
				<td>Jabatan</td>
				<td>:</td>
				<td>
					<?php echo $data['jabatan']; ?>
				</td>
			</tr>
			<tr>
				<td>Kinerja</td>
				<td>:</td>
				<td>
					<?php echo $data['kinerja']; ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<footer class="fixed-bottom">
		<img src="../dist/img/footer.jpg" style="width:100%;">
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
	</script>
	<script>
		window.print();
	</script>

</body>

</html>