<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepages</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

  <!------------------ header ----------s--------------------------->


<!-----logo----->
<span class = "logo">
<img src="images/azhuu.png">
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


<!-------------->



  <!------------------ search box -------------------------------------->

<div class = "searchbox">
    <form method="post" id="frmHome" action="/cari_data">
        <?php echo csrf_field(); ?>
        <div class="content">
            <div class = "inputbox">
                <p>Airport</p>
                <select name="airport" class="box1">
                    <?php $__currentLoopData = $bandara; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $air): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($air->AIRPORT_ID); ?>"><?php echo e($air->AIRPORT_NAME); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class = "inputbox">
                <p>From/To</p>
                <select name="fromto" class="box2">
                    <?php $__currentLoopData = $ft; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($fto->RUTE_HALTE); ?>"><?php echo e($fto->RUTE_HALTE); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class = "inputbox">
                <p>Date</p>
                <input type="date" name="date" class="box3" min="2022-01-10" required/>
            </div>
            <div class = "inputbox">
                <p>Passanger</p>
                <select name="passanger" class="box4">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>

            <div class = "inputbox1">
                <br>
                <input type="submit" value="Find">
            </div>
        </div>
    </form>
</div>
<!---------------------------------------------------------->


<span class = "bg">
<img src="images\bg3.png">
</span>
<span class = "sponsor">
<img src="images\image 3.png">
<img src="images\image 4.png">
</span>
<footer>
    <span class="glyphicon glyphicon-phone"></span>
    <span>Call Center:o82314223<br>
    <span class="glyphicon glyphicon-envelope"></span>
    <span href="mailto:hege@example.com">Email:hege@example.com</span></span>
    <br>
    <br>
  </footer>
</body>
</html>
<?php /**PATH C:\xampp8\htdocs\azhuu_shuttle\resources\views/homelogin.blade.php ENDPATH**/ ?>