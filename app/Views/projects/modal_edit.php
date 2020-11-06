<!-- <div class="container">
    <div class="row">
        <div class="col-8"> -->
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                Launch static backdrop modal
            </button> -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2 class="my-3">Form Ubah Data Projects</h2>

                <form action="/projects/update/<?= $projects['id']; ?>" method="post">
                    <!-- untuk menjaga form agar formnya hanya bisa diinput dihalaman ini saja -->
                    <?= csrf_field(); ?>
                    <input type="hidden" name="slug" value="<?= $projects['slug']; ?>">
                    <div class="form-group row">
                        <!-- operasi ternary (if and else dlm satu baris)jika didalam validation itu ada error utk input klien, jika ada error cetak is_invalid, jika false cetak string kosong  -->
                        <label for="klien" class="col-sm-2 col-form-label">Klien</label>

                    </div>
                    <div class="form-group row">
                        <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= (old('pekerjaan')) ?  old('pekerjaan') : $projects['pekerjaan'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= (old('deskripsi')) ?  old('deskripsi') : $projects['deskripsi'] ?>">
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
                        <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="image" name="image" value="<?= (old('image')) ?  old('image') : $projects['image'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>

<!-- </div>
    </div>
</div> -->