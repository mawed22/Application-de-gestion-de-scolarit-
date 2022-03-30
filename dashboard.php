<?php
include("php/dbconnect.php");
include("php/checklogin.php");
@$_SESSION['title']='dashboard';

  /*$count=$conn->prepare("SELECT count(id) as cpt FROM student");
  $count->setFetchMode(PDO::FETCH_ASSOC);
  $count->execute();
  $nbrestudent=$count->fetchAll();*/

$sql = "SELECT count(id) as cpt FROM student";
$tpq = $conn->query($sql);
$tpr = $tpq->fetch_assoc();

$sql = "SELECT count(id) as cpt FROM student where balance=0";
$tpq = $conn->query($sql);
$tpr2 = $tpq->fetch_assoc();

$sql = "SELECT count(id) as cpt FROM branch";
$tpq = $conn->query($sql);
$tpr3 = $tpq->fetch_assoc();

$sql = "SELECT sexe, count(*) as number FROM student GROUP BY sexe";
$tpr4 = $conn->query($sql);
//$tpr3 = $tpq->fetch_assoc();

?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GESTEDUC | <?php echo $_SESSION['title']; ?></title>
    <!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!--script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script-->
     <script type="text/javascript" src="js/charts.js"></script>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart()
        {
            var data = google.visualization.arrayToDataTable([
                 ['Sexe', 'Number'],
                 <?php
                    while($row = mysqli_fetch_array($tpr4))
                    {
                        echo "['".$row["sexe"]."', ".$row["number"]."],";
                    }
                  ?>
                ]);
            var options = {
                title: 'Statistique étudiants Masculin / Féminin',
                is3D:true
            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);

        }
    </script>

</head>
<?php
include("php/header.php");
?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">TABLEAU DE BORD</h1>
                        <h2 style="text-align:center;"> Bienvenue sur<strong> GestEduc</strong> </h2>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
				
				  <div class="col-md-4">
                        <div class="main-box mb-blue">
                            <a href="#">
                                <i class="fa fa-users fa-5x"></i>
                                <h5><span style="font-size:30px;"><?php echo $tpr['cpt'];?></span> Etudiant(s) inscrit(s) </h5>
                            </a>
                        </div>
                    </div>
				

					
                    <div class="col-md-4">
                        <div class="main-box mb-green">
                            <a href="#">
                                <i class="fa fa-usd fa-5x"></i>
                                <h5><span style="font-size:30px;"><?php echo $tpr2['cpt'];?></span> Etudiant(s) solvable(s) </h5>
                            </a>
                        </div>
                    </div>
					
					
					 <div class="col-md-4">
                        <div class="main-box mb-orange">
                            <a href="#">
                                <i class="fa fa-university fa-5x"></i>
                                <h5><span style="font-size:30px;"><?php echo $tpr3['cpt'];?></span> Filière(s) </h5>
                            </a>
                        </div>
                    </div>
                  
                  <div class="col-md-4">
                        <div id="piechart" style="width: 520px; height: 300px;">


                        </div>
                    </div>

                </div>
                <!-- /. ROW  -->

            
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

     <?php include('php/footer.php'); ?>

   <script src="js/jquery-1.10.2.js"></script>	
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="js/custom1.js"></script>
    



</body>
</html>
