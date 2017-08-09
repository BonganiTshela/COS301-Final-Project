<?php
    session_start();
    $name=$_SESSION['username'];
    $last=$_SESSION['lastname'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pro-Benchmarking Results</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Pro Benchmarking Guest User</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
              <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $name; echo " ".$last?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="destroy.php"><i class="fa fa-fw fa-power-off"></i>Log out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                   <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="tables.php"><i class="fa fa-fw fa-bar-chart-o"></i>Results</a>
                    </li>
                   
                    <li>
                        <a href="benchs.php"><i class="fa fa-fw fa-edit"></i> Benchmark service</a>
                    </li>
                     <li>
                        <a href="tables.php"><i class="fa fa-fw fa-table"></i>Algorithsm Benchmarked</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Results
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="../index.html">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> Results
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Flot Charts -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Flot Charts</h2>
                        <p class="lead">The result are as flows for the services you have requested for <b>Bubble sort</b>:
                        <ol>
                            <li>RAM usage:<b>4.48 Mb</b></li>
                            <li>CPU Time:<b>3.58 sec</b> </li>
                            <li>Power Consumtion:<b>3.58 Watts</b></li>
                        </ol>
                        <p class="lead">The result are as flows for the services you have requested for <b>Radix sort</b>:
                        <ol>
                            <li>RAM usage:<b>3.48 Mb</b></li>
                            <li>CPU Time:<b>2.03 sec</b> </li>
                            <li>Power Consumtion:<b>4.01 Watts</b></li>
                        </ol>
                        <p class="lead">The result are as flows for the services you have requested for <b>Com sort</b>:
                        <ol>
                            <li>RAM usage:<b>4.01 Mb</b></li>
                            <li>CPU Time:<b>3.08 sec</b> </li>
                            <li>Power Consumtion:<b>3.58 Watts</b></li>
                        </ol>
                    </div>
                </div>
                
                <!-- /.row -->
                <!-- Morris Charts -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Graphical Representation</h2>
                        <p class="lead">The following is the graphical representation of the results from of the comparizon of the algorithms </p>
                    </div> 
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Area Line Graph Example with Tooltips</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-area-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

             <!--   <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Donut Chart Example</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-donut-chart"></div>
                                <div class="text-right">
                                    <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Line Graph Example with Tooltips</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-line-chart"></div>
                                <div class="text-right">
                                    <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Bar Graph Example</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-bar-chart"></div>
                                <div class="text-right">
                                    <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

    <!-- Flot Charts JavaScript -->
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/flot-data.js"></script>

</body>

</html>
