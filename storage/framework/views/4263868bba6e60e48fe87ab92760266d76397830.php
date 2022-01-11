<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/regis.css" >
    <script src="https://kit.fontawesome.com/af325f8c09.js" crossorigin="anonymous"></script>
    <title>Halaman Register</title>
</head>
<body>
    <div class="register">
        <img src="images/azhuu.png"/>
        <div class="profil">
            <i class="far fa-user-circle"></i><br/>
            <h4>Log In</h4>
        </div>
        <div class="line"></div>
        <div class="register-content">
            <img src="images/azhuu.png"/>
            <h2>Registrasi</h2>
            <form method="post" id="frmRegis" action="#">
                <div class="fields">
                    <div class="field email">
                        <h3>Email</h3><br/>
                        <input type="email" name="email" placeholder="Example@mail.com" required />
                    </div>
                    <div class="field nama">
                        <h3>Nama</h3><br/>
                        <input required type="text" name="nama" id="txtNama" placeholder="Jocelyn Leora" />
                    </div>
                    <div class="field pass">
                        <h3>Password</h3><br/>
                        <input required type="password" name="pass" id="txtPass" placeholder="**********" />
                    </div>
                    <div class="field tgl">
                        <h3>Tanggal Lahir</h3><br/>
                        <input type="date" name="tgl_lhr" />
                    </div>
                    <div class="field no">
                        <h3>No. Telp</h3><br/>
                        input type="number" name="nomer" />
                    </div>
                    <div class="submit">
                        <input type="submit" value="Register" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp8\htdocs\azhuu_shuttle\resources\views/register.blade.php ENDPATH**/ ?>