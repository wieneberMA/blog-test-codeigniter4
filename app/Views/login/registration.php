<?= $this->extend('layouts/login_base') ?>
 
<?= $this->section('content') ?>
<div id="login-wrapper">
    <div>
        <div class="row mx-0 justify-content-between align-items-center">
            <div class="col-6">
                <div class="login-title text-light text-center">Welcome to Sample Website</div>
                <div class="sub-title text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
            </div>
            <div class="col-6">
                <div class="login-title text-center">Create an Account</div>
                <hr class="mx-auto border 2 opacity-100 border-dark" style="height:2px; width:25px">
                <div class="col-lg-9 col-md-10 col-sm-12 col-12 mx-auto mt-3" style="min-height:100%">
                    <div class="card shadow rounded-0">
                        <div class="card-body rounded-0">
                            <div class="container-fluid">
                                <form action="" id="login-form" method="POST">
                                    <?php if($session->getFlashdata('error')): ?>
                                        <div class="alert alert-danger rounded-0 mb-3">
                                            <?= $session->getFlashdata('error') ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($session->getFlashdata('success')): ?>
                                        <div class="alert alert-success rounded-0 mb-3">
                                            <?= $session->getFlashdata('success') ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="mb-3">
                                        <label for="firstname" class="form-label tex-body">First Name</label>
                                        <input type="firstname" class="form-control rounded-0" id="firstname" name="firstname" required="required" placeholder="Mark">
                                    </div>
                                    <div class="mb-3">
                                        <label for="middlename" class="form-label tex-body">Middle Name</label>
                                        <input type="middlename" class="form-control rounded-0" id="middlename" name="middlename"placeholder="optional">
                                    </div>
                                    <div class="mb-3">
                                        <label for="lastname" class="form-label tex-body">Last Name</label>
                                        <input type="lastname" class="form-control rounded-0" id="lastname" name="lastname" required="required" placeholder="Cooper">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label tex-body">Email</label>
                                        <input type="email" class="form-control rounded-0" id="email" name="email" required="required" placeholder="mcooper@mail.com">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label tex-body">Password</label>
                                        <input type="password" class="form-control rounded-0" id="password" name="password" required="required" placeholder="*******">
                                    </div>
                                    <div class="mb-3">
                                        <span class="text-body fw-light"><small>Already have an Account?</small></span>
                                        <span><a href="<?= base_url() ?>"><small>Login Here</small></a></span>
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