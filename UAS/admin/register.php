<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style  type="text/css">
        body {
            background-image: url('https://i.pinimg.com/564x/a8/7c/2a/a87c2a8a7d0d407fca200d576009e56f.jpg');
            padding: 0;
            margin: 0;
        }
        .login-page {
            width: 100%;
            padding: 85px 0px 0px 0px;
            margin: auto;
        }
        .container {
            position: relative;
            z-index: 1;
            background: #F7F7F5;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 35px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
            border-radius: 15px;
        }
    </style>
</head>
<body>
    <div class="login-page">
        <div class="container">
            <form action="register_action.php" method="POST" autocomplete="off">
                <h5>Selamat Datang di <strong>Bopu</strong> Cell</h5>
                <h6>Silakan buat akun terlebih dahulu</h6>
                <br>
                <div class="col-sm-12">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="Username" name="Username" placeholder="Username" autofocus required>
                        <label for="floatingInput">Username</label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="Password" name="Password" placeholder="Password" required minlength="4" maxlength="8">
                        <label for="floatingInput">Password</label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="NamaLengkap" name="NamaLengkap" placeholder="NamaLengkap" required>
                        <label for="floatingInput">Nama Lengkap</label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" id="Nohp" name="Nohp" placeholder="Nomor Handphone" required>
                        <label for="floatingInput">Nomor Handphone</label>
                    </div>
                </div>
                <br>
                <button class="btn btn-outline-primary">Register</button><br><br>
            </form>
        </div>
    </div>
   
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>