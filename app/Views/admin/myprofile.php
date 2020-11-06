<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php if ($pesan = session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <!-- Page Heading -->

    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">My Profile</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Profile</a></li>
                <li class="breadcrumb-item active">My Profile</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">

                <img src="/img/profile/<?= $user['image']; ?>" class="card-img">

            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= ucfirst($user['firstname']) . ' ' . ucfirst($user['lastname']); ?></h5>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <p class="card-text"><small class="text-muted">Member since <?= $user['created_at'];  ?></small></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>