<?= $this->extend('layout/auth_header'); ?>

<?= $this->section('content'); ?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-5">

            <div class="card o-hidden border-0 shadow-lg my-1 mb-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!-- <div class="col-lg-6 d-none d-lg-block bg-password-image"></div> -->
                        <div class="col-lg">
                            <div class="p-4">
                                <div class="text-center">
                                    <h3 class="font-weight-bold text-dark">PT AMF</h3>
                                    <h1 class="h4 text-gray-900 mb-2">Change Your Password for</h1>
                                    <h5><?= session()->get('reset_email'); ?></h5>
                                    <!-- <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p> -->
                                </div>

                                <?= session()->getFlashdata('pesan'); ?>

                                <form action="auth/changePass" class="user" method="post" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user <?= ($validation->hasError('password1')) ? 'is-invalid' : ''; ?>" id="password1" placeholder="Enter New Password..." name="password1" value="">
                                        <i id="toggle1" class="far fa-eye icon-show mr-4" onclick="showHide1()"></i>
                                        <!-- value sudah jalan -->
                                        <div class="invalid-feedback ml-3">
                                            <?= $validation->getError('password1'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user <?= ($validation->hasError('password2')) ? 'is-invalid' : ''; ?>" id="password2" placeholder="Repeat New Password..." name="password2" value="">
                                        <i id="toggle2" class="far fa-eye icon-show mr-4" onclick="showHide2()"></i>
                                        <!-- value sudah jalan -->
                                        <div class="invalid-feedback ml-3">
                                            <?= $validation->getError('password2'); ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Change Password
                                    </button>
                                </form>
                                <!-- <hr> -->
                                <!-- <div class="text-center">
                                    <a class="small" href="/auth/registration">Create an Account!</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="/auth">Already have an account? Login!</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?= $this->endSection(); ?>