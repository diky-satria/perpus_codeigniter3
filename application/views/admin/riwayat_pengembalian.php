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
				Riwayat pengembalian buku
			</div>
			<div class="card-body">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						 <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>NIM</th>
                            <th>Peminjam</th>
                            <th>Kode Buku</th>
                            <th>Judul</th>
                            <th>Tgl pinjam</th>
                            <th>Tgl kembali</th>
                            <th>Opsi</th>
                        </tr>
					</thead>
					<tbody>
					<?php $no = 1; ?>
					<?php foreach($riwayat as $r): ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $r->kode_peminjaman ?></td>
							<td><?php echo $r->nim_peminjam ?></td>
							<td><?php echo $r->nama_mahasiswa ?></td>
							<td><?php echo $r->kode_buku ?></td>
							<td><?php echo $r->judul ?></td>
							<td><?php echo $r->tanggal_pinjam ?></td>
							<td><?php echo $r->tanggal_kembali ?></td>
							<td>
								<a onclick="return confirm('Lanjutkan >>>')" href="<?php echo base_url() ?>admin/hapus_riwayat/<?php echo $r->id_peminjaman ?>" class="btn btn-sm btn-danger">Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
