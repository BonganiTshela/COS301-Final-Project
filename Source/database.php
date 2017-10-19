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

  $sql="CREATE TABLE IF NOT EXISTS userProfiles
      (userid INT PRIMARY KEY AUTO_INCREMENT,
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

  
  $sql2 ="CREATE TABLE IF NOT EXISTS results
    (userid INT NOT NULL,
      Algoname           CHAR(50)    NOT NULL,
      CPU      float(5)    NOT NULL,
      RAM       float(5)     NOT NULL,
      ELASPED        float(5),
      POWER       float(5),
      HEAT        float(5)
      );";

     $ret=mysqli_query($con,$sql2);
   if(!$ret) {
      ?>
       <script >
         alert('Error: Could not create results Table');
          window.location.href='index.php';
      </script>
      <?php
   }
   
    /*$sql4=" ALTER TABLE results
    ADD CONSTRAINT fk_userid
    FOREIGN KEY IF NOT EXISTS (userid) 
    REFERENCES userProfiles(userid);";
    $ret=mysqli_query($con,$sql4);
   if(!$ret) {
      ?>
       <script >
         alert('Error: Could not add FOREIGN KEY to results Table');
          window.location.href='index.php';
      </script>
      <?php
   }*/

   $sql3 ="CREATE TABLE IF NOT EXISTS temp
    (Algoname           CHAR(50)    NOT NULL,
      CPU        float(5)    NOT NULL,
      RAM       float(5)     NOT NULL,
      ELASPED        float(5),
      POWER       float(5),
      HEAT        float(5)
      );";

     $ret=mysqli_query($con,$sql3);
   if(!$ret) {
      ?>
       <script >
         alert('Error: Could not create temp Table');
          window.location.href='index.php';
      </script>
      <?php
     
   }

   mysqli_close($con);
?>