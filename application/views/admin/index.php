<h4 class="mt-4 mb-3">Dashboard</h4>

<div class="row">
    <div class="col-xl-3 col-md-6">
	    <a href="<?php echo base_url() ?>admin/petugas" class="text-decoration-none">
	        <div class="card bg-primary text-white mb-4">
	            <div class="card-body">Petugas
	            	<div class="display-4"><b><?php echo $count_petugas ?></b></div>
	            </div>
	        </div>
	    </a>
    </div>
    <div class="col-xl-3 col-md-6">
	    <a href="<?php echo base_url() ?>admin/buku" class="text-decoration-none">
	        <div class="card bg-primary text-white mb-4">
	            <div class="card-body">Buku
	            	<div class="display-4"><b><?php echo $count_buku ?></b></div>
	            </div>
	        </div>
	    </a>
    </div>
    <div class="col-xl-3 col-md-6">
	    <a href="<?php echo base_url() ?>admin/jurusan" class="text-decoration-none">
	        <div class="card bg-primary text-white mb-4">
	            <div class="card-body">Jurusan
	            	<div class="display-4"><b><?php echo $count_jurusan ?></b></div>
	            </div>
	        </div>
	    </a>
    </div>
</div>