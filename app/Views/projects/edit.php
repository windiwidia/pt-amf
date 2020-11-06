<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- <div class="content-wrapper"> -->
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data Projects</h2>

            <form action="/projects/update/<?= $projects['id']; ?>" method="post" enctype="multipart/form-data">
                <!-- untuk menjaga form agar formnya hanya bisa diinput dihalaman ini saja -->
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $projects['slug']; ?>">
                <input type="hidden" name="imageLama" value="<?= $projects['image']; ?>">
                <div class="form-group row">
                    <!-- operasi ternary (if and else dlm satu baris)jika didalam validation itu ada error utk input klien, jika ada error cetak is_invalid, jika false cetak string kosong  -->
                    <label for="klien" class="col-sm-2 col-form-label">Klien</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('klien')) ? 'is-invalid' : ''; ?>" id="klien" name="klien" autofocus value="<?= (old('klien')) ?  old('klien') : $projects['klien'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('klien'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= (old('pekerjaan')) ?  old('pekerjaan') : $projects['pekerjaan'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tahun" name="tahun" value="<?= (old('tahun')) ?  old('tahun') : $projects['tahun'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= (old('alamat')) ?  old('alamat') : $projects['alamat'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">
                            <?= (old('deskripsi')) ?  old('deskripsi') : $projects['deskripsi'] ?>
                            </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-2">
                        <img src="/img/projects/<?= $projects['image']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" id="image" name="image" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('image'); ?>
                            </div>
                            <label class="custom-file-label" for="image"><?= $projects['image']; ?></label>
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
<?= $this->endSection(); ?>