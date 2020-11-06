<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- <div class="content-wrapper"> -->
<!-- Content Header (Page header) -->
<!-- <div class="content-header"> -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Schedule</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Post</a></li>
                <li class="breadcrumb-item active">Schedule</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col">
            <?php foreach ($alamat as $a) : ?>
                <ul>
                    <li><?= $a['tipe']; ?></li>
                    <li><?= $a['alamat']; ?></li>
                    <li><?= $a['kota']; ?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div><!-- /.container-fluid -->
<!-- </div> -->
<!-- /.content-header -->
<!-- </div> -->
<?= $this->endSection(); ?>