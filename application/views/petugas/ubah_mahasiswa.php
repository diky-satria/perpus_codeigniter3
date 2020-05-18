<div class="row mt-4 mb-3">
	<div class="col-md">
		<a href="<?php echo base_url() ?>petugas/mahasiswa" class="btn btn-sm btn-dark">Kembali</a>
	</div>
</div>
<div class="row">
	<div class="col-md">
		<?php echo $this->session->flashdata('pesan') ?>
	</div>
</div>
<div class="row mb-3">
	<div class="col-md">
		<div class="card">
			<div class="card-header bg-secondary text-white">
				Ubah Mahasiswa
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
					<form action="<?php echo base_url() ?>petugas/ubah_mahasiswa/<?php echo $mhs->id_mahasiswa ?>" method="post">
						<div class="form-group">
							<label>NIM</label>
							<input type="text" name="nim" class="form-control" value="<?php echo $mhs->nim ?>" readonly>
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" class="form-control" value="<?php echo $mhs->nama_mahasiswa ?>">
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('nama'); ?></small>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control" value="<?php echo $mhs->email_mahasiswa ?>" readonly>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Jurusan</label>
							<select class="form-control" name="jurusan">
								<?php foreach($jurusan as $j): ?>
								<option value="<?php echo $j->nama_jurusan ?>" <?php if($jurusan_id == $j->nama_jurusan){ echo 'selected'; } ?>><?php echo $j->nama_jurusan ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label>Semester</label>
							<select class="form-control" name="semester">
								<?php for ($i=1; $i <=8 ; $i++): ?>
								<option value="<?php echo $i ?>" <?php if($semester_id == $i){ echo 'selected'; } ?>><?php echo $i ?></option>
								<?php endfor; ?>
							</select>
						</div>
						<div class="form-group">
							<label>Kelas</label>
							<select class="form-control" name="kelas">
								<option value="Pagi" <?php if($semester_id == 'Pagi'){ echo 'selected'; } ?>>Pagi</option>
								<option value="Malam" <?php if($semester_id == 'Malam'){ echo 'selected'; } ?>>Malam</option>
								<option value="Weekend" <?php if($semester_id == 'Weekend'){ echo 'selected'; } ?>>Weekend</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md">
						<button type="submit" class="btn btn-sm btn-primary">Ubah</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
