<?php
    `del *.class`;
    $command = '"C:\Program Files\Java\jdk1.8.0_131\bin\javac.exe" files\*.java 2>&1';
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
                <a class="navbar-brand" href="../index.php">Pro Benchmarking Guest User</a>
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
                        <a href="bench.php"><i class="fa fa-fw fa-edit"></i>Benchmark service</a>
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
                                <i class="fa fa-home"></i>  <a href="../index.php">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> Results
                            </li>
                        </ol>
                         <div class="form-group">
                            <label><?php 
                                echo passthru($command, $err); 
                                if ($err) {
                                    echo "<br>Compilation contains errors";
                                }
                                else {
                                       //deleting all current the files in temp folder
                                    $fil1 = glob('../bench/temp/*'); // get all file names
                                    foreach($fil1 as $file){ // iterate files
                                      if(is_file($file))
                                        unlink($file); // delete file
                                    }

                                    $files = scandir("files");

                                    // Identify directories
                                    $source = "files/";
                                    $destination = "../bench/benchmarking/";
                                    $dest2="../bench/temp/";

                                    // Cycle through all source files
                                    foreach ( $files as $file ) {
                                        if (in_array($file, array(".",".."))) continue;

                                        // If we copied this successfully, mark it for deletion
                                        if (copy($source.$file, $destination.$file)) {
                                            $delete[] = $source.$file;
                                        }
                                        if (copy($source.$file, $dest2.$file)) {
                                            $delete[] = $source.$file;
                                        }
                                    }
                                    $fil = glob('../bench/temp/*.class'); // get all file names
                                    foreach($fil as $file){ // iterate files
                                      if(is_file($file))
                                        unlink($file); // delete file
                                    }
                                ?>
                                <script>
                                    alert('Compilation completed without any errors');
                                    window.location.href='../bench/compile.php';
                                </script>
                                <?php
                               
                                }
                             ?></label>
                                    
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Flot Charts -->
                <div class="row">
                  <a href="../benchs.php" class="btn btn-info" role="button">Back</a>
                
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

    

    <!-- Flot Charts JavaScript -->
   

</body>

</html>
