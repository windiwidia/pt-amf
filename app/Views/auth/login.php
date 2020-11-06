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
                        <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                        <div class="col-lg">
                            <div class="p-4">
                                <div class="text-center">
                                    <h3 class="font-weight-bold text-dark">PT AMF</h3>
                                    <h1 class="h4 text-gray-900 mb-4">Log in</h1>
                                </div>
                                <?= session()->getFlashdata('pesan'); ?>
                                <form action="/auth/login" class="user" method="post" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" placeholder="Enter Email Address..." name="email" value="<?= old('email'); ?>">
                                        <!-- value sudah jalan -->
                                        <div class="invalid-feedback ml-3">
                                            <?= $validation->getError('email'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" placeholder="Password" name="password">
                                        <i id="toggle" class="far fa-eye icon-show mr-4" onclick="showHide()"></i>
                                        <!-- <i id="hide" class="far fa-eye-slash icon-hide " onclick="showHide()"></i> -->

                                        <div class="invalid-feedback ml-3">
                                            <?= $validation->getError('password'); ?>
                                        </div>
                                        <div class="text-right mr-3 mt-2 mb-2">
                                            <a class="small" href="/auth/forgotPassword">Forgot your password?</a>
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div> -->

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                </form>
                                <hr>

                                <div class="text-center">
                                    Don't have an account ? <a class="small" href="/auth/registration">Sign up</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?= $this->endSection(); ?>