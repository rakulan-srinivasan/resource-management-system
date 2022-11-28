<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style_1.css">

</head>
<body>
<?php
      if(!isset($_SESSION)) 
      { 
          session_start(); 
          if(!isset($_SESSION["uname"])) {
            header("Location: Login.php");
            exit(); 
          }
      } 
?>
<?php include("Header.php");?>
<p class="username">
  Welcome: <?php echo $_SESSION["uname"]; ?>
  <a href="logout.php">Logout</a>
<div class="navbar">
    <a href="Home.php">Home</a>
    <a href="selectproject.php">Assign Allocation</a>
    <a href="selectproject.php">View Allocation</a>
    
</p>
</div>


<hr>
<br>
</body>
