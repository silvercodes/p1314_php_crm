<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Registration</title>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-7 col-sm-9">
            <div class="mb-4 mt-3 text-center">
                <img src="img/logo.png" alt="logo" width="120">
            </div>

            <div class="card shadow p-1 mt-5 bg-white rounded">
                <div class="card-body p-2">
                    <div class="card-title mb-4 text-center text-success">Registration</div>

                    <form action="/registration" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input name="username" type="text" class="form-control" id="username">

                            <label for="email" class="form-label">Email address</label>
                            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

                            <label for="pass" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="pass">

                            <label for="c_pass" class="form-label">Confirm password</label>
                            <input name="c_password" type="password" class="form-control" id="c_pass">

                            <button class="btn btn-outline-primary mt-4" type="submit">Save</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>