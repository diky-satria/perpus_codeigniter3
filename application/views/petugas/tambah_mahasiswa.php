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
				Tambah Mahasiswa
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
					<form action="<?php echo base_url() ?>petugas/tambah_mahasiswa" method="post">
						<input type="hidden" name="password" value="unusia">
						<div class="form-group">
							<label>NIM</label>
							<input type="text" name="nim" class="form-control" value="<?php echo set_value('nim'); ?>">
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('nim'); ?></small>
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" class="form-control" value="<?php echo set_value('nama'); ?>">
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('nama'); ?></small>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>">
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('email'); ?></small>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Jurusan</label>
							<select class="form-control" name="jurusan">
								<option disabled selected>-- pilih --</option>
								<?php foreach($jurusan as $j): ?>
								<option value="<?php echo $j->nama_jurusan ?>"><?php echo $j->nama_jurusan ?></option>
								<?php endforeach; ?>
							</select>
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('jurusan'); ?></small>
						</div>
						<div class="form-group">
							<label>Semester</label>
							<select class="form-control" name="semester">
								<option disabled selected>-- pilih --</option>
								<?php for ($i=1; $i <=8 ; $i++): ?>
								<option value="<?php echo $i ?>"><?php echo $i ?></option>
								<?php endfor; ?>
							</select>
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('semester'); ?></small>
						</div>
						<div class="form-group">
							<label>Kelas</label>
							<select class="form-control" name="kelas">
								<option disabled selected>-- pilih --</option>
								<option value="Pagi">Pagi</option>
								<option value="Malam">Malam</option>
								<option value="Weekend">Weekend</option>
							</select>
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('kelas'); ?></small>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md">
						<button type="submit" class="btn btn-sm btn-primary">Tambah</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
