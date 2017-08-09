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

    /***validation****/
    $name=test_input($_POST["name"]);
    $last=test_input($_POST["last"]);
    $email=test_input($_POST["email"]);
    $pass=test_input($_POST["pass"]);

}

/************validation of email************/
  function valid_email($email) 
  {
    if(is_array($email) || is_numeric($email) || is_bool($email) || is_float($email) || is_file($email) || is_dir($email) || is_int($email))
        return false;
    else
    {
        $email=trim(strtolower($email));
        if(filter_var($email, FILTER_VALIDATE_EMAIL)===true) return $email;
        else
        {
            $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
            return (preg_match($pattern, $email) === 1) ? $email : false;
        }
    }
}
if(!valid_email($email)){
  echo "just checking";
}
    /*************** done ******/

    
/***checking if the user already exist***/
  $sql1 ="SELECT * from userProfiles WHERE email='$email'";

  $ret1=mysqli_query($con,$sql1);
   if(!$ret1) {
    ?>
       <script >
        alert('Error: Could not create files Table');
        window.location.href='index.php';
      </script>
    <?php
   } 
 if(mysqli_num_rows($ret1)>0){
      ?>
       <script >
        alert('User email already exist');
        window.location.href='index.html';
      </script>
      <?php
       //header("Location: index.html");
  }/****done**/

else{
    $password = trim($pass);
    $password = md5($password);
    $act=generateRandomString();
    $now="false";

    $sql ="INSERT INTO userProfiles (NAME,LASTNAME,EMAIL,PASSWORD)
      VALUES ('$name','$last', '$email','$password')";

     $ret=mysqli_query($con,$sql);
     if(!$ret) {
        ?>
         <script >
          alert('failed to add user');
            //window.location.href='index.html';
        </script>
        <?php
        header("Location: index.html");
       
     }else{

        sendEmail($email,$act,$name);
        $_SESSION['username']=$name;
        $_SESSION['lastname']=$last;
        $_SESSION['email']= $email;
       ?>
         <script >
           alert('Activate account '+<?php echo $name ?>);
        </script>
        <?php
        // header("Location: activate.php");
        header("Location: ../dash/index.php");
     } 
 }
  mysqli_close($con);
?>