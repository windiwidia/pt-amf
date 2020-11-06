<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Verify account</title>
</head>
<style>

</style>

<body>
    <div class="card text-center border-success mb-3">
        <div class="card-header">
            <h2>Email Confirmation</h2>
        </div>
        <div class="card-body text-success">
            <h5 class="card-title">Hi</h5>
            <p class="card-text">You have successfully created AMF account.</p>
            <p>Please click on the link below to verify your email address and complete your registration.</p>
            <a href="#" class="btn btn-primary">Verify email address</a>
            <p>Please click on the link below to verify your email address and complete your registration.<p>' . '<br><br>' . 'Click this link to verify your account : <a href="' . base_url() . '/auth/verify?email=' .
                    $this->request->getVar('email') . '&token=' . urlencode($token) . '">Activate</a>
        </div>
        <div class="card-footer text-muted">
            Thank You
        </div>
    </div>
</body>

</html>