<div class="row mt-4 mb-3">
	<div class="col-md">
		<a href="<?php echo base_url() ?>petugas" class="btn btn-sm btn-dark">Kembali</a>
	</div>
</div>
<div class="row">
	<div class="col-md">
		<?php echo $this->session->flashdata('pesan') ?>
	</div>
</div>
<div class="row">
	<div class="col-md">
		<div class="card">
			<div class="card-header bg-secondary text-white">
				Tambah peminjaman
			</div>
			<div class="card-body">
				<div class="row">
			    	<div class="col-md-4"> 
			    	<form method="post" action="<?php echo base_url() ?>petugas/tambah_peminjaman?kode=<?php echo $kode ?>">
			        	<div class="form-group">
			        		<label>Kode Peminjaman</label>
			        		<input type="text" name="kode" value="<?php echo $kode ?>" class="form-control" readonly>
			        		<small id="emailHelp" class="form-text text-danger"><?php echo form_error('kode'); ?></small>
			        	</div>
			    	</div>
			    	<div class="col-md-4">
			    		<div class="form-group">
			        		<label>Tanggal Pinjam</label>
			        		<input type="text" name="tgl_pinjam" value="<?php echo $tgl_pinjam ?>" class="form-control" readonly>
			        		<small id="emailHelp" class="form-text text-danger"><?php echo form_error('tgl_pinjam'); ?></small>
			        	</div>
			    	</div>
			    	<div class="col-md-4">
			    		<div class="form-group">
			        		<label>Tanggal Kembali</label>
			        		<input type="text" name="tgl_kembali" value="<?php echo $tgl_kembali ?>" class="form-control" readonly>
			        		<small id="emailHelp" class="form-text text-danger"><?php echo form_error('tgl_kembali'); ?></small>
			        	</div>
			    	</div>
			    </div>
			    <div class="row">
			    	<div class="col-md-4">
			        	<div class="form-group">
			        		<label>Judul Buku</label>
			        		<select name="buku" id="buku_peminjam" class="form-control" required>
			        			<option disabled selected>-- pilih --</option>
			        			<?php foreach($buku as $b): ?>
			        			<option value="<?php echo $b->kode ?>"><?php echo $b->kode ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $b->judul ?></option>
			        			<?php endforeach; ?>
			        		</select>
			        		<small id="emailHelp" class="form-text text-danger"><?php echo form_error('buku'); ?></small>
			        	</div>
			    	</div>
			    	<div class="col-md-4">
			    	</div>
			    	<div class="col-md-4">
			    		<div class="form-group">
			        		<label>Nama Peminjam</label>
			        		<select name="nim" id="nim_peminjam" class="form-control" required>
			        			<option disabled selected>-- pilih --</option>
			        			<?php foreach($peminjam as $p): ?>
			        			<option value="<?php echo $p->nim ?>"><?php echo $p->nim ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $p->nama_mahasiswa ?></option>
			        			<?php endforeach; ?>
			        		</select>
			        		<small id="emailHelp" class="form-text text-danger"><?php echo form_error('nim'); ?></small>
			        	</div>
			    	</div>
			    </div>
			    <div class="row">
			    	<div class="col-md">
			    		<button type="submit" name="pinjam" id="tombol" class="btn btn-sm btn-primary btn-block">Pinjam Sekarang</button>
			    	</div>
			        </form>
			    </div>
			</div>
		</div>
	</div>
</div>
