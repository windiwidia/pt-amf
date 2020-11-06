<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- <div class="content-wrapper"> -->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Projects</h2>
            <div class="card" style="width: 25rem;">
                <img src="/img/projects/<?= $projects['image']; ?>" class="card-img" style="width: 25rem;">
                <div class="card-body">
                    <p class="card-text"><b>Klien : </b><?= $projects['klien']; ?></p>
                    <p class="card-text"><?= $projects['alamat']; ?></p>
                    <p class="card-text"><?= $projects['deskripsi']; ?></p>

                    <a href="/projects/edit/<?= $projects['slug']; ?>" class="btn btn-warning">Edit</a>

                    <!-- http method spoofing -->
                    <form action="/projects/<?= $projects['id']; ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?');">Delete</button>
                    </form>
                    <br>
                    <a href="/projects">Kembali ke daftar projects</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>