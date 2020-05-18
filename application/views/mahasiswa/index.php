<h4 class="mt-4 mb-3">Peminjaman saya</h4>
<?php if($peminjaman): ?>
<div class="row">
		<?php $no = 1; ?>
		<?php foreach($peminjaman as $p): ?>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header bg-info">
				<font style="color:white;font-weight:bold;"><?php echo $no++ ?></font>
			</div>
			<div class="card-body">
				<table class="">
				<tr>
					<td>Kode Peminjaman</td>
					<td>:</td>
					<td><?php echo $p->kode_peminjaman ?></td>
				</tr>
				<tr>
					<td>Tanggal pinjam</td>
					<td>:</td>
					<td><?php echo $p->tanggal_pinjam ?></td>
				</tr>
				<tr>
					<td>Tanggal kembali</td>
					<td>:</td>
					<td><?php echo $p->tanggal_kembali ?></td>
				</tr>
				<tr>
					<td>Petugas</td>
					<td>:</td>
					<td><?php echo $p->petugas ?></td>
				</tr>
				<tr>
					<td>Kode buku</td>
					<td>:</td>
					<td><?php echo $p->kode ?></td>
				</tr>
				<tr>
					<td>Judul buku</td>
					<td>:</td>
					<td><?php echo $p->judul ?></td>
				</tr>
				<tr>
					<td>Terlambat + Denda</td>
					<td>:</td>
					<td>
						<?php 
			        		$tgl_deadline = $p->tanggal_kembali;
			        		$tgl_kembali = $tanggal_kembalian;
			        		$hari = terlambat($tgl_kembali, $tgl_deadline);
			        		$bayar = $denda * $hari;
			        		if($hari > 0){
			        			echo '<font style="color:red;font-weight:bold;">'.$hari.' hari<br>Rp. '. number_format($bayar, '0','.','.'). '</font>';
			        		}else{
			        			echo '---';
			        		}
			        	 ?>
			        </td>
				</tr>
				</table>
			</div>
		</div>
	</div>	
		<?php endforeach; ?>
</div>
<?php else: ?>
	<div class="row">
		<div class="col-md">
			<div class="card">
				<div class="card-body bg-danger">
					<center><h3 style="color:white;">Tidak ada peminjaman</h3></center>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
