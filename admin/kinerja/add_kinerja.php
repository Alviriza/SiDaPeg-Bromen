<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIP</label>
				<div class="col-sm-5">
					<select name="nip_pegawai" id="nip_pegawai" class="form-control">
						<?php											
						$querypegawai = mysqli_query($koneksi, "SELECT * FROM tb_pegawai");
						if ($querypegawai == false){
							die ("Terdapat Kesalahan : ". mysqli_error($koneksi));
						}
						while ($pegawai = mysqli_fetch_array($querypegawai)){
							echo "<option value='$pegawai[nip]'>$pegawai[nama]</option>";
						}
					?>
					</select>
				</div>
			</div>
		<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kinerja</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="alamat" name="kinerja" placeholder="Kinerja" required>
				</div>
			</div>

			

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pegawai" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
	

    if (isset ($_POST['Simpan'])){


        $sql_simpan = "INSERT INTO tb_kinerja (nip_kinerja, kinerja) VALUES (
            '".$_POST['nip_pegawai']."',			
			'".$_POST['kinerja']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-kinerja';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-kinerja';
          }
      })</script>";
	}
	
	}
     //selesai proses simpan data
