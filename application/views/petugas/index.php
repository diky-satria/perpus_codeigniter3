<h4 class="mt-4 mb-3">Data Peminjaman</h4>
<div class="row mb-3">
	<div class="col-md">
		<a href="<?php echo base_url() ?>petugas/tambah_peminjaman?kode=<?php echo kode_random(6) ?>" class="btn btn-sm btn-primary">Tambah Peminjaman</a>
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
			<div class="card-body">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode</th>
							<th>NIM</th>
							<th>Tanggal pinjam</th>
							<th>Tanggal kembali</th>
							<th>Terlambat + denda</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
					<?php $no = 1; ?>
					<?php foreach($peminjaman as $p): ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $p->kode_peminjaman ?></td>
							<td><?php echo $p->nim_peminjam ?></td>
							<td><?php echo $p->tanggal_pinjam ?></td>
							<td><?php echo $p->tanggal_kembali ?></td>
							<td>
								<?php 
		                    		$tgl_deadline = $p->tanggal_kembali;
		                    		$tgl_kembali = $tanggal_kembalian;
		                    		$hari = terlambat($tgl_kembali, $tgl_deadline);
 		                    		$bayar = $denda * $hari;
		                    		if($hari > 0){
		                    			echo '<font style="color:red;">'.$hari.' hari<br>Rp. '. number_format($bayar, '0','.','.'). '</font>';
		                    		}else{
		                    			echo '---';
		                    		}
		                    	 ?>
							</td>
							<td>
								<a href="<?php echo base_url() ?>petugas/detail_peminjaman?kode=<?php echo $p->kode_peminjaman ?>&denda=<?php echo $bayar ?>&hari=<?php echo $hari ?>" class="btn btn-sm btn-info">Detail</a>
								<a href="<?php echo base_url() ?>petugas/kembalikan_buku?id=<?php echo $p->id_peminjaman ?>&kode=<?php echo $p->kode_buku ?>" onclick="return confirm('Pastikan kondisi buku tidak rusak !')" class="btn btn-sm btn-primary">Kembalikan</a>
								<a href="<?php echo base_url() ?>petugas/perpanjangan_buku?id=<?php echo $p->id_peminjaman ?>&hari=<?php echo $hari ?>" onclick="return confirm('Lanjutkan perpanjangan buku')" class="btn btn-sm btn-danger">Perpanjang</a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
