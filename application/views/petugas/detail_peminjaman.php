<div class="row mt-4 mb-3">
	<div class="col-md">
		<a href="<?php echo base_url() ?>petugas" class="btn btn-sm btn-dark">Kembali</a>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
        <table class="table table-sm">
            <tr>
                <td>Kode Peminjaman</td>
                <td>:</td>
                <td><?php echo $pj->kode_peminjaman ?></td>
            </tr>
            <tr>
                <td>Petugas</td>
                <td>:</td>
                <td><?php echo $pj->petugas ?></td>
            </tr>
            <tr>
                <td>Tanggal Pinjam</td>
                <td>:</td>
                <td><?php echo $pj->tanggal_pinjam ?></td>
            </tr>
            <tr>
                <td>Tanggal Kembali</td>
                <td>:</td>
                <td><?php echo $pj->tanggal_kembali ?></td>
            </tr>
        </table>
    </div>
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
        <table class="table table-sm">
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td><?php echo $pj->nim_peminjam ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php echo $pj->nama_mahasiswa ?></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td><?php echo $pj->jurusan_mahasiswa ?></td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>:</td>
                <td><?php echo $pj->semester ?></td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md">
        <table class="table">
            <thead>
                <tr>
                    <th>Kode Buku</th>
                    <th>Judul</th>
                    <th>Terlambat + Denda</th>  
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $pj->kode_buku ?></td>
                    <td><?php echo $pj->judul ?></td>
                    <td>
                    	<?php 
                    		if($hari > 0){
                    			echo '<font style="color:red;">'.$hari.' hari<br>Rp. '. number_format($denda, '0','.','.'). '</font>';
                    		}else{
                    			echo '---';
                    		}
                    	 ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>