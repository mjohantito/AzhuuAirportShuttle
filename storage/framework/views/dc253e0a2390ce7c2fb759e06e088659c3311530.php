<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | Airport Shuttle</title>
    <link rel="stylesheet" href="css/forgotpassword.css">
    <script src="https://kit.fontawesome.com/af325f8c09.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="back-btn">
        <i class="fas fa-arrow-circle-left"></i>
    </div>
    <div class="ConfirmEmail">
        <form method="post" id="forgotPassword" action="/newpass">
            <?php echo csrf_field(); ?>
            <div class ="fields">
                <img src="images/azhuu.png"/>
                <h2>Email Confirmation</h2>
                <h3>Email</h3>
                <div class="fieldemail">
                    <input type="email" name="email" placeholder="Example@mail.com" required/>
                </div>
                <div class="continue">
                    <input type="submit" value="CONTINUE"/>
                </div>
            </div>
        </form>
        <?php if($errors->any()): ?>
        <div class="alert">
            <h3><?php echo e($errors->first()); ?></h3>
        </div>
        <?php endif; ?>
    </div>

</body>
</html>
<?php /**PATH C:\xampp8\htdocs\azhuu_shuttle\resources\views/forgotPassword.blade.php ENDPATH**/ ?>