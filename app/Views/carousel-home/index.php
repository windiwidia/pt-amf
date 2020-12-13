<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>

<div class="wrapper">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-8">
                <h1 class="m-0 text-dark">Carousel Home</h1>
            </div><!-- /.col -->
            <div class="col-sm-4">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Custom Website</a></li>
                    <li class="breadcrumb-item active">Carousel Home</li>
                </ol>
            </div><!-- /.col -->
        </div>
        <div class="row">
            <div class="col">
                <a href="/carousel-home/create_ch" class="btn btn-primary my-2">Tambah Carousel Home</a>

                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Image Carousel</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($carouselhome as $ch) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $ch['klien']; ?></td>
                                <td><?= $ch['pekerjaan']; ?></td>
                                <td><img src="/img/carousel-home/<?= $ch['image']; ?>" alt="" class="gambar" width="200"></td>
                                <td>
                                    <a href="/carousel-home/<?= $ch['slug']; ?>" class="btn btn-success">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>