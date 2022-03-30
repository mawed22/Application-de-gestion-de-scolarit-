
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">GestEduc</a>
            </div>

        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <!--li>
                        < <div class="user-img-div">
                            <img src="img/user.png" class="img-thumbnail" />

                            <div class="inner-text">
                                <!?php echo $_SESSION['rainbow_name'];?>
                            <br />
                               
                            </div>
                        </div>

                    </li-->


                    <li>
                        <a <?php if(isset($_SESSION['title']) and $_SESSION['title']=='dashboard'){echo 'class="active-menu"';} ?>  href="dashboard.php"><i class="fa fa-dashboard "></i>Tableau de bord</a>
                    </li>
					
					 <li>
                        <a  <?php if(isset($_SESSION['title']) and $_SESSION['title']=='branch'){echo 'class="active-menu"';} ?> href="branch.php"><i class="fa fa-university "></i>Filière</a>
                    </li>
					
					 <li>
                        <a <?php if(isset($_SESSION['title']) and $_SESSION['title']=='student'){echo 'class="active-menu"';} ?> href="student.php"><i class="fa fa-users "></i>Etudiants</a>
                    </li>
					<li>
                        <a <?php if(isset($_SESSION['title']) and $_SESSION['title']=='fees'){echo 'class="active-menu"';} ?> href="fees.php"><i class="fa fa-usd "></i>Etudiants Insolvables</a>
                    </li>
					 <li>
                        <a <?php if(isset($_SESSION['title']) and $_SESSION['title']=='report'){echo 'class="active-menu"';} ?> href="report.php"><i class="fa fa-file-text "></i>Scolarité </a>
                    </li>
					
					<li>
                        <a <?php if(isset($_SESSION['title']) and $_SESSION['title']=='setting'){echo 'class="active-menu"';} ?> href="setting.php"><i class="fa fa-cogs "></i>Paramètres</a>
                    </li>
					
					 <li>
                        <a href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-power-off "></i>Déconnexion</a>
                    </li>
					
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->


         <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Prêt à partir ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Voulez-vous vraiment vous déconnecter ?</div>
        <div class="modal-footer">
            <a class="btn btn-primary" href="logout.php">Oui</a>
          <button class="btn btn-danger" type="button" data-dismiss="modal">Non</button>
        </div>
      </div>
    </div>
  </div>



