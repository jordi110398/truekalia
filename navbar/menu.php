<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>

<!--icons tk-->
<?php

include($_SERVER["DOCUMENT_ROOT"] . '/icons/icons.php');
?>
<!-- final icon -->

<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.3.1/css/flag-icon.min.css" rel="stylesheet"/>
<!-- Latest compiled and minified CSS -->

<!--style-->
<link rel="stylesheet" href="../style.css">
<!--icons-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!--js-->
<script src="../navbar/iconosleng.js"></script>
</head>

<header>
  <?php

  include($_SERVER["DOCUMENT_ROOT"] . '/lang.php');
  include ($_SERVER["DOCUMENT_ROOT"] . '/bd/bd.php');
  session_start();

  if (!isset($_GET['len'])) {
      if (isset($_COOKIE['leng'])) {
          $leng = $_COOKIE['leng'];
      } else {
          $leng = 'cat';
      }
  } else {
    $leng = (string)$_GET['len'];
    setcookie('leng', $leng, time() + 60*60*24*30, "/");
}
      include($_SERVER["DOCUMENT_ROOT"] . '/navbar/cookies.php');

      require_once($_SERVER["DOCUMENT_ROOT"] . '/login/config.php');

      $loginURL = $gClient->createAuthUrl();

  if ($_SESSION['usuari']) {
      ?>
    <div class="container-fluid">
    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
        <!-- Brand and toggle get grouped for better mobile display -->
        <button type="button" class="navbar-toggler collapsed" data-toggle="collapse"
        data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span>&#x2630;</button> <a class="navbar-brand"
        href="https://treukalia.cat/index">truekalia</a>
        <!-- Collect the nav links, forms, and other
        content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


            <ul class="nav navbar-nav">
                <li class="dropdown nav-item"> <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $category[$leng]?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="dropdown-item"><a href="index.php"><?php echo $allcategory[$leng]?></a>
                        </li>
                        <li class="divider dropdown-item"></li>
                        <li class="dropdown-item"><a href="../categories.php?id=1"><i class="material-icons">library_books</i><?php echo $book[$leng]?></a>
                        </li>
                        <li class="divider dropdown-item"></li>
                        <li class="dropdown-item"><a href="../categories.php?id=2"><i class="material-icons">brush</i><?php echo $art[$leng]?></a>
                        </li>
                        <li class="divider dropdown-item"></li>
                        <li class="dropdown-item"><a href="../categories.php?id=3"><i class="material-icons">movie</i><?php echo $movies[$leng]?></a>
                        </li>
                        <li class="divider dropdown-item"></li>
                        <li class="dropdown-item"><a href="../categories.php?id=4"><i class="material-icons">motorcycle</i><?php echo $motorcycle[$leng]?></a>
                        </li>
                        <li class="divider dropdown-item"></li>
                        <li class="dropdown-item"><a href="../categories.php?id=5"><i class="material-icons">lightbulb_outline</i><?php echo $electronics[$leng]?></a>
                        </li>
                        <li class="divider dropdown-item"></li>
                        <li class="dropdown-item"><a href="../categories.php?id=6"><i class="material-icons">videogame_asset</i><?php echo $videogame[$leng]?></a>
                        </li>
                        <li class="divider dropdown-item"></li>
                        <li class="dropdown-item"><a href="../categories.php?id=7"><i class="material-icons">healing</i><?php echo $health[$leng]?></a>
                        </li>
                        <li class="divider dropdown-item"></li>
                        <li class="dropdown-item"><a href="../categories.php?id=8"><?php echo $others[$leng]?></a>
                    </li>
            </ul>
            </li>
            </ul>
            <form class="form-inline " action="../busqueda.php" method="GET" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" name="busqueda" placeholder="<?php echo $busqueda[$leng]?>">
                </div>
                <button type="submit" class="btn"><i class="material-icons">search</i></button>
            </form>
            <ul class="nav navbar-nav ml-auto">
              <li>

                <a id="cat" href="?len=cat<?php if ($_GET['id']) { echo "&id="; echo $_GET['id'];  }
                  if ($_GET['email'] && $_GET['usuari']) { echo "&email="; echo $_GET['email']; echo "&usuari="; echo $_GET['usuari']; }

                ?>">
                    <img src="../navbar/img/cat.png" style="max-width:30px;max-height:30px" alt="catalan">
                </a>
                <a id="esp" href="?len=es<?php if ($_GET['id']) {
                    echo "&id=";
                    echo $_GET['id'];
                }if ($_GET['email'] && $_GET['usuari']) { echo "&email="; echo $_GET['email']; echo "&usuari="; echo $_GET['usuari']; }  ?>">
                    <img src="../navbar/img/spain.png" style="max-width:30px;max-height:30px" alt="espa">
                </a>
                <a id="english" href="?len=en<?php if ($_GET['id']) {
                      echo "&id=";
                      echo $_GET['id'];
                      } if ($_GET['email'] && $_GET['usuari']) { echo "&email="; echo $_GET['email']; echo "&usuari="; echo $_GET['usuari']; } ?>">
                    <img src="../navbar/img/english.png" style="max-width:30px;max-height:30px" alt="English">
                </a>
            </li>
            </ul>

     <ul class="nav navbar-nav ml-auto">

     <div class="float-right">
       <ul class="nav float-right">
           <li class="dropdown nav-item mr-5"><a id="nom" href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $benvinguda[$leng]?>, <?php echo  $_SESSION['nom'] ?> <span class="caret"></span></a>
               <ul class="dropdown-menu">
                   <li class="dropdown-item"><a href="/profile/panelcontrol"><i class="material-icons">person_outline</i> <?php echo $perfil[$leng]?></a>
                   </li>
                   <li class="dropdown-item"><a href="../mensajeria/conversacions"><i class="material-icons ">mail_outline</i> <?php echo $missatges[$leng]?></a>
                   </li>

                   <?php
                   if ($_SESSION['email'] == "no-reply@treukalia.cat") {
                       echo "<li>";
                       echo '<li class="dropdown-item"><a href="../admin/adminusuaris"><i class="material-icons">group</i>'.$usuaris[$leng].'</a>';
                       echo "</li>";
                       echo "<li>";
                       echo '<li class="dropdown-item"><a href="../admin/adminproductes"><i class="material-icons">shopping_basket</i></i>'.$productes[$leng].'</a>';
                       echo "</li>";
                   } ?>
                   <li class="dropdown-item"><a href="/productes/formulariproductes"><i class="material-icons">add_circle_outline</i> <?php echo $penja_producte[$leng]?></a>
                   </li>
                   <?php
                   if (isset($_SESSION['google'])) {
                   }else{
                     echo '<li class="dropdown-item"><a href="../login/reset.php?email='.$_SESSION['email'].'&usuari='.$_SESSION['usuari'] .'"><i class="material-icons">vpn_key</i>'. $change_password[$leng].'</a></li>';
                   }
                    ?>

                   <li class="dropdown-item"><a href="/login/logout.php"><i class="material-icons">exit_to_app</i> <?php echo $surt[$leng]?></a>
                   </li>
                  </ul>
              </li>
          </ul>
      </div>

    </ul>
        </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- /.container-fluid -->
    </nav>
  </div>

  <?php
  } else {
      ?>
    <div class="container-fluid">
    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
        <!-- Brand and toggle get grouped for better mobile display -->
        <button type="button" class="navbar-toggler collapsed" data-toggle="collapse"
        data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span>&#x2630;</button> <a class="navbar-brand"
       href="https://treukalia.cat/index">truekalia</a>
        <!-- Collect the nav links, forms, and other
        content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="dropdown nav-item"> <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $category[$leng]?><span class="caret"></span></a>
                  <ul
                  class="dropdown-menu" role="menu">
                      <li class="dropdown-item"><a href="index.php"><?php echo $allcategory[$leng]?></a>
                      </li>
                      <li class="divider dropdown-item"></li>
                      <li class="dropdown-item"><a href="../categories.php?id=1"><i class="material-icons">library_books</i><?php echo $book[$leng]?></a>
                      </li>
                      <li class="divider dropdown-item"></li>
                      <li class="dropdown-item"><a href="../categories.php?id=2"><i class="material-icons">brush</i><?php echo $art[$leng]?></a>
                      </li>
                      <li class="divider dropdown-item"></li>
                      <li class="dropdown-item"><a href="../categories.php?id=3"><i class="material-icons">movie</i><?php echo $movies[$leng]?></a>
                      </li>
                      <li class="divider dropdown-item"></li>
                      <li class="dropdown-item"><a href="../categories.php?id=4"><i class="material-icons">motorcycle</i><?php echo $motorcycle[$leng]?></a>
                      </li>
                      <li class="divider dropdown-item"></li>
                      <li class="dropdown-item"><a href="../categories.php?id=5"><i class="material-icons">lightbulb_outline</i><?php echo $electronics[$leng]?></a>
                      </li>
                      <li class="divider dropdown-item"></li>
                      <li class="dropdown-item"><a href="../categories.php?id=6"><i class="material-icons">videogame_asset</i><?php echo $videogame[$leng]?></a>
                      </li>
                      <li class="divider dropdown-item"></li>
                      <li class="dropdown-item"><a href="../categories.php?id=7"><i class="material-icons">healing</i><?php echo $health[$leng]?></a>
                      </li>
                      <li class="divider dropdown-item"></li>
                      <li class="dropdown-item"><a href="../categories.php?id=8"><?php echo $others[$leng]?></a></li>
          </ul>
          </li>
            </ul>

            <form class="form-inline " action="../busqueda.php" method="GET" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" name="busqueda" placeholder="<?php echo $busqueda[$leng]?>">
                </div>
                <button type="submit" class="btn"><i class="material-icons">search</i></button>
            </form>

            <ul class="nav navbar-nav ml-auto">
              <li>

                <a id="cat" href="?len=cat<?php if ($_GET['id']) {
          echo "&id=";
          echo $_GET['id'];
      } ?>">
                    <img src="../navbar/img/cat.png" style="max-width:30px;max-height:30px" alt="catalan">
                </a>
                <a id="esp" href="?len=es<?php if ($_GET['id']) {
          echo "&id=";
          echo $_GET['id'];
      } ?>">
                    <img src="../navbar/img/spain.png" style="max-width:30px;max-height:30px" alt="espa">
                </a>
                <a id="english" href="?len=en<?php if ($_GET['id']) {
          echo "&id=";
          echo $_GET['id'];
      } ?>">
                    <img src="../navbar/img/english.png" style="max-width:30px;max-height:30px" alt="English">
                </a>
            </li>

            </ul>

            <ul class="nav navbar-nav ml-auto">


              <p class="navbar-text"><?php echo $compte[$leng]?></p>

              <li class="dropdown nav-item"> <a href="#" class="dropdown-toggle nav-link " data-toggle="dropdown"><b><?php echo $inicia[$leng]?></b> <span class="caret"></span></a>
                <ul id="login-dp" class="dropdown-menu  dropdown-menu-right float-xs-left">
                    <li class="dropdown-item">
                        <div class="row">
                            <div class="col-lg-12"><?php echo $inici[$leng]?>
                                <div class="social-buttons">	<a href="<?php echo $loginURL ?>" class="btn btn-google"><i class="fa fa-google"></i> Google</a>

                                </div><?php echo $inici_credencials[$leng] ?>
                                <!-- start PHP code -->
                                <?php

      if (isset($_SESSION['logeado'])) {
      } else {
          if (isset($_POST['usuari']) && !empty($_POST['usuari']) and isset($_POST['contrasenya']) && !empty($_POST['contrasenya'])) {
              $usuari = mysql_escape_string($_POST['usuari']);
              $password = mysql_escape_string(md5($_POST['contrasenya']));

              $search = mysql_query("SELECT * FROM usuaris WHERE usuari='".$usuari."' AND password='".$password."'") or die(mysql_error());
              $match  = mysql_num_rows($search);
              $row = mysql_fetch_array($search);

              if ($match > 0 && $row['active']=="1") {
                  session_start();
                  if (empty($row['nom']) || empty($row['cognom']) ||empty($row['ciutat']) || empty($row['interesos'])) {
                      $_SESSION['incomplet'] = "SI";
                  }
                  $_SESSION['idusuari'] = $row['idusuari'] ;
                  $_SESSION['img_perfil'] = $row['img_perfil'] ;
                  $_SESSION['usuari'] = $row['usuari'] ;
                  $_SESSION['nom'] = $row['nom'] ;
                  $_SESSION['cognom'] = $row['cognom'] ;
                  $_SESSION['ciutat'] = $row['ciutat'] ;
                  $_SESSION['email'] = $row['email'] ;
                  $_SESSION['interesos'] = $row['interesos'] ;
                  $_SESSION['logeado'] = 'SI';
                  header("Location: ../index.php");

              // Set cookie / Start Session / Start Download etc...
              } elseif ($row['active']=="0") {
                  $search = mysql_query("SELECT * FROM usuaris WHERE usuari='".$usuari."' AND password='".$password."'") or die(mysql_error());
                  $row = mysql_fetch_array($search);

                  header("Location: ../login/verify.php?usuari=".$usuari."&hash=".$row['hash']);
              } else {
                  $errorLogin = "si";
              }
          }
      } ?>
                                <!-- stop PHP Code -->

                                <form class="form" role="form" method="post" action="" accept-charset="UTF-8" id="login-nav">

                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmail2">Correu Electrònic</label>
                                        <input type="text" class="form-control" id="email" name="usuari"
                                        placeholder="<?php echo $usuari[$leng] ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputPassword2">Password</label>
                                        <input type="password" class="form-control" name="contrasenya" id="password"
                                        placeholder="<?php echo $contrassenya_registre[$leng] ?>" required>
                                        <?php if (isset($errorLogin)):
                                          echo '<div class="alert alert-danger mt-2">';
                                          echo '<strong>Error! </strong>'.$error_login[$leng];
                                          echo '</div>';
                                          endif; ?>

                                        <div class="form-text text-xs-right ml-5"><a href="../login/forgot.php"><?php echo $clau_oblidada[$leng] ?></a>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block"><?php echo $inicia[$leng] ?></button>
                                    </div>
                            </form>
                            </div>
                            <div class="bottom text-xs-center ml-5"><a href="https://treukalia.cat/login/login"><b><?php echo $nou_usuari[$leng] ?></b></a>
                            </div>
                        </div>
                    </li>
        </ul>
        </li>
            </ul>

        </div>
        <!-- /.navbar-collapse -->
        <!-- /.container-fluid -->
    </nav>
  </div>
  <?php
  }
  ?>

  </header>
