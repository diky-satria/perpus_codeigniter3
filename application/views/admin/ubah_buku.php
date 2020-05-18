<div class="row mt-4 mb-3">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin/buku" class="btn btn-sm btn-dark">Kembali</a>
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
				Ubah Buku
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
					<form action="<?php echo base_url() ?>admin/ubah_buku/<?php echo $buku->id_buku ?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $buku->id_buku ?>">
						<img src="<?php echo base_url() ?>assets/foto_buku/<?php echo $buku->foto ?>" width="100%" height="260">
						<div class="form-group">
							<label>Ubah Foto</label>
							<input type="file" name="foto" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Kode</label>
							<input type="text" name="kode" class="form-control" value="<?php echo $buku->kode ?>" readonly>
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('kode'); ?></small>
						</div>
						<div class="form-group">
							<label>Judul</label>
							<input type="text" name="judul" class="form-control" value="<?php echo $buku->judul ?>">
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('judul'); ?></small>
						</div>
						<div class="form-group">
							<label>Pengarang</label>
							<input type="text" name="pengarang" class="form-control" value="<?php echo $buku->pengarang ?>">
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('pengarang'); ?></small>
						</div>
						<div class="form-group">
							<label>Penerbit</label>
							<input type="text" name="penerbit" class="form-control" value="<?php echo $buku->penerbit ?>">
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('penerbit'); ?></small>
						</div>
					</div>
					<div class="col-md-4">	
						<div class="form-group">
							<label>Tahun Terbit</label>
							<input type="text" name="tahun" class="form-control" value="<?php echo $buku->tahun ?>">
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('tahun'); ?></small>
						</div>
						<div class="form-group">
							<label>ISBN</label>
							<input type="text" name="isbn" class="form-control" value="<?php echo $buku->isbn ?>">
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('isbn'); ?></small>
						</div>
						<div class="form-group">
							<label>Jumlah</label>
							<input type="text" name="jumlah" class="form-control" value="<?php echo $buku->jumlah ?>">
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('jumlah'); ?></small>
						</div>
						<div class="form-group">
							<label>Lokasi</label>
							<select class="form-control" name="lokasi">
								<option value="rak 1" <?php if($lokasi == 'rak 1'){ echo 'selected'; } ?>>Rak 1</option>
								<option value="rak 2" <?php if($lokasi == 'rak 2'){ echo 'selected'; } ?>>Rak 2</option>
								<option value="rak 3" <?php if($lokasi == 'rak 3'){ echo 'selected'; } ?>>Rak 3</option>
								<option value="rak 4" <?php if($lokasi == 'rak 4'){ echo 'selected'; } ?>>Rak 4</option>
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
