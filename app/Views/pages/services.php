<?= $this->extend('layout/layout_homepage'); ?>
<?= $this->section('content_homepage'); ?>
<div class="container pt-5">
    <h1 class="text-center mt-5">Our Services</h1>
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

<?= $this->endSection(); ?>