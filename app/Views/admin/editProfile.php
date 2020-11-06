<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Profile</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Profile</a></li>
                <li class="breadcrumb-item active">Edit Profile</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-8">

            <!-- Page Heading -->
            <!-- <h1 class="h3 mb-4 text-gray-800">Edit Profile</h1> -->
            <form action="/admin/edit/<?= $user['id']; ?>" method="post" enctype="multipart/form-data">
                <!-- untuk menjaga form agar formnya hanya bisa diinput dihalaman ini saja -->
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $user['slug']; ?>">
                <input type="hidden" name="imageLama" value="<?= $user['image']; ?>">
                <div class="form-group row">
                    <!-- operasi ternary (if and else dlm satu baris)jika didalam validation itu ada error utk input klien, jika ada error cetak is_invalid, jika false cetak string kosong  -->
                    <div class="col-sm-10">
                        <label for="email" class="col-form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <!-- operasi ternary (if and else dlm satu baris)jika didalam validation itu ada error utk input klien, jika ada error cetak is_invalid, jika false cetak string kosong  -->
                    <div class="col-sm-10">
                        <label for="firstname" class="col-form-label">First Name</label>
                        <input type="text" class="form-control <?= ($validation->hasError('firstname')) ? 'is-invalid' : ''; ?>" id="firstname" name="firstname" autofocus value="<?= (old('firstname')) ?  old('firstname') : $user['firstname'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('firstname'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <!-- operasi ternary (if and else dlm satu baris)jika didalam validation itu ada error utk input klien, jika ada error cetak is_invalid, jika false cetak string kosong  -->
                    <div class="col-sm-10">
                        <label for="lastname" class="col-form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" autofocus value="<?= (old('lastname')) ?  old('lastname') : $user['lastname'] ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <label for="image" class="col-form-label">Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" id="image" name="image" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('image'); ?>
                            </div>
                            <label class="custom-file-label" for="image"><?= $user['image']; ?></label>
                        </div>
                    </div>
                </div>
                <div class="mb-3" style="max-width: 100px;">
                    <img src="/img/profile/<?= $user['image']; ?>" class="img-thumbnail img-preview">
                </div>

                <a href="/admin/myprofile/<?= $user['slug']; ?>" class="btn btn-secondary">Cancel</a>

                <button type="submit" class="btn btn-primary">Edit</button>
                <!-- </div> -->
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>