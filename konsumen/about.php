<?php
include '../config.php'; 

if(!isset($_SESSION['type']) || $_SESSION['type']!=3){
	echo "<script>window.location=('index.php')</script>";
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>About</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

</head>


<body class="canvas-menu">
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <a class="close-canvas-menu"><i class="fa fa-times"></i></a>
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="../image/LOGO2.png" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Raditya</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                    </div>
                    <div class="logo-element">
                        RH
                    </div>	
                </li>
                <li>
                        <a href="index.php"><i class="fa fa-windows"></i> <span class="nav-label">Beranda</span> </a>
                    </li>
                    <li class="active">
                        <a href="about.php"><i class="fa fa-laptop"></i> <span class="nav-label">About</span></a>
                    </li>    
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="../logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>About</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index-2.html">Home</a>
                        </li>
                        <li class="active">
                            <strong>About</strong>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="wrapper wrapper-content  animated fadeInRight article">
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="ibox">
                            <div class="ibox-content">
                                <div class="pull-right">
                                    <button class="btn btn-white btn-xs" type="button">Model</button>
                                    <button class="btn btn-white btn-xs" type="button">Publishing</button>
                                    <button class="btn btn-white btn-xs" type="button">Modern</button>
                                </div>
                                <div class="text-center article-title">
                                    <span class="text-muted"><i class="fa fa-clock-o"></i></span>
                                    <h1>
                                        Aplikasi Tagihan Kredit
                                    </h1>
									<h3>
                                       PT. Raditya Dewata Perkasa
                                    </h3>
                                </div>
                                <p>
                                    PT. Raditya Dewata Perkasa adalah salah satu perusahaan swasta yang menjual barang elektronik. Perusahaan ini didirikan oleh I Made Sudiana SE pada tanggal ..... <strong>Lorem Ipsum as their default model text</strong>, and a search for 'lorem ipsum' will uncover many web
                                </p>
                                <p>
                                    Aplikasi Tagihan Kredit Berbasis Android ini adalah sebuah aplikasi yang bekerja pada smartphone android dimana aplikasi ini diharapkan bisa membantu dalam hal penagihan kredit pada PT Raditya. 
                                </p>
                                <p>
                                    <i>
                                        Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.
                                    </i>
                                </p>
                                <p>
                                    The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek,
                                </p>
                                <p>
                                    Two driven jocks help fax my big quiz. Quick, Baz, get my woven flax jodhpurs! "Now fax quiz Jack!" my brave ghost pled. Five quacking zephyrs jolt my wax bed. Flummoxed by job, kvetching W. zaps Iraq. Cozy sphinx waves quart jug of bad milk. A very bad quack might jinx zippy fowls. Few quips galvanized the mock jury box. Quick brown dogs jump over the lazy fox. The jay, pig, fox, zebra, and my wolves quack! Blowzy red vixens fight for a quick jump. Joaquin Phoenix was gazed by MTV for luck. A wizard’s job is to vex chumps quickly in fog. Watch "Jeopardy!", Alex Trebek's fun TV quiz game. Woven silk pyjamas exchanged for blue quartz. Brawny gods just
                                </p>
                                <p>
                                    Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack. Quick wafting zephyrs vex bold Jim. Quick zephyrs blow, vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex.
                                </p>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Tags:</h5>
                                        <button class="btn btn-primary btn-xs" type="button">Model</button>
                                        <button class="btn btn-white btn-xs" type="button">Publishing</button>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="small text-right">
                                            <h5>Stats:</h5>
                                            <div> <i class="fa fa-comments-o"> </i> 56 comments </div>
                                            <i class="fa fa-eye"> </i> 144 views
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
             <div class="footer">
                    <div class="pull-right">
                       <strong>@pande</strong>
                    </div>
                    <div>
                        <strong>Copyright</strong> Raditya Hollding Company &copy; 2015-2016
                    </div>
                </div>
            </div> 

        </div>
       

    <!-- Mainly scripts -->
    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>
</body>
</html>
