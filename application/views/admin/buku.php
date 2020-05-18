<div class="row mt-4 mb-3">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin" class="btn btn-sm btn-dark">Kembali</a>
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
				Buku
			</div>
			<div class="card-body">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode</th>
							<th>Judul</th>
							<th>Lokasi</th>
							<th>Foto</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
					<?php $no = 1; ?>
					<?php foreach($buku as $b): ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $b->kode ?></td>
							<td><?php echo $b->judul ?></td>
							<td><?php echo $b->lokasi ?></td>
							<td>
								<img src="<?php echo base_url() ?>assets/foto_buku/<?php echo $b->foto ?>" width="130" height="70">
							</td>
							<td>
								<a href="<?php echo base_url() ?>admin/detail_buku/<?php echo $b->id_buku ?>" class="btn btn-sm btn-info">Detail</a>
								<a href="<?php echo base_url() ?>admin/ubah_buku/<?php echo $b->id_buku ?>" class="btn btn-sm btn-success">Ubah</a>
								<a href="<?php echo base_url() ?>admin/hapus_buku/<?php echo $b->id_buku ?>" onclick="return confirm('Yakin ingin menghapus ?')" class="btn btn-sm btn-danger">Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				<a href="<?php echo base_url() ?>admin/tambah_buku" class="btn btn-sm btn-primary">Tambah</a>
			</div>
		</div>
	</div>
</div>
