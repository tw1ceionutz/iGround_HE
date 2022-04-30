<?php
$page = $_SERVER['PHP_SELF'];
$sec = "3";
?>
<?php

// Initialize the session
session_start();

// verificam daca user-ul este logat, iar, daca nu, il redirectionam la pagina  de login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
#include('iground/index.html');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>iGround page</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="fontawesome/css/all.min.css" rel="stylesheet" />
    <link href="css/templatemo-diagoona.css" rel="stylesheet" />

</head>

<body>
    <div class="tm-container">        
        <div>
            <div class="tm-row pt-4">
                <div class="tm-col-left">
                    <div class="tm-site-header media">
                        <i class="fas fa-lightbulb fa-3x mt-1 tm-logo"></i>
                        <div class="media-body">
                            <h1 class="tm-sitename">iGround</h1>
                            <p class="tm-slogon">We are all Earth</p>
                        </div>        
                    </div>
                </div>
                <div class="tm-col-right">
                    <nav class="navbar navbar-expand-lg" id="tm-main-nav">
                        <button class="navbar-toggler toggler-example mr-0 ml-auto" type="button" 
                            data-toggle="collapse" data-target="#navbar-nav" 
                            aria-controls="navbar-nav" aria-expanded="false" aria-label="Toggle navigation">
                            <span><i class="fas fa-bars"></i></span>
                        </button>
                        <div class="collapse navbar-collapse tm-nav" id="navbar-nav">
                            <ul class="navbar-nav text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="irig.php">Irigatie</a>
                                </li>

                                <li class="nav-item active">
                                    <a class="nav-link tm-nav-link" href="wol.php">Wake-on-lan<span class="sr-only">(current)</span></a>
                                </li>
				                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="contact.php">Contact</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="../logout.php">Log out</a>
                                </li>
                            </ul>                            
                        </div>                        
                    </nav>
                </div>
            </div>
            
            <div class="tm-row">
                <div class="tm-col-left"></div>
                <main class="tm-col-right">
                    <section class="tm-content">
                    <meta http-equiv="refresh" content="10;../iground/wol.php">
                        <h2 class="mb-5 tm-content-title">Automatizare Wake-on-lan:</h2>
                        <?php
                        include('Net/SSH2.php');
                         $ssh = new Net_SSH2('192.168.0.1');
                         if (!$ssh->login('ionutz', 'ionut1439')) {
                            exit('Login Failed index.php');
                         }
                         $rez =  $ssh->exec('/ip arp print');
                         file_put_contents('../wol_script/arp.txt',$rez);
                         $out1 = shell_exec('cat ../wol_script/arp.txt | grep -i "58:20:b1:41:b4:ab" | cut -d " " -f2');
                         # $match = preg_grep('58', $rez );
                         #echo "<pre>$rez</pre>";
                         #echo "<pre>Match: $out1</pre>";
                         $output = $out1;
                         echo "Status Wake on lan se verifica din nou la fiecare 10 secunde <br> ";
                            #echo "<pre>Output: $output</pre>";
                            echo strlen($output);
                            $test = " DC ";
                            if (strlen($output) <= 2) {
                            $link = "<br><a href=../wol_script/wolon.php?view=1><img src=\"../wol_script/off.png\"  width=\"200\" height=\"180\" alt=\"Calculator Inchis\" /></a>";
                            echo "Inchis:".$link;
                            }
                            if (strlen($output) >  2) {
                                $link = "<br><a href=../wol_script/woloff.php?view=1><img src=\"../wol_script/on.png\"  width=\"200\" height=\"180\" alt=\"Calculator Deschis\" /></a>";
                                echo "Deschis:".$link;
                            }
                            #phpinfo(INFO_ENVIRONMENT|INFO_VARIABLES);
                        ?>
                        <a href="../wol_script/arp.txt" class="btn btn-primary">Wake on lan details</a>
                    </section>
                </main>
            </div>
        </div>        

        <div class="tm-row">
            <div class="tm-col-left text-center">            
                <ul class="tm-bg-controls-wrapper">
                    <li class="tm-bg-control active" data-id="0"></li>
                    <li class="tm-bg-control" data-id="1"></li>
                    <li class="tm-bg-control" data-id="2"></li>
                </ul>            
            </div>        
            <div class="tm-col-right tm-col-footer">
                <footer class="tm-site-footer text-right">
                    <p class="mb-0">Copyright 2022 iGround.me
                    
                    | Design: <a rel="nofollow" target="_parent" href="https://iground.me" class="tm-text-link">iGround</a></p>
                </footer>
            </div>  
        </div>        

        <!-- Diagonal background design -->
        <div class="tm-bg">
            <div class="tm-bg-left"></div>
            <div class="tm-bg-right"></div>
        </div>
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.backstretch.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>

</html>