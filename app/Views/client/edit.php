<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-3">Form Ubah Data Client</h2>

                <form action="/client/update/<?= $client['id']; ?>" method="post" enctype="multipart/form-data">
                    <!-- untuk menjaga form agar formnya hanya bisa diinput dihalaman ini saja -->
                    <?= csrf_field(); ?>
                    <input type="hidden" name="slug" value="<?= $client['slug']; ?>">

                    <div class="form-group row">
                        <!-- operasi ternary (if and else dlm satu baris)jika didalam validation itu ada error utk input klien, jika ada error cetak is_invalid, jika false cetak string kosong  -->
                        <label for="klien" class="col-sm-2 col-form-label">Klien</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('klien')) ? 'is-invalid' : ''; ?>" id="klien" name="klien" autofocus value="<?= (old('klien')) ?  old('klien') : $client['klien'] ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('klien'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('pekerjaan')) ? 'is-invalid' : ''; ?>" id="pekerjaan" name="pekerjaan" value="<?= (old('pekerjaan')) ?  old('pekerjaan') : $client['pekerjaan'] ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('pekerjaan'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= (old('alamat')) ?  old('alamat') : $client['alamat'] ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('alamat'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>