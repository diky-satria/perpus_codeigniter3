<h4 class="mt-4 mb-3">Data mahasiswa</h4>
<div class="row">
	<div class="col-md">
		<?php echo $this->session->flashdata('pesan') ?>
	</div>
</div>
<div class="row">
	<div class="col-md">
		<div class="card">
			<div class="card-body">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>No</th>
							<th>NIM</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Jurusan</th>
							<th>Semester</th>
							<th>Kelas</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
					<?php $no = 1; ?>
					<?php foreach($mahasiswa as $m): ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $m->nim ?></td>
							<td><?php echo $m->nama_mahasiswa ?></td>
							<td><?php echo $m->email_mahasiswa ?></td>
							<td><?php echo $m->jurusan_mahasiswa ?></td>
							<td><?php echo $m->semester ?></td>
							<td><?php echo $m->kelas ?></td>
							<td>
								<a href="<?php echo base_url() ?>petugas/ubah_mahasiswa/<?php echo $m->id_mahasiswa ?>" class="btn btn-sm btn-success">Ubah</a>
								<a href="<?php echo base_url() ?>petugas/hapus_mahasiswa?id=<?php echo $m->id_mahasiswa ?>&email=<?php echo $m->email_mahasiswa ?>" onclick="return confirm('Yakin ingin menghapus ?')" class="btn btn-sm btn-danger">Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				<a href="<?php echo base_url() ?>petugas/tambah_mahasiswa" class="btn btn-sm btn-primary">Tambah</a>
			</div>
		</div>
	</div>
</div>
