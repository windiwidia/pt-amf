<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- My CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">

</head>

<body id="page-top">
    <?= $this->include('layout/navbar'); ?>

    <?= $this->renderSection('content'); ?>

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Footer -->
        <!-- End of Footer -->

        <!-- </div> -->
        <!-- End of Content Wrapper -->

    </div>
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Windi Widiastuti <?= date('Y'); ?></span>
            </div>
        </div>
    </footer>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/auth/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>/assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>/assets/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url(); ?>/assets/js/demo/chart-pie-demo.js"></script>


    <script>
        function previewImg() {
            const image = document.querySelector('#image');
            const imageLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');
            // untuk mengganti nama url gambarnya
            imageLabel.textContent = image.files[0].name;
            // untuk mengganti gambar preview
            const fileImage = new FileReader();
            fileImage.readAsDataURL(image.files[0]);

            fileImage.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
    <script type="text/javascript">
        const current_password = document.getElementById('current_password');
        const toggle1 = document.getElementById('toggle1');

        function showHide1() {
            if (current_password.type === 'password') {
                current_password.setAttribute('type', 'text');
                toggle1.classList.add('fa-eye-slash');
            } else {
                current_password.setAttribute('type', 'password');
                toggle1.classList.remove('fa-eye-slash');
            }
        }
    </script>
    <script type="text/javascript">
        const new_password1 = document.getElementById('new_password1');
        const toggle2 = document.getElementById('toggle2');

        function showHidenew2() {
            if (new_password1.type === 'password') {
                new_password1.setAttribute('type', 'text');
                toggle2.classList.add('fa-eye-slash');
            } else {
                new_password1.setAttribute('type', 'password');
                toggle2.classList.remove('fa-eye-slash');
            }
        }
    </script>


    <script type="text/javascript">
        const new_password2 = document.getElementById('new_password2');
        const toggle3 = document.getElementById('toggle3');

        function showHidenew3() {
            if (new_password2.type === 'password') {
                new_password2.setAttribute('type', 'text');
                toggle3.classList.add('fa-eye-slash');
            } else {
                new_password2.setAttribute('type', 'password');
                toggle3.classList.remove('fa-eye-slash');
            }
        }
    </script>

</body>

</html>