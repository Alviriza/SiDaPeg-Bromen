<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Kinerja Pegawai</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-kinerja" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data Kinerja</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>NIP</th>
						<th>Nama</th>
						<th>Jabatan</th>
						<th>Kinerja</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT tb_kinerja.nip_kinerja,tb_kinerja.kinerja,tb_pegawai.nama,tb_pegawai.jabatan FROM tb_kinerja INNER JOIN tb_pegawai ON tb_kinerja.nip_kinerja=tb_pegawai.nip");

              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>						
						<td>
							<?php echo $data['nip_kinerja']; ?>
						</td>
						<td>
							<?php echo $data['nama']; ?>
						</td>
						<td>
							<?php echo $data['jabatan']; ?>
						</td>
						<td>
							<?php 
								if(strlen($data['kinerja']) > 40) {
									echo substr($data['kinerja'], 0, 40) . '...';
								} else {
									echo $data['kinerja'];
								}
							?>
							 
						</td>
						<td>
							<a href="?page=view-kinerja&kode=<?php echo $data['nip_kinerja']; ?>" title="Detail"
							 class="btn btn-info btn-sm">
								<i class="fa fa-eye"></i>
							</a>
							</a>
							<a href="?page=edit-kinerja&kode=<?php echo $data['nip_kinerja']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-kinerja&kode=<?php echo $data['nip_kinerja']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->