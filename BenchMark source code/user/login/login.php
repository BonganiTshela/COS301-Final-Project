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


   $name=$lastname=$email=$password="";

  function test_input($data){
    $data=trim($data);
    $data=stripcslashes($data);
    $data=htmlspecialchars($data);
    return $data;
  }
   if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email=test_input($_POST["email"]);
    $pass=test_input($_POST["pass"]);
    $password = trim($pass);
    $password = md5($password);
    
}

  $sql="SELECT * from userProfiles WHERE email='$email' AND password='$password'";

  $ret=mysqli_query($con,$sql);
  if(!$ret){
      ?>
       <script >
         alert('Error: Could not create files Table');
          window.location.href='index.php';
      </script>
      <?php
     
   }
  else if(mysqli_num_rows($ret)>0){
     
      $row = mysqli_fetch_row($ret);
    
      $_SESSION['username']=$row[1];
      $_SESSION['lastname']=$row[2];
    ?>
    <script >
      alert('Welcome '+<?php echo $row[1]; ?>);
    </script>
  <?php
   header("Location: ../dash/index.php");
  }
  else{
   ?>
       <script >
          alert('Email/Password is incorrect');
          window.location.href='index.html';
      </script>
      <?php
  
  }
  mysqli_close($con);
?>