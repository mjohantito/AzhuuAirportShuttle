<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/search2.css" />
    <script src="https://kit.fontawesome.com/af325f8c09.js" crossorigin="anonymous"></script>
  </head>
  <body>
        <nav>
            <div class="logo">
                <img src="images/azhuu.png"/>
            </div>
            <ul class="menu">
                <li><a href="#">HOME</a></li>
                <li><a href="#">ABOUT US</a></li>
                <li><a href="#">HELP</a></li>
            </ul>
            <ul class="menub">
                <li><a href="#">MY ORDER</a></li>
                <li><a href="#">ACCOUNT</a>
                    <div class="sub-menu-1">
                        <ul>
                            <li><a href="#">EDIT ACCOUNT</a></li>
                            <li><a href="#">LOGOUT</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="search">
            <div class="info">
                <div class="infocontent">
                    <div class="infoleft">
                        <i class="fas fa-bus"></i>
                    </div>
                    <div class="inforight">
                        <div><h2>Bus Rute</h2></div>
                        Halim Perdana Kusuma(HLP)
                        <i class="fas fa-arrow-right"></i>
                        Monas
                        <i class="far fa-circle"></i>
                        Mon, 18 Oct 2021
                        <i class="far fa-circle"></i>
                        2 Passanger
                        <i class="far fa-circle"></i>
                        Economy
                    </div>
                </div>
            </div>
            <div class="button1">
                <button type="button">Change Search</button>
            </div>
            <div class="content">
                <div class="left">
                    <div class="reset">Reset</div>
                    <div class="isileft">
                        <div class="bold">Filter<i class="fas fa-filter"></i></div>
                        <div class="bold">PO Bus</div>
                        <div class="checkbox">
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Harapan Jaya"><label for="vehicle1">Harapan Jaya</label><br>
                            <input type="checkbox" id="vehicle2" name="vehicle2" value="399 Trans"><label for="vehicle2">399 Trans</label><br>
                            <input type="checkbox" id="vehicle3" name="vehicle3" value="Suroboyo Bus"><label for="vehicle3">Suroboyo Bus</label><br>
                            <input type="checkbox" id="vehicle4" name="vehicle4" value="Damri"><label for="vehicle4">Damri</label><br>
                            <input type="checkbox" id="vehicle5" name="vehicle5" value="Santoso"><label for="vehicle5">Santoso</label><br>
                            <input type="checkbox" id="vehicle6" name="vehicle6" value="Sugeng Rahayu"><label for="vehicle6">Sugeng Rahayu</label><br>
                        </div>
                        <div class="bold">Departure Time</div>
                        <div class="time">
                            <input type="time" id="appt" name="appt">
                            <i class="fas fa-arrow-right"></i>
                            <input type="time" id="appt" name="appt">
                        </div>
                    </div>
                </div>
                <div class="right">
                    <h4>Showing 0 Best Rute</h4>
                        <div class="rute">
                            <img src="images/azhuu.png"/>
                            <div class="tengah">
                                Harapan Jaya<br/>
                                14:00<br/>
                                HLP <i class="fas fa-arrow-right"></i> Monas<br/>
                                Single Decker Bus
                            </div>
                            <div class="kanan">
                                Rp 24.000,-<br/>
                                Seat Available : 12<br/>
                                <button>Select</button>
                            </div>
                        </div>
                        <div class="rute">
                            <img src="images/azhuu.png"/>
                            <div class="tengah">
                                Harapan Jaya<br/>
                                14:00<br/>
                                HLP <i class="fas fa-arrow-right"></i> Monas<br/>
                                Single Decker Bus
                            </div>
                            <div class="kanan">
                                Rp 24.000,-<br/>
                                Seat Available : 12<br/>
                                <button>Select</button>
                            </div>
                        </div>
                        <div class="rute">
                            <img src="images/azhuu.png"/>
                            <div class="tengah">
                                Harapan Jaya<br/>
                                14:00<br/>
                                HLP <i class="fas fa-arrow-right"></i> Monas<br/>
                                Single Decker Bus
                            </div>
                            <div class="kanan">
                                Rp 24.000,-<br/>
                                Seat Available : 12<br/>
                                <button>Select</button>
                            </div>
                        </div>
                    <div class="page">
                        <div class="pagination">
                            <button>1</button>
                            <button>2</button>
                            <button>3</button>
                            <button>4</button>
                            <button>5</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </body>
</html>
<?php /**PATH C:\xampp8\htdocs\azhuu_shuttle\resources\views/search2.blade.php ENDPATH**/ ?>