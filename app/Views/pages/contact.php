<?= $this->extend('layout/layout_homepage'); ?>
<?= $this->section('content_homepage'); ?>
<div class="container pt-5">
    <h1 class="mt-5 text-center">Contact Information</h1>
    <div class="row pt-5 pb-5">
        <div class="col-lg-6">
            <img src="/img/parallax.jpg" alt="" style="width: 25rem;" class="">
        </div>
        <div class="col-lg-6">
            <div class="row mt-4">
                <div class="col-sm-1 pt-1 icon">
                    <i class="fas fa-lg fa-map-marker-alt"></i>
                </div>
                <hr>
                <div class="col-sm-11 icon-text">
                    <p> Ruko Diamond 3 No 5 Jalan Gading Golf Boulevard Gading Serpong,
                        Pakulonan Barat, Kec. Kelapa. Dua, <br> Tangerang, Banten 15810
                    </p>
                </div>
                <hr>
            </div>
            <div class="row mt-1">
                <div class="col-sm-1 pt-1 icon">
                    <i class="fas fa-lg fa-phone-alt pt-1"></i>
                </div>
                <div class="col-sm-11 icon-text">
                    <p>08123456789</p>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-sm-1 pt-1 icon">
                    <i class="fas fa-lg fa-envelope-open-text pt-1"></i>
                </div>
                <div class="col-sm-1 icon-text">
                    <p>abc@gmail.com</p>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-sm-1 pt-1 icon">
                    <i class="far fa-lg fa-clock pt-1"></i>
                </div>
                <div class="col-sm-11 icon-text mb-3">
                    <p>Work Hours <br>
                        Monday - Saturday <br>
                        08.00 - 16.00</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>