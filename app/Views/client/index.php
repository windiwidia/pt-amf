<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-8">
            <h1 class="m-0 text-dark">Daftar Data Client Perusahaan</h1>
        </div><!-- /.col -->
        <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Component</a></li>
                <li class="breadcrumb-item active">Client</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col">
            <a href="/client/create" class="btn btn-primary my-2">Tambah Data Client</a>

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
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($client as $c) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $c['klien']; ?></td>
                            <td><?= $c['pekerjaan']; ?></td>
                            <td><?= $c['alamat']; ?></td>
                            <td>

                                <a href="/client/edit/<?= $c['slug']; ?>" class="btn btn-success">Edit</a>
                                <!-- http method spoofing -->
                                <form action="/client/<?= $c['id']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div><!-- /.container-fluid -->
</div>
<?= $this->endSection(); ?>
<!-- Button trigger modal -->