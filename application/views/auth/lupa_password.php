<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Lupa password ?</h3></div>
                            <div class="card-body">
                            <?php echo $this->session->flashdata('pesan') ?>
                                <form action="<?php echo base_url() ?>auth/lupa_password" method="post">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                                        <input type="text" class="form-control py-4" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email..." />
                                        <small id="emailHelp" class="form-text text-danger"><?php echo form_error('email'); ?></small>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="<?php echo base_url() ?>auth">Login</a>
                                        <button type="submit" class="btn btn-sm btn-primary">Kirim</button>
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