<?= $this->extend('layouts/login_base') ?>
 
<?= $this->section('content') ?>
<div id="login-wrapper">
    <div>
        <div class="row mx-0 justify-content-between align-items-center" style="min-height:100%">
            <div class="col-6">
                <div class="login-title text-light text-center">Welcome to Sample Website</div>
                <div class="sub-title text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
            </div>
            <div class="col-6">
                <div class="login-title text-center">Login to Sample Site</div>
                <hr class="mx-auto border 2 opacity-100 border-dark" style="height:2px; width:25px">
                <div class="col-lg-9 col-md-10 col-sm-12 col-12 mx-auto mt-3">
                    <div class="card shadow rounded-0">
                        <div class="card-body rounded-0">
                            <div class="container-fluid">
                                <form action="<?= base_url('login') ?>" id="login-form" method="POST">
                                    <?php if($session->getFlashdata('error')): ?>
                                        <div class="alert alert-danger rounded-0 py-1 px-2 mb-3">
                                            <?= $session->getFlashdata('error') ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($session->getFlashdata('success')): ?>
                                        <div class="alert alert-success rounded-0 py-1 px-2 mb-3">
                                            <?= $session->getFlashdata('success') ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="mb-3">
                                        <label for="email" class="form-label tex-body">Email</label>
                                        <input type="email" class="form-control rounded-0" id="email" name="email" required="required" placeholder="name@mail.com">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label tex-body">Password</label>
                                        <input type="password" class="form-control rounded-0" id="password" name="password" required="required" placeholder="*******">
                                    </div>
                                    <div class="mb-3">
                                        <span class="text-body fw-light"><small>Don't have an Account yet?</small></span>
                                        <span><a href="<?= base_url('registration') ?>"><small>Register Here</small></a></span>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 mx-auto">
                                            <button class="btn btn-dark bg-gradient rounded-pill w-100 fw-bolder">Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>