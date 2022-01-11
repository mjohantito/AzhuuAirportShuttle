<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/search.css" />
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

<span class = "navie">
    <span><a href="/">Home</a></span>
    <span><a href="/about">About Us</a></span>
    <span><a href="/help">Help</a></span>
    <span class="multi-button">
        <a href="/login"><button class="btn1">Login</button></a>
        <a href="/regis"><button class="btn2">Register</button></a>
    </span>
</span>
</div>
<!---------------------------->
        <div class="search">
            <div class="info">
                <div class="infocontent">
                    <div class="infoleft">
                        <i class="fas fa-bus"></i>
                    </div>
                    <div class="inforight">
                        <div><h2>Bus Rute</h2></div>
                        <?php echo e($airport); ?>

                        <i class="far fa-circle"></i>
                        <?php echo e($fromto); ?>

                        <i class="far fa-circle"></i>
                        <?php echo e(date('d/m/Y', strtotime($date))); ?>

                        <i class="far fa-circle"></i>
                        <?php echo e($passanger); ?> passanger
                    </div>
                </div>
            </div>
            <div class="button1">
                <form method="post" action="/home_page">
                <?php echo csrf_field(); ?>
                <button type="submit">Change Search</button>
                </form>
            </div>
            <div class="content">
                <div class="left">
                    <div class="isileft">
                        <div class="bold">Filter<i class="fas fa-filter"></i></div>
                        <div class="bold">PO Bus</div>
                        <form action="/filter/<?php echo e($airport); ?>/<?php echo e($fromto); ?>/<?php echo e($date); ?>/<?php echo e($passanger); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="checkbox">
                                <?php $__currentLoopData = $bus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $daftarbus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $checked = [];
                                    if(isset($_POST['filterbus']))
                                    {
                                        $checked = $_POST['filterbus'];
                                    }
                                ?>
                                <input type="checkbox" name="filterbus[]" value="<?php echo e($daftarbus->POBUS_ID); ?>" <?php if(in_array($daftarbus->POBUS_ID, $checked)): ?> checked <?php endif; ?>><label for="filterbus[]"><?php echo e($daftarbus->POBUS_NAME); ?></label><br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="bold">Departure Time</div>
                            <div class="time">
                                <input type="time" name="appt" <?php if(isset($waktu->appt)): ?> value="<?php echo e($waktu->appt); ?>" <?php else: ?> value="00:00" <?php endif; ?>>
                                <i class="fas fa-long-arrow-alt-right"></i>
                                <input type="time" name="appt2" <?php if(isset($waktu->appt2)): ?> value="<?php echo e($waktu->appt2); ?>" <?php else: ?> value="23:59" <?php endif; ?>>
                            </div>
                            <div class="submit">
                                <input type="submit" value="Search" />
                            </div>
                        </form>
                    </div>
                </div>
                <div class="right">
                    <h4>Showing <?php echo e($posts->count()); ?> Best Rute</h4>
                    <?php if($posts->count()): ?>
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="rute">
                                <div class="kiri">
                                    <div class="judul"><?php echo e($post->POBUS_NAME); ?></div>
                                    <div class="mid">
                                    <div class="waktu"><?php echo e(date('H:i', strtotime($post->RUTE_WAKTUBERANGKAT))); ?></div>
                                    <div class="panah"><?php echo e($post->AIRPORT_ID); ?> <?php echo e(($post->RUTE_FROMTO == 'T') ? 'To' : 'From'); ?> <?php echo e($post->RUTE_HALTE); ?></div>
                                    </div>
                                    <?php echo e($post->V_JENIS); ?>

                                </div>
                                <div class="kanan">
                                    Rp <?php echo e(number_format(($post->RUTE_PRICE),2,',','.')); ?><br/>
                                    Seat Available : 12<br/>
                                    <form method="get" action="/login">
                                        <button type="submit">Select</button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="kosong"><p>No Route Found</p></div>
                    <?php endif; ?>
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
<?php /**PATH C:\xampp8\htdocs\azhuu_shuttle\resources\views/search.blade.php ENDPATH**/ ?>