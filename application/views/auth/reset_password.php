<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Reset Password</h3></div>
                            <div class="card-body">
                            <?php echo $this->session->flashdata('pesan') ?>
                                <form action="<?php echo base_url() ?>auth/reset_password" method="post">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">Password</label>
                                        <input type="password" class="form-control py-4" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password" />
                                        <small id="emailHelp" class="form-text text-danger"><?php echo form_error('password'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputPassword">Konfirmasi Password</label>
                                        <input class="form-control py-4" name="konfirmasi_password" id="inputPassword" type="password" placeholder="Konfirmasi password" />
                                        <small id="emailHelp" class="form-text text-danger"><?php echo form_error('password'); ?></small>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button type="submit" class="btn btn-sm btn-primary">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>