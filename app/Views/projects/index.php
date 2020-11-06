<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<!-- <div class="content-wrapper"> -->
<!-- Content Header (Page header) -->
<!-- <div class="content-header"> -->
<!-- Page Wrapper -->
<div id="wrapper">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-8">
                <h1 class="m-0 text-dark">Daftar Data Projects Perusahaan</h1>
            </div><!-- /.col -->
            <div class="col-sm-4">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Component</a></li>
                    <li class="breadcrumb-item active">Projects</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col">
                <a href="/projects/create" class="btn btn-primary my-2">Tambah Data Projects</a>
                <!-- Button trigger modal -->
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahData">
                Tambah Data
            </button> -->

                <?php if ($pesan = session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>

                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Klien</th>
                            <th scope="col">Pekerjaan</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($projects as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $p['klien']; ?></td>
                                <td><?= $p['pekerjaan']; ?></td>
                                <td><img src="/img/projects/<?= $p['image']; ?>" alt="" class="gambar" width="200"></td>
                                <td>
                                    <a href="/projects/<?= $p['slug']; ?>" class="btn btn-success">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- </div> -->

<!-- Modal Tambah Data -->


<!-- Modal -->


<?= $this->endSection(); ?>