<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="/assets/css/style.css">

</head>

<body class="">
    <div class="container">
        <div class="row mt-4">
            <div class="col text-center">
                <h3 class="font-weight-bold">Welcome Back to Website Admin PT AMF,</h3>
                <p class="font-weight-bold">Please login to access your account</p>
            </div>
        </div>
    </div>

    <?= $this->renderSection('content'); ?>



    <footer>
        <div class="container mt-5">
            <div class="copyright text-center my-auto mt-5">
                <span class="text-dark">Copyright &copy; Windi Widiastuti <?= date('Y'); ?></span>
            </div>
        </div>
    </footer>


    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/assets/js/sb-admin-2.min.js"></script>

    <script type="text/javascript">
        const password = document.getElementById('password');
        const toggle = document.getElementById('toggle');

        function showHide() {
            if (password.type === 'password') {
                password.setAttribute('type', 'text');
                toggle.classList.add('fa-eye-slash');
            } else {
                password.setAttribute('type', 'password');
                toggle.classList.remove('fa-eye-slash');
            }
        }
    </script>

    <script type="text/javascript">
        const password1 = document.getElementById('password1');
        const toggle1 = document.getElementById('toggle1');

        function showHide1() {
            if (password1.type === 'password') {
                password1.setAttribute('type', 'text');
                toggle1.classList.add('fa-eye-slash');
            } else {
                password1.setAttribute('type', 'password');
                toggle1.classList.remove('fa-eye-slash');
            }
        }
    </script>

    <script type="text/javascript">
        const password2 = document.getElementById('password2');
        const toggle2 = document.getElementById('toggle2');

        function showHide2() {
            if (password2.type === 'password') {
                password2.setAttribute('type', 'text');
                toggle2.classList.add('fa-eye-slash');
            } else {
                password2.setAttribute('type', 'password');
                toggle2.classList.remove('fa-eye-slash');
            }
        }
    </script>




</body>

</html>