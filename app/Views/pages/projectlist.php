<div class="container">
    <h1 class="text-center pt-3 ">Recent Projects</h1>
    <div class="row pt-5 mb-5">
        <?php $i = 1; ?>
        <?php foreach ($projects as $p) : ?>
            <div class="col">
                <?= $i++; ?>
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
        <?php endforeach ?>
    </div>
</div>