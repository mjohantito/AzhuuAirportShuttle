<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/checkout.css" />
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
            <div class="kiri">
                <div class="atas">
                    <?php echo e($posts[0]->POBUS_NAME); ?><br/>
                    <?php echo e(date('H:i', strtotime($posts[0]->RUTE_WAKTUBERANGKAT))); ?><br/>
                    <?php echo e($posts[0]->AIRPORT_ID); ?> <?php echo e(($posts[0]->RUTE_FROMTO == 'T') ? 'To' : 'From'); ?> <?php echo e($posts[0]->RUTE_HALTE); ?><br/>
                    <?php echo e($posts[0]->V_JENIS); ?><br/>
                </div>
            </div>
            <div class="kanan">
                <div class="left">
                    <div class="isi1">
                        <div class="bold" >Booker Name :</div>
                        <?php echo e($ambildata[0]->USER_NAME); ?><br/>
                        <div class="bold" >Booker Email :</div>
                        <?php echo e($ambildata[0]->USER_EMAIL); ?><br/>
                        <br/>
                        <div class="bold" >Passanger :</div>
                            <?php for($i = 1; $i <= $passanger; $i++): ?>
                                <?php echo e($i); ?>. <?php echo e($nama[$i]); ?> - <?php echo e($id[$i]); ?><br/>
                            <?php endfor; ?>
                        <br/>
                        <div class="bold" >Payment Method :</div>
                        <?php echo e($request->pmethod); ?>

                    </div>
                </div>
                <div class="right">
                    <div class="isi2">
                        <div class="bold" >Cost :</div>
                        <?php echo e($passanger); ?> Passanger &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;   :  <?php echo e(($posts[0]->RUTE_PRICE)*$passanger); ?><br/>
                        Tax (10%) &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;   : <?php echo e(($posts[0]->RUTE_PRICE)*$passanger/10); ?>

                        <div class="total">
                            Total :<br/>
                            <div class="bold"> Rp <?php echo e(number_format(((($posts[0]->RUTE_PRICE)*$passanger)+(($posts[0]->RUTE_PRICE)*$passanger/10)),2,',','.')); ?></div>
                        </div>
                        <form action="/insert/<?php echo e($posts[0]->RUTE_ID); ?>/<?php echo e($date); ?>/<?php echo e(((($posts[0]->RUTE_PRICE)*$passanger)+(($posts[0]->RUTE_PRICE)*$passanger/10))); ?>/<?php echo e(serialize($nama)); ?>/<?php echo e(serialize($id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="submit" value="Pay" class="submit"/>
                        </form>
                    </div>
                </div>
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
<?php /**PATH C:\xampp8\htdocs\azhuu_shuttle\resources\views/checkout.blade.php ENDPATH**/ ?>