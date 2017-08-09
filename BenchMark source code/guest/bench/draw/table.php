
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
                <a class="navbar-brand" href="../index.php">Pro Benchmarking Table</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               <li class="dropdown">
                    <a href="../login/index.html" class=""><i class="fa fa-fw fa-power-off"></i>Sign In</a>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="../../bench.php"><i class="fa fa-fw fa-edit"></i>Benchmark service</a>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-fw fa-edit"></i>Results</a>
                    </li>
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row-lg-8">
                <h2>Results Table</h2>
                <div class="col-lg-6">
                <p>The following table is a summary of the bench marking results of all the algorithms</p>  
                  <?php

                        $hostdb = "localhost";  // MySQl host
                        $userdb = "root";  // MySQL username
                        $passdb = "";  // MySQL password
                        $namedb = "final_project";  // MySQL database name

                        $dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);

                        if ($dbhandle->connect_error) {
                        exit("There was an error with your connection: ".$dbhandle->connect_error);
                        }
                        ?>

                        <script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>

                        <?php

                        $strQuery = "SELECT * FROM temp";
                        $result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
                       
                        /**********to draw the runtime graph results**********/
                        if($result){
                            
                        ?>
                           <div class="table table-striped">          
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th>Name</th>
                                    <th>Run Time</th>
                                    <th>RAM Usage</th>
                                    <th>Processor</th>
                                    <th>CPU Load</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php 
                                while($row = mysqli_fetch_array($result)){
                                    ?>
                                  <tr>
                                    <td><?php echo $row[0];?></td>
                                    <td><?php echo $row[1];?></td>
                                    <td><?php echo $row[2];?></td>
                                    <td><?php echo $row[3];?></td>
                                    <td><?php echo $row[4];?></td>
                                  </tr>
                                  <?php }?>
                                </tbody>
                              </table>
                             </div>
                        <?php
                            $dbhandle->close();
                        }

                        ?>

                        <p>To see graphical representation of the results click the button you want to view in a graph form</p>
                        <div class="btn-group">
                            <a href="graphs/runtime.php" type="button" class="btn btn-primary">Run Time</a>
                            <a href="graphs/ram.php" type="button" class="btn btn-primary">RAM Usage</a>
                            <a href="graphs/pro.php" type="button" class="btn btn-primary">Processor</a>
                            <a href="graphs/cpu.php" type="button" class="btn btn-primary">CPU Load</a>
                        </div>
                   
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
