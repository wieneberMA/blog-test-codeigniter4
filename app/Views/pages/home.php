<?= $this->extend('layouts/main') ?>
 
<?= $this->section('content') ?>
<div id="main-wrapper">
    <div id="content-wrapper">
        <div class="title-container d-flex flex-column justify-content-center align-items-center">
            <div class="page-title text-center text-light">Sample Website Only</div>
            <div class="sub-title text-center">Welcome back <?= ucwords($session->get('login_firstname')." " . $session->get('login_lastname')) ?>!</div>
        </div>
    </div>
    <h2 class="text-center">Your Account Details</h2>
    <hr class="mx-auto border 2 opacity-100 border-dark" style="height:2px; width:25px">
    <div class="col-12 col-lg-4 col-md-6 col-sm-12 mx-auto mb-5">
        <div class="card rounded-0 mb-3">
            <div class="card-body rounded-0">
                <div class="container-fluid">
                    <dl>
                        <dt class="text-body">First Name:</dt>
                        <dd class="ps-4"><?= $session->get('login_firstname') ?></dd>
                        <dt class="text-body">Middle Name:</dt>
                        <dd class="ps-4"><?= !empty($session->get('login_middlename')) ? $session->get('login_middlename') : "N/A" ?></dd>
                        <dt class="text-body">Last Name:</dt>
                        <dd class="ps-4"><?= $session->get('login_lastname') ?></dd>
                        <dt class="text-body">Email:</dt>
                        <dd class="ps-4"><?= $session->get('login_email') ?></dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12 col-12 mx-auto">
            <a href="<?= base_url('logout') ?>" class="btn btn-dark bg-gradient rounded-pill w-100">Logout</a>
        </div>
    </div>
 
</div>
<?= $this->endSection() ?>