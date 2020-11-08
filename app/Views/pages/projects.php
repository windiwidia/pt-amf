<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <img src="/img/projects/<?= $projects['image']; ?>" class="card-img">
    <p class="card-text"><b>Klien : </b><?= $projects['klien']; ?></p>
    <p class="card-text"><?= $projects['alamat']; ?></p>
    <p class="card-text"><?= $projects['deskripsi']; ?></p>
</body>

</html>