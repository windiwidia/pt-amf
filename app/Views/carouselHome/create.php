<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Carousel Home</h2>
            <form action="/carousel-home/save/" method="post" enctype="multipart/form-data">
                <!-- untuk menjaga form agar formnya hanya bisa diinput dihalaman ini saja -->
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Carousel home image</label>
                    <div class="col-sm-2">
                        <img src="/img/projects/default.jpg" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" id="image" name="image" autofocus onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('image'); ?>
                            </div>
                            <label class="custom-file-label" for="image">Pilih gambar..</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <!-- operasi ternary (if and else dlm satu baris)jika didalam validation itu ada error utk input title, jika ada error cetak is_invalid, jika false cetak string kosong  -->
                    <label for="title" class="col-sm-2 col-form-label">Carousel home title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" value="<?= old('title'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('title'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Carousel home description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="description" name="description" value="<?= old('description'); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Tambah Carousel Home</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>