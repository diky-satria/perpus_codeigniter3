<div class="row mt-4 mb-3">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin/jurusan" class="btn btn-sm btn-dark">Kembali</a>
	</div>
</div>
<div class="row mb-3">
	<div class="col-md-5">
		<div class="card">
			<div class="card-header bg-secondary text-white">
				Tambah Jurusan
			</div>
			<div class="card-body">
				<form action="<?php echo base_url() ?>admin/tambah_jurusan" method="post">
					<div class="form-group">
						<label>Nama Jurusan</label>
						<input type="text" name="nama" class="form-control" value="<?php echo set_value('nama'); ?>">
						<small id="emailHelp" class="form-text text-danger"><?php echo form_error('nama'); ?></small>
					</div>
					<button type="submit" class="btn btn-sm btn-primary">Tambah</button>
				</form>
			</div>
		</div>
	</div>
</div>
