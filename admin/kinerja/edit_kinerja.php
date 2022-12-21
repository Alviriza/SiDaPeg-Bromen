<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT tb_kinerja.nip_kinerja,tb_kinerja.kinerja,tb_pegawai.nama,tb_pegawai.jabatan FROM tb_kinerja INNER JOIN tb_pegawai ON tb_kinerja.nip_kinerja=tb_pegawai.nip WHERE tb_kinerja.nip_kinerja ='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data Kinerja</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIP</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nip_kinerja" name="nip_kinerja" value="<?php echo $data_cek['nip_kinerja']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Pegawai</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
					readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $data_cek['jabatan']; ?>"
					readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kinerja</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="kinerja" name="kinerja" value="<?php echo $data_cek['kinerja']; ?>"
					/>
				</div>
			</div>

			
		</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-kinerja" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
	
if (isset ($_POST['Ubah'])){


        $sql_ubah = "UPDATE tb_kinerja SET 
			kinerja='".$_POST['kinerja']."'		
            WHERE nip_kinerja='".$data_cek['nip_kinerja']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-kinerja';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-kinerja';
            }
        })</script>";
    }
}

