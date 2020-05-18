<div class="row mt-4 mb-3">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin/buku" class="btn btn-sm btn-dark">Kembali</a>
	</div>
</div>
<div class="row">
	<div class="col-md">
		<div class="card">
			<div class="card-header bg-secondary text-white">
				Detail Buku
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<img src="<?php echo base_url() ?>assets/foto_buku/<?php echo $buku->foto ?>" width="100%" height="100%">
					</div>
					<div class="col-md-4">
						<table class="table">
							<tr>
								<th>Kode</th>
								<td>:</td>
								<td><?php echo $buku->kode ?></td>
							</tr>
							<tr>
								<th>Judul</th>
								<td>:</td>
								<td><?php echo $buku->judul ?></td>
							</tr>
							<tr>
								<th>Pengarang</th>
								<td>:</td>
								<td><?php echo $buku->pengarang ?></td>
							</tr>
							<tr>
								<th>Penerbit</th>
								<td>:</td>
								<td><?php echo $buku->penerbit ?></td>
							</tr>
						</table>
					</div>
					<div class="col-md-4">
						<table class="table">
							<tr>
								<th>Tahun terbit</th>
								<td>:</td>
								<td><?php echo $buku->tahun ?></td>
							</tr>
							<tr>
								<th>ISBN</th>
								<td>:</td>
								<td><?php echo $buku->isbn ?></td>
							</tr>
							<tr>
								<th>Jumlah</th>
								<td>:</td>
								<td><?php echo $buku->jumlah ?></td>
							</tr>
							<tr>
								<th>Lokasi</th>
								<td>:</td>
								<td><?php echo $buku->lokasi ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
