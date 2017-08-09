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

    <title>Pro-Benchmarking</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

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
                <a class="navbar-brand" href="index.php">Pro Benchmarking Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               
                
                <li class="dropdown">
                    <a href="../login/index.html"><i class="fa fa-user"></i><?php echo $name; echo " ".$last?><b class="caret"></b></a>
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
                            Input Java Code
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Benchmark
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- /.row -->
                <?php 
                $num=0;
                $ram=$cpu=$power=$heat=$execution=false;
                    if($_SERVER["REQUEST_METHOD"]=="POST"){
                        if($_POST["number"]<=0){
                            ?>
                            <script type="text/javascript">
                                alert('number of ALGOTHIMS cannot be less than 0');
                                window.location.href='bench.php';
                            </script><?php

                        }
                        else{
                            $num=$_POST["number"];
                            
                            if(isset($_POST['ram'])){
                                $ram=true;
                            }
                            if(isset($_POST['cpu'])){
                                $cpu=true;
                            }
                            if(isset($_POST['power'])){
                                $power=true;
                            }
                             if(isset($_POST['heat'])){
                                $heat=true;
                            }
                            if(isset($_POST['execution'])){
                                $execution=true;
                            }
                        }
                    for($x=0;$x<$num;$x++){
                ?>
                <div class="row-lg-6">
         
                    <div class="col-lg-6">

                        <form role="form">

                            <div class="form-group">
                                <label>Copy and Paste your Java Code.</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                
                               
                            </div>

                            <div class="form-group">
                                <label>Choose a Java Code from your machine.</label>
                                <!--input type="file"-->
                                <input type="file" class="btn btn-default">

                            </div>
                         
                        </form>

                    </div>
                    
                </div>
              
                <?php
                  }
                }
                ?>
                <!-- /.row -->
                  <div class="row-lg-12">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Input Test Main
                        </h1>
                        <form action="charts.php" method="post" role="form">

                            <div class="form-group">
                                <label>Copy and Paste your Test Main.</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                
                               
                            </div>

                            <div class="form-group">
                                <label>Choose a Java Code from your machine.</label>
                                <!--input type="file"-->
                                <input type="file" class="btn btn-default">

                            </div>
                            <button type="submit" class="btn btn-default">Submit Code</button>
                         
                        </form>

                    </div>
                    
                </div>
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

</body>

</html>
