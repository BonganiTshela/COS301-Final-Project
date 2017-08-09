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
                   <li >
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="tables.php"><i class="fa fa-fw fa-bar-chart-o"></i>Results</a>
                    </li>
                   
                    <li class="active">
                        <a href="benchs.php"><i class="fa fa-fw fa-edit"></i> Benchmark service</a>
                    </li>
                     <li>
                        <a href="tables.php"><i class="fa fa-fw fa-table"></i>Algorithms Benchmarked</a>
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
                        Benchmarking Services for RAM Usage,CPU Time,Heat Generation,Power Consumption.
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="../index.php">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Benchmark
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- /.row -->

                <div class="row-lg-4">
                    <div class="col-lg-12" >
                    Chose the files that you want to benchmark. The service will provide you with RAM usage,CUP Time,Power Consumation and Heat generation of all the algorithm in a graphical representation.<br>
                   
                   <h4 class="lead">Rules:</h4>
                   <ul>
                        <li> Make sure you upload Algorithms together with their Tester main.</li>
                        <li> Do not upload .class or makefile only .java files</li>
                        <li>No files with errors will be allowed</li>
                        <li>Name your testers in the same name with a numberat the end. example Test1.java, Test2.java, Test2.java...</li>
                        <li>Make sure that testers interact with the apropriate algorithm</li>
                        <li>Your can name the algorith anything you want</li>
                    </ul>

                    </div> 
                </div>
                <div class="row-lg-4" >
                    <div class="col-lg-6">
                         <form action="#" method="post" role="form" enctype="multipart/form-data">
                           
                          <!--  <div class="form-group">
                                <label>Copy and Paste your Java Code and your class should be saved as: <b>Algorithm</b>.</label>
                                <textarea class="form-control" name="copy" rows="3"></textarea>
                            </div>-->
                            <!--uploading a file from the machine -->
                            <div class="form-group" >
                                <label>Choose a Java Code from your machine.</label>
                                <input class="btn btn-default" type="file" id="file" name="files[]" multiple="multiple" />
                            </div>
                          
                            <button type="submit" name="submit" class="btn btn-default">Submit</button>
                         
                        </form>

                    </div>
                    
                </div>

                <?php
               
                    $valid_formats = array("java");
                    $max_file_size = 1024*100; //100 kb
                    $path = "uploads/files/"; // Upload directory
                    $count = 0;
                    $message=[];
                    
                    $files = glob('uploads/files/*.java'); // get all file names
                    foreach($files as $file){ // iterate files
                      if(is_file($file))
                        unlink($file); // delete file
                    }

                    if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
                        // Loop $_FILES to exeicute all files
                        foreach ($_FILES['files']['name'] as $f => $name) { 
                        //echo "just ".$name."\n";    
                            if ($_FILES['files']['error'][$f] == 4) {
                                echo "the file has an error";
                                continue; // Skip file if any error found
                            }          
                            if ($_FILES['files']['error'][$f] == 0) {      
                                if ($_FILES['files']['size'][$f] > $max_file_size) {
                                    $message[] = "$name is too large!.".PHP_EOL;
                                    continue; // Skip large files
                                }
                                elseif(!in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats)){
                                    $message[] = "$name is not a valid format.".PHP_EOL;
                                    continue; // Skip invalid file formats
                                }
                                else{ // No error found! Move uploaded files 

                                    if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name))
                                    $count++; // Number of successfully uploaded file
                                }
                            }
                        }

                        $n=sizeof($message);
                        if($n>0){
                            ?>
                            <script type="text/javascript">
                                alert('Some of the files are not in .java format.Please Upload your files again');
                                 window.location.href='benchs.php';
                            </script>
                            <?php
                        
                        }else{
                            ?>
                            <script type="text/javascript">
                                window.location.href='uploads/compile.php';
                            </script>
                            <?php
                            
                        }
                    }
                ?>
   
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
