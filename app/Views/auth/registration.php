<?= $this->extend('layout/auth_header'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class=" col-lg-5 ">
            <div class="card o-hidden border-0 shadow-lg my-1 mb-3">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                        <div class="col-lg">
                            <div class="p-4">
                                <div class="text-center">
                                    <h3 class="font-weight-bold text-dark">PT AMF</h3>
                                    <h1 class="h4 text-gray-900 mb-4">Create Account</h1>
                                </div>
                                <!-- method post supaya tidak ada di url -->
                                <form action="/auth/save" class="user" method="post" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="form-group row">
                                        <div class="col-sm-6"><input type="text" class="form-control form-control-user <?= ($validation->hasError('firstname')) ? 'is-invalid' : ''; ?>" id="firstname" placeholder="Full Name" name="firstname" value="<?= old('firstname'); ?>">
                                            <div class="invalid-feedback ml-3">
                                                <?= $validation->getError('firstname'); ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user <?= ($validation->hasError('lastname')) ? 'is-invalid' : ''; ?>" id="lastname" placeholder="Last Name" name="lastname" value="<?= old('lastname'); ?>">
                                            <div class="invalid-feedback ml-3">
                                                <?= $validation->getError('lastname'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" placeholder="Email Address" name="email" value="<?= old('email'); ?>">
                                        <div class="invalid-feedback ml-3">
                                            <?= $validation->getError('email'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user <?= ($validation->hasError('password1')) ? 'is-invalid' : ''; ?>" id="password1" name="password1" placeholder="Password">
                                            <i id="toggle1" class="far fa-eye icon-show mr-4" onclick="showHide1()"></i>
                                            <div class="invalid-feedback ml-3">
                                                <?= $validation->getError('password1'); ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user <?= ($validation->hasError('password2')) ? 'is-invalid' : ''; ?>" id="password2" name="password2" placeholder="Repeat Password">
                                            <i id="toggle2" class="far fa-eye icon-show mr-4" onclick="showHide2()"></i>
                                            <div class="invalid-feedback ml-3">
                                                <?= $validation->getError('password2'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Sign up
                                    </button>
                                </form>
                                <hr>
                                <!-- <div class="text-center">
                                    <a class="small" href="/auth/forgotPassword">Forgot Password?</a>
                                </div> -->
                                <div class="text-center">
                                    Already have an account?
                                    <a class="small" href="/auth/login">Sign in</a>
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