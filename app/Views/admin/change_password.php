<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-8">
            <h1 class="m-0 text-dark">Change Password</h1>
        </div><!-- /.col -->
        <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Profile</a></li>
                <li class="breadcrumb-item active">Change Password</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-8">
            <form action="/admin/change_pass" method="post" enctype="multipart/form-data">
                <!-- untuk menjaga form agar formnya hanya bisa diinput dihalaman ini saja -->
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <!-- operasi ternary (if and else dlm satu baris)jika didalam validation itu ada error utk input klien, jika ada error cetak is_invalid, jika false cetak string kosong  -->
                    <div class="col-sm-10">
                        <?php if ($pesan = session()->getFlashdata('pesan')) : ?>
                            <?= session()->getFlashdata('pesan'); ?>
                        <?php endif; ?>
                        <label for="current_password" class="col-form-label">Current Password</label>
                        <input type="password" class="form-control <?= ($validation->hasError('current_password')) ? 'is-invalid' : ''; ?>" id="current_password" name="current_password" autofocus>
                        <i id="toggle1" class="far fa-eye icon-show1" onclick="showHide1()"></i>
                        <div class="invalid-feedback">
                            <?= $validation->getError('current_password'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <!-- operasi ternary (if and else dlm satu baris)jika didalam validation itu ada error utk input klien, jika ada error cetak is_invalid, jika false cetak string kosong  -->
                    <div class="col-sm-10">
                        <label for="new_password1" class="col-form-label">New Password</label>
                        <input type="password" class="form-control <?= ($validation->hasError('new_password1')) ? 'is-invalid' : ''; ?>" id="new_password1" name="new_password1" autofocus>
                        <i id="toggle2" class="far fa-eye icon-show1" onclick="showHidenew2()"></i>
                        <div class="invalid-feedback">
                            <?= $validation->getError('new_password1'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <!-- operasi ternary (if and else dlm satu baris)jika didalam validation itu ada error utk input klien, jika ada error cetak is_invalid, jika false cetak string kosong  -->
                    <div class="col-sm-10">
                        <label for="new_password2" class="col-form-label">Repeat New Password</label>
                        <input type="password" class="form-control <?= ($validation->hasError('new_password2')) ? 'is-invalid' : ''; ?>" id="new_password2" name="new_password2" autofocus>
                        <i id="toggle3" class="far fa-eye icon-show1" onclick="showHidenew3()"></i>
                        <div class="invalid-feedback">
                            <?= $validation->getError('new_password2'); ?>
                        </div>
                    </div>
                </div>
                <div class="justify-content-end">
                    <!-- <a href="/admin/myprofile" class="btn btn-secondary">Cancel</a> -->
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>