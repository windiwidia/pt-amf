<?= $this->extend('layout/layout_homepage'); ?>
<?= $this->section('content_homepage'); ?>

<div class="container">
    <div class="card mb-5 mt-5">
        <img src="/img/projects/<?= $projects['image']; ?>" class="card-img-top mw-100">
        <div class="card-body">
            <p class="card-text"><b>Klien : </b><?= $projects['klien']; ?></p>
            <p class="card-text"><?= $projects['alamat']; ?></p>
            <p class="card-text"><?= $projects['deskripsi']; ?></p>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>