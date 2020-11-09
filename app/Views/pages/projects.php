<?= $this->extend('layout/layout_homepage'); ?>
<?= $this->section('content_homepage'); ?>

<div class="container pt-5 pb-5">
    <h1 class="mt-5 text-center">Proyek <?= $projects['klien']; ?></h1>
    <div class="row mt-5">
        <div class="col">
            <div class="card" style="width: 70rem;">
                <img src="/img/projects/<?= $projects['image']; ?>" class="card-img-top" style="width: 70rem;">
                <div class="card-body">
                    <p class="card-text"><b>Klien : </b><?= $projects['klien']; ?></p>
                    <p class="card-text"><?= $projects['alamat']; ?></p>
                    <p class="card-text"><?= $projects['deskripsi']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>