<?php
    require_once "pdo.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <title>Sports Page</title>
  </head>
  <header>
        <nav class="navbar  navbar-expand-md navbar-dark" id="navigation" >
            <img src="" >
           
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-content">
                <ul class="navbar-nav ml-auto" align="right">
                    <li class="nav-item">
                        <a class="nav-link" href="WelcomePage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gymregister.php">Gym Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sports.php">Sports Availability</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="admin.php">Admin</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="images/tt.jpg" class="img-fluid">
                        <h3>Table Tennis</h3>
                        <?php
                            $stmt=$pdo->prepare('SELECT * from sports_availability 
                                WHERE sport_name=:sport_name');
                            $stmt->execute(array(
                                ":sport_name"=>'table tenis'
                            ));
                            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                                echo('<p style="text-align:center; ">AVAILABLE:');
                                echo(htmlentities($row['availability']));
                                echo('</p>');
                            } 
                        ?>
                    </div>
                    
                </div>
                
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="images/badminton.jpg" class="img-fluid">
                        <h3>Badminton</h3>
                    </div>
                    <?php
                            $stmt=$pdo->prepare('SELECT * from sports_availability 
                                WHERE sport_name=:sport_name');
                            $stmt->execute(array(
                                ":sport_name"=>'badminton'
                            ));
                            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                                echo('<p style="text-align:center; ">AVAILABLE:');
                                echo(htmlentities($row['availability']));
                                echo('</p>');
                            } 
                        ?>
                </div>
                
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="images/carrom.jpg" class="img-fluid ">
                         <h3>Carrom</h3>
                        <?php
                            $stmt=$pdo->prepare('SELECT * from sports_availability 
                                WHERE sport_name=:sport_name');
                            $stmt->execute(array(
                                ":sport_name"=>'carroms'
                            ));
                            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                                echo('<p style="text-align:center; ">AVAILABLE:');
                                echo(htmlentities($row['availability']));
                                echo('</p>');
                            } 
                        ?>
                    </div>
                    
                </div>
                
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="images/chess.jpg" class="img-fluid">
                         <h3>Chess</h3>
                        <?php
                            $stmt=$pdo->prepare('SELECT * from sports_availability 
                                WHERE sport_name=:sport_name');
                            $stmt->execute(array(
                                ":sport_name"=>'chess'
                            ));
                            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                                echo('<p style="text-align:center; ">AVAILABLE:');
                                echo(htmlentities($row['availability']));
                                echo('</p>');
                            } 
                        ?>
                    </div>
                    
                </div>                
            </div>
            
        </div>

        <div class="row" style="margin-top: 60px;">
             <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="images/volleyball.jpg" class="img-fluid">
                         <h3>Volleyball</h3>   
                         <?php
                            $stmt=$pdo->prepare('SELECT * from sports_availability 
                                WHERE sport_name=:sport_name');
                            $stmt->execute(array(
                                ":sport_name"=>'volleyball'
                            ));
                            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                                echo('<p style="text-align:center; ">AVAILABLE:');
                                echo(htmlentities($row['availability']));
                                echo('</p>');
                            } 
                        ?> 
                    </div>    
                </div>
             </div>

             <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="images/football.jpg" class="img-fluid">
                         <h3>Football</h3>
                         <?php
                            $stmt=$pdo->prepare('SELECT * from sports_availability 
                                WHERE sport_name=:sport_name');
                            $stmt->execute(array(
                                ":sport_name"=>'football'
                            ));
                            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                                echo('<p style="text-align:center; ">AVAILABLE:');
                                echo(htmlentities($row['availability']));
                                echo('</p>');
                            } 
                        ?>    
                    </div>    
                </div>
             </div>

             <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="images/basketball.jpg" class="img-fluid">
                         <h3>Basketball</h3>
                         <?php
                            $stmt=$pdo->prepare('SELECT * from sports_availability 
                                WHERE sport_name=:sport_name');
                            $stmt->execute(array(
                                ":sport_name"=>'basketball'
                            ));
                            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                                echo('<p style="text-align:center; ">AVAILABLE:');
                                echo(htmlentities($row['availability']));
                                echo('</p>');
                            } 
                        ?>    
                    </div>    
                </div>
             </div>

             <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="images/cricket.jpg" class="img-fluid">
                         <h3>Cricket</h3>
                         <?php
                            $stmt=$pdo->prepare('SELECT * from sports_availability 
                                WHERE sport_name=:sport_name');
                            $stmt->execute(array(
                                ":sport_name"=>'cricket'
                            ));
                            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                                echo('<p style="text-align:center; ">AVAILABLE:');
                                echo(htmlentities($row['availability']));
                                echo('</p>');
                            } 
                        ?>    
                    </div>    
                </div>
             </div>

        </div>
                
    </div>

      



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
     <footer id="footer">
      <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-6 col-xs-11">
                <h2>Address</h2>
                <p>Gandipet, Hyderabad, Telangana,500075</p>
                <h2>College Contact Info</h2>
                <p>Phone: 040-24193276</p>
                <p>Mobile: 8466997201</p>
                <p>Email: principal@cbit.ac.in</p>   
            </div>
            <div class="col-md-6 col-xs-11" id="links">
                <h2>Contact Us at</h2>
                <ul>
                    <li>
                        <a href="ttps://www.instagram.com/cbithyderabad/" ><i class="fa fa-2x fa-facebook-square" style="color: #3b5998;"></i> Facebook</a></li>

                    <li>
                        
                        <a href="https://www.instagram.com/cbithyderabad/" style="color: black;"><i class="fa fa-2x fa-instagram"></i> Instagram</a></li>

                    <li>
                        <a href="https://twitter.com/CBIThyd" ><i class="fa fa-2x fa-twitter-square" style="color: #1da1f2"></i> Twitter</a></li>

                    <li>
                        <a href="https://www.youtube.com/channel/UCqKD0-_EhmdN4nqhuyHFiDQ" ><i class="fa fa-2x fa-youtube-square" style="color:#c4302b"></i> Youtube</a></li>
                </ul>
            </div>             
        </div>
    </div>
  </footer> 

  </body>
</html>