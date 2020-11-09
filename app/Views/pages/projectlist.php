<?= $this->extend('layout/layout_homepage'); ?>
<?= $this->section('content_homepage'); ?>
<div class="container pt-5">
    <h1 class="text-center pt-3 mt-5">Projects List</h1>
    <div class="row pt-5 mb-5">
        <?php $i = 1;
        foreach ($projects as $p) : ?>
            <div class="col mb-5">
                <div class="card mx-auto project shadow" style="width: 20rem;">
                    <img src="/img/projects/<?= $p['image']; ?>" alt="" class="gambar" style="width: 20rem; ">
                    <div class="card-body">
                        <h5 class="card-title"><?= ($p['klien']); ?></h5>
                        <p class="card-text"><?= $p['pekerjaan']; ?></p>
                        <p class="card-text"><?= character_limiter($p['deskripsi'], 100); ?></p>
                        <a href="/pages/<?= $p['slug']; ?>" class="btn btn-dark readmore-btn">Read More</a>
                    </div>
                </div>
            </div>
        <?php $i++;
        endforeach ?>
    </div>
</div>
<?= $this->endSection(); ?>