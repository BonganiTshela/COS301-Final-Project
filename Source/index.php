<?php

include('database.php');

?>

<!DOCTYPE html>

<html lang="">

<head>
<title>Pro-Benchmarning</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">

<div class="wrapper row0" >
  <div id="topbar" class="hoc clear" > 
    <ul>
      <li><a href="#"><i class="fa fa-lg fa-github"></i></a></li>
      <li><a href="#"><i class="fa fa-lg fa-home"></i></a></li>
      <li><a href="user/login/index.html" title="Login"><i class="fa fa-lg fa-sign-in"></i></a></li>
      <li><a href="user/login/index.html" title="Sign Up"><i class="fa fa-lg fa-edit"></i></a></li>
    </ul>
  </div>
</div>
<div class="bgded" style="background-image:url('kbg.jpg');"> 
  <!-- ################################################################################################ -->
  <div class="wrapper row2">
    <nav id="mainav" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <ul class="clear">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="#about">About System</a></li>
        <li><a class="drop" href="#team">Developers</a>
          <ul>
            <li><a href="#bongs">Bongani Tshela</a></li>
            <li><a href="#joseph">Joseph Letsoalo</a></li>
            <li><a href="#minal">Minal Pramlall</a></li>
            <li><a href="#phill">Haris Lreshaba</a></li>
          </ul>
        </li>
        <li><a class="drop" href="#services">Services</a>
          <ul>
            <li><a href="#cpu">CUP Time</a></li>
            <li><a  href="#ram">RAM Usage</a></li>
            <li><a href="#heat">Heat Generation</a></li>
            <li><a href="#power">Power Consumption</a></li>
          </ul>
        </li>
        
      </ul>
      <!-- ################################################################################################ -->
    </nav>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper overlay">
    <article id="pageintro" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <h3 class="heading">Pro-BenchMarking</h3>
      <p>Know your Algorithm</p>
      <footer><a class="btn" href="guest/bench.php">Start BenchMarking</a></footer>
      <!-- ################################################################################################ -->
    </article>
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div id="about" class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="group">
      <div class="col-lg-12">
        <h6 class="heading">About Pro-BenchMarking</h6>
        <p>
        Micro benchmark is a benchmark designed to measure the performance of a very small and specific piece of algorithm.
        This system test perfomance and how much resource that an algorithm uses,it tests CPU time, RAM usage, heat generation and Power consumption.<br><br>
        The systems uses:<ul>
          <li>
            OSV operating System
          </li>
          <li>Bare metal Machine</li>
        </ul>
        <br>
        User can chose which machine to use and bench mark thier algorithms and compare perfomance, store the results, and export the results to pdf.
        </p>
       
        
      </div>
     
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div id="team" class="wrapper bgded" style="background-image:url('kbg.jpg');">
  <div class="hoc split clear">
    <section> 
      <!-- ################################################################################################ -->
      <h2 class="heading">Team Members</h2>
      <p class="btmspace-50">The following are the member of the team [ProCoders] who developed the system.</p>
      <ul class="nospace group elements">
        <li>
          <article id="bongs"><a href="#"><i class="fa fa-wpexplorer"></i></a>
            <h6 class="heading">Bongani Tshela</h6>
            <p>Computer Science.</p>
           
          </article>
        </li>
        <li>
          <article id="joseph"><a href="#"><i class="fa fa-eye-slash"></i></a>
            <h6 class="heading">Joseph Letsoalo</h6>
            <p>Computer Science.</p>
       
          </article>
        </li>
        <li>
          <article id="minal"><a href="#"><i class="fa fa-eye-slash"></i></a>
            <h6 class="heading">Minal Pramlall</h6>
            <p>Information Technology.</p>
           
          </article>
        </li>
        <li>
          <article id="phill"><a href="#"><i class="fa fa-eye-slash"></i></a>
            <h6 class="heading">Harris Leshaba</h6>
            <p>Information Technology.</p>
            
          </article>
        </li>
      </ul>
      <!-- ################################################################################################ -->
    </section>
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<div class="wrapper row3">
  <section id="services" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <h6 class="heading">Services Pro-BenchMarking Offers</h6>
      <p>The following are the services we offer [The services we benchmark]</p>
    </div>
    <ul class="nospace group elements">
      <li class="one_third first">
        <article id="cpu"><a href="#"><i class="fa fa-desktop"></i></a>
          <h6 class="heading">CPU Time</h6>
          <p>The total execution time.</p>
          
        </article>
      </li>
      <li class="one_third">
        <article id="ram"><a href="#"><i class="fa fa-microchip"></i></a>
          <h6 class="heading">RAM Usage</h6>
          <p>The amount of ram memory your algorithm uses.</p>
          
        </article>
      </li>
      
      <li class="one_third first">
        <article id="heat"><a href="#"><i class="fa fa-thermometer-half"></i></a>
          <h6 class="heading">Heat Generation</h6>
          <p>The amount of heat your algorithm produces.</p>
          
        </article>
      </li>
      <li class="one_third">
        <article id="power"><a href="#"><i class="fa fa-battery-2"></i></a>
          <h6 class="heading">Power Consumption</h6>
          <p>The amount of power [battery usage] your algoruthm uses.</p>
          
        </article>
      </li>
         </ul>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved - <a href="#">Pro-Benchmarking.com</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>