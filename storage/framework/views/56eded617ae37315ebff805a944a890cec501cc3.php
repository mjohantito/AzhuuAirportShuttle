<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/editprofil.css" />
    <script src="https://kit.fontawesome.com/af325f8c09.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  </head>
  <body>
<!------------------ header ----------s--------------------------->

<div class="header">
<!-----logo----->
<span class = "logo">
    <img src="/images/azhuu.png">
</span>
<!-------------->



<!-----navigasi----->

<ul class = "navie">
    <li><a href="/">Home</a></li>
    <li><a href="/about">About Us</a></li>
    <li><a href="/help">Help</a></li>
    <li><a href="/myorder">My Order</a></li>
    <li><i class="material-icons">person</i>
        <ul class="sub">
            <li><a href="/edit">Edit Profil</a></li>
            <li><a href="/logout">Log Out</a></li>
        </ul>
    </li>
</ul>
</div>
<a href="/">
    <div class="back-btn">
        <i class="fas fa-arrow-circle-left"></i>
    </div>
    </a>
<!---------------------------->
        <div class="content">
            <div class="main">
                    <div class="kiri">
                        <div class="judul">Update Profil</div>
                        <form method="post" action="/save">
                            <?php echo csrf_field(); ?>
                            <label>Email</label><br/>
                            <input type="email" name="email" value="<?php echo e($data[0]->USER_EMAIL); ?>" disabled /><br/>
                            <label>Nama</label><br/>
                            <input type="text" name="nama" value="<?php echo e($data[0]->USER_NAME); ?>"/><br/>
                            <label>No Telp</label><br/>
                            <input type="tel" id="phone" name="telp" pattern="[0-9]{4}[0-9]{4}[0-9]{4}" value="0<?php echo e($data[0]->USER_TELP); ?>"/><br/>
                            <input type="submit" value="Save" class="submit" />
                        </form>
                    </div>
                    <div class="kanan">
                        <div class="judul">Update Password</div>
                        <form method="post" action="/update">
                            <?php echo csrf_field(); ?>
                            <label>Current Password</label><br/>
                            <input type="password" name="curpass" required /><br/>
                            <label>New Password</label><br/>
                            <input type="password" name="newpass" required /><br/>
                            <label>Confirm Password</label><br/>
                            <input type="password" name="conpass" required /><br/>
                            <input type="submit" value="Update" class="submit" />
                        </form>
                    </div>
                    <?php if($errors->any()): ?>
                        <div class="alert">
                            <h4><?php echo e($errors->first()); ?></h4>
                        </div>
                    <?php endif; ?>
                    <?php if(session('alert')): ?>
                        <div class="alerts">
                            <h4><?php echo e(session('alert')); ?></h4>
                        </div>
                    <?php endif; ?>
            </div>
        </div>
  </body>
  <span class = "logo2">
    <img src="/images/azhuu.png">
    </span>
    <footer>
      <span class="glyphicon glyphicon-phone"></span>
      <span>Call Center:o82314223<br>
      <span class="glyphicon glyphicon-envelope"></span>
      <span href="mailto:hege@example.com">Email:hege@example.com</span></span>
    </footer>
    <br>
</html>
<?php /**PATH C:\xampp8\htdocs\azhuu_shuttle\resources\views/editprofil.blade.php ENDPATH**/ ?>