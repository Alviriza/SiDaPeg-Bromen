<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT tb_kinerja.nip_kinerja,tb_kinerja.kinerja,tb_pegawai.nama,tb_pegawai.jabatan FROM tb_kinerja INNER JOIN tb_pegawai ON tb_kinerja.nip_kinerja=tb_pegawai.nip WHERE tb_kinerja.nip_kinerja ='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="row">

	<div class="col-md-12">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Kinerja Pegawai</h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
						<tr>
							<td style="width: 200px">
								<b>NIP</b>
							</td>
							<td>:
								<?php echo $data_cek['nip_kinerja']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 200px">
								<b>Nama</b>
							</td>
							<td>:
								<?php echo $data_cek['nama']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 200px">
								<b>Jabatan</b>
							</td>
							<td>:
								<?php echo $data_cek['jabatan']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 200px">
								<b>Kinerja</b>
							</td>
							<td>:
								<?php echo $data_cek['kinerja']; ?>
							</td>
						</tr>
						
					</tbody>
				</table>
				<div class="card-footer">
					<a href="?page=data-kinerja" class="btn btn-warning">Kembali</a>

					<a href="./report/cetak-kinerja.php?nip_kinerja=<?php echo $data_cek['nip_kinerja']; ?>" target=" _blank"
					 title="Cetak Data Pegawai" class="btn btn-primary">Print</a>
				</div>
			</div>
		</div>
	</div>

	

</div>