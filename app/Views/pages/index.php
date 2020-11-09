<?= $this->extend('layout/layout_homepage'); ?>
<?= $this->section('content_homepage'); ?>
<!-- Begin Carousel -->
<section id="home">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="3000">
                <img src="/img/slider/img1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <div class="card card-slider" style="max-width: 100rem;">
                        <h5 class="">First slide label</h5>
                        <p class="">Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-interval="3000">
                <img src="/img/slider/img2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <div class="card card-slider" style="max-width: 100rem;">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/img/slider/img3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <div class="card card-slider" style="max-width: 100rem;">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
<!-- End Carousel -->

<!-- Begin About -->
<section id="about" class="pt-5 pb-5">

    <div class="container mt-5">

        <div class="row mt-3 pb-5">
            <div class="col-lg-6 shadow-image mb-3 pb-5">
                <img src="/img/layer/layer1.jpg" class="rounded layer1" style="max-width: 300px;">
                <img src="/img/layer/layer2.jpg" class="rounded layer2" style="max-width: 300px;">
                <img src="/img/layer/layer3.jpg" class="rounded layer3" style="max-width: 300px;">

            </div>
            <div class="col-lg-6 pb-5 about-text">
                <h1 class="mt-5">About Us</h1>
                <h3>General Contractor and Supply</h3>
                <p class="pb-2">
                    Established since 2017, PT. Agies Mitra Faathir is a company engaged in general
                    contractors with experience in mechanical, electrical and plumbing (MEP),
                    and currently covers the scope of civil works as well.
                </p>
                <button class="btn btn-dark readmore-btn mb-5">Read More</button>
            </div>
        </div>
    </div>
</section>
<!-- End About -->
<section id="parallax" class="parallax pb-3 bg-light mt-5">
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-md-3 mt-4 text-center text-dark">
                <!-- <div class="card card-num"> -->
                <i class="fas fa-2x fa-tasks mt-3 "></i>
                <h2 class="num font-wight-bold ">100</h2>
                <p class="text-white font-wight-bold">Projects done</p>
                <!-- </div> -->
            </div>
            <div class="col-md-3 mt-4  text-center">
                <!-- <div class="card card-num"> -->
                <i class="fas fa-2x fa-users mt-3"></i>
                <h4 class="num1">150</h4>
                <p>Workers</p>
                <!-- </div> -->
            </div>
            <div class="col-md-3 mt-4 text-center">
                <!-- <div class="card card-num"> -->
                <i class="far fa-2x fa-handshake mt-3"></i>
                <h4 class="num2">150</h4>
                <p>Partners</p>
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>

<!-- Begin Services -->
<section id="services" class=" pt-5 pb-5 ">
    <div class="container">
        <h1 class="text-center pt-5 ">Why Choose Us</h1>
        <div class="row pt-5 pb-5">
            <div class="col">
                <div class="card shadow bg-light mb-3 zoom-card" style="max-width: 22rem;">

                    <div class="card-body text-center icon-serv">
                        <i class="fas fa-cogs fa-3x mb-3 mt-3 "></i>
                        <h5 class="card-title text-center">Mechanical</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow bg-light mb-3 zoom-card" style="max-width: 22rem;">
                    <div class="card-body text-center icon-serv">
                        <i class="fas fa-plug fa-3x mb-3 mt-3"></i>
                        <h5 class="card-title text-center">Electrical</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow bg-light mb-3 zoom-card " style="max-width: 22rem;">
                    <div class="card-body text-center icon-serv">
                        <i class="fas fa-wrench fa-3x mb-3 mt-3"></i>
                        <h5 class="card-title text-center">Plumbing</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow bg-light mb-3 zoom-card" style="max-width: 22rem;">
                    <div class="card-body text-center icon-serv">
                        <i class="fas fa-hard-hat fa-3x mb-3 mt-3"></i>
                        <h5 class="card-title text-center">Contruction</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Service -->

<!-- Begin Projects -->
<section id="project" class="bg-light pt-5 pb-5">
    <div class="container">
        <h1 class="text-center pt-5 ">Recent Projects</h1>
        <div class="row pt-5 mb-5">
            <?php

            ?>
            <?php $i = 0;
            foreach ($projects as $p) : if ($i == 3) {
                    break;
                } ?>

                <div class="col">
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
</section>
<!-- End Projects -->
<?= $this->endSection(); ?>