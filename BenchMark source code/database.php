<?php
session_start();

  $con=mysqli_connect("localhost","root","")or die("could not connet to mysql");
  if(!$con) {
    ?>
    <script >
       alert('Error : Unable to open database');
        window.location.href='index.php';
    </script>
    <?php
  } 

  if(!mysqli_select_db($con,'final_project')){
   ?>
    <script >
       alert('Error : Unable to connect to database');
        window.location.href='index.php';
    </script>
    <?php
  }

  $sql ="
      CREATE TABLE IF NOT EXISTS userProfiles
      (userid int  AUTO_INCREMENT,
      NAME           CHAR(50)    NOT NULL,
      LASTNAME       CHAR(50)     NOT NULL,
      EMAIL        CHAR(50) NOT NULL,
      PASSWORD       CHAR(50) NOT NULL
      );";

  $ret=mysqli_query($con,$sql);
   if(!$ret) {
      ?>
       <script >
         alert('Error: Could not create userProfiles Table');
          window.location.href='index.php';
      </script>
      <?php
     
   } 

   $sqle ="
      CREATE TABLE IF NOT EXISTS files
      (userid INT	NOT NULL,
      algoName varchar,
      CPU        INT    NOT NULL,
      RAM       INT     NOT NULL,
      ELASPED        INT,
      POWER       INT,
      HEAT        INT,
	  testid	INT,
	  benchmarkid	INT	NOT NULL AUTO_INCREMENT,
	  PRIMARY KEY (benchmarkid)
      );";

     $ret=mysqli_query($con,$sqle);
   if(!$ret) {
      ?>
       <script >
         alert('Error: Could not create files Table');
          window.location.href='index.php';
      </script>
      <?php
     
   }
  
   mysqli_close($con);
?>
