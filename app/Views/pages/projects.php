<?= $this->extend('layout/layout_homepage'); ?>
<?= $this->section('content_homepage'); ?>

<div class="container pb-5">
    <div class="card" style="width: 70rem;">
        <img src="/img/projects/<?= $projects['image']; ?>" class="card-img-top" style="width: 70rem;">
        <div class="card-body">
            <p class="card-text"><b>Klien : </b><?= $projects['klien']; ?></p>
            <p class="card-text"><?= $projects['alamat']; ?></p>
            <p class="card-text"><?= $projects['deskripsi']; ?></p>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>