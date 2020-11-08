<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?= $title; ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/homepage.css">

</head>

<body data-spy="scroll" data-target="#navbarNavDropdown" data-offset="60" class="body">
    <!-- Begin Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar shadow-sm ">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="/img/amf.png" style="max-width: 75px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#project">Project Lists</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown link
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
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
                    <h1>About Us</h1>
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
    <section id="parallax" class="parallax pb-3">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-3 mt-4 text-center icon-serv">
                    <!-- <div class="card card-num"> -->
                    <i class="fas fa-2x fa-tasks mt-3 text-white"></i>
                    <h2 class="num font-wight-bold text-white">100</h2>
                    <p class="text-white font-wight-bold text-white">Projects done</p>
                    <!-- </div> -->
                </div>
                <div class="col-md-3 mt-4  text-center  icon-serv">
                    <!-- <div class="card card-num"> -->
                    <i class="fas fa-2x fa-users mt-3"></i>
                    <h4 class="num1">150</h4>
                    <p>Workers</p>
                    <!-- </div> -->
                </div>
                <div class="col-md-3 mt-4 text-center  icon-serv">
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
    <section id="project" class="bg-white  pt-5 pb-5">
        <div class="container mt-5">
            <h1 class="text-center ">Recent Projects</h1>
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

    <!-- Begin Compro -->
    <section id="compro" class=" compro">

        <div class="container">
            <div class="row mt-3 pb-5">
                <div class="col">
                    <h1 class="mt-5">Company Profile</h1>
                    <p>Get to know us?</p>
                </div>
                <div class="col mt-4">
                    <button class="btn btn-dark float-right readmore-btn mt-5 mr-3">Read More</button>
                </div>
            </div>
        </div>
    </section>
    <!-- End Compro -->



    <!-- Begin Contacts -->
    <section id="contact" class="bg-white pt-5">
        <div class="container">
            <!-- <h3 class="text-center mt-5 ">Contact Us</h3> -->
            <div class="row  pb-5">
                <div class="col-lg-6 ">
                    <h4 class="mt-4">Contact Information</h4>
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
                <div class="col-lg-6">
                    <?= session()->getFlashdata('pesan'); ?>
                    <h4 class="mt-4">Send Message</h4>
                    <form action="/home/sendMessage" method="post" enctype="multipart/form-data">
                        <div class="row mt-3">
                            <div class="col">
                                <div class="form-group contact-form">
                                    <input type="text" class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : ''; ?>" id="fullname" placeholder="Full Name" name="fullname" value="<?= old('fullname'); ?>">
                                    <label for="fullname">Full Name</label>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('fullname'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group contact-form">
                                    <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Email Address" value="<?= old('email'); ?>">
                                    <label for="email">Email address</label>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group contact-form">
                            <input type="text" class="form-control <?= ($validation->hasError('subject')) ? 'is-invalid' : ''; ?>" id="subject" name="subject" placeholder="Subject" value="<?= old('subject'); ?>">
                            <label for="subject">Subject</label>
                            <div class="invalid-feedback">
                                <?= $validation->getError('subject'); ?>
                            </div>
                        </div>
                        <div class="form-group contact-form">
                            <textarea class="form-control <?= ($validation->hasError('subject')) ? 'is-invalid' : ''; ?>" id="message" name="message" placeholder="Message" value="<?= old('message'); ?>"></textarea>
                            <label for="message">Message</label>
                            <div class="invalid-feedback">
                                <?= $validation->getError('message'); ?>
                            </div>
                        </div>
                        <button class="btn btn-dark float-right readmore-btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contacts -->
    <!-- people say -->
    <section id="quote" class="quote pt-5 pb-2">
        <div class="container  ">
            <div class="row  pb-3  ">
                <div class="col text-center">
                    <h2>GET IN TOUCH</h2>
                    <h3>We are always ready to help you</h3>
                    <p>There are many ways to contact us, You may drop us a line, give us a call or sen an email, choose what suits you the most</p>
                </div>
            </div>
            <div class="row justify-content-center icon-medsos mb-5 ml-4">
                <div class="col-sm-1 icon-link">
                    <a href="">
                        <i class="fab  fa-lg fa-twitter"></i>
                    </a>
                </div>
                <div class="col-sm-1 icon-link">
                    <a href="">
                        <i class="fab fa-lg fa-instagram"></i>
                    </a>
                </div>
                <div class="col-sm-1 icon-link">
                    <a href="">
                        <i class="fab fa-lg fa-linkedin"></i>
                    </a>
                </div>
                <div class="col-sm-1 icon-link">
                    <a href="">
                        <i class="fab  fa-lg fa-facebook-square"></i>
                    </a>
                </div>
            </div>

        </div>
    </section>
    <!-- end people say -->

    <!-- footer -->
    <section id="footer" class="footer pb-3">
        <div class="container ">
            <div class="line"></div>
            <div class="copyright text-center my-auto text-white pt-3">
                <span>Copyright &copy; Windi Widiastuti <?= date('Y'); ?></span>
            </div>
        </div>

    </section>
    <!-- endfooter -->





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/assets/js/script.js"> </script>
</body>

</html>