<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/regis.css">
    <title>Registrasi</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/af325f8c09.js" crossorigin="anonymous"></script>
</head>
<body>
    <section class="registration-section">

        <div class="header">
            <span class="logo">
                <img src="/images/azhuu.png" alt="" width="50%">
            </span>

            <span class="login">
                <div class="login-details">
                    <a href="/login">
                        <div class="icon-login">
                            <i class='bx bx-user-circle'></i>
                        </div>
                        <div class="login-text">Log In</div>
                    </a>
                </div>
            </span>
        </div>

        <br><br><br><br><br><br><br><hr>

        <a href="/">
            <div class="back-button">
                <i class="fas fa-arrow-circle-left"></i>
            </div>
        </a>

        <div class="registration-content">
            <span class="pict">
              <img class="foto" src="/images/pict2.png" alt="" width="30%">
            </span>

            <span class="registration-text">
                <div class="judul">
                    <img src="/images/azhuu.png" alt="" width="70%">
                    <h1>Registrasi</h1>
                </div>
                <form method="post" id="frmRegis" action="/register_data">
                    <?php echo csrf_field(); ?>
                    <div class="kiri">
                        <p>
                            <label>Email</label>
                            <div class="field email">
                                <input type="email" name="email" placeholder="example@gmail.com" required />
                            </div>
                        </p>
                        <p>
                            <label>Tanggal Lahir</label>
                            <div class="field tgl">
                                <input type="date" name="tanggal" required />
                            </div>
                        </p>
                        <p>
                            <label>No Telp</label>
                            <div class="field tlp">
                                <input type="tel" id="phone" name="telp" pattern="[0-9]{4}[0-9]{4}[0-9]{4}" placeholder="081*********" required/>

                            </div>
                        </p>
                    </div>
                    <div class="kanan">
                        <p>
                            <label>Nama</label>
                            <div class="field nama">
                                <input type="text" name="nama" placeholder="Jocelyn Leora" required />
                            </div>
                        </p>
                        <p>
                            <label>Password</label>
                            <div class="field password">
                                <input type="password" name="password" placeholder="Password" required />
                            </div>
                        </p>
                        <p>
                            <label>no. KTP</label>
                            <div class="field ktp">
                                <input type="text" name="nik" required />
                            </div>
                        </p>
                    </div>
                    <div class="button-register">
                        <input type="submit" value="Daftar" />
                    </div>
                </form>
                <?php if($errors->any()): ?>
                <div class="alert">
                    <h3><?php echo e($errors->first()); ?></h3>
                </div>
            <?php endif; ?>
          </span>
        </div>

    </section>
</body>
</html>
<?php /**PATH C:\xampp8\htdocs\azhuu_shuttle\resources\views/regis.blade.php ENDPATH**/ ?>