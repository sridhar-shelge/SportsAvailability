<?php
    require_once "pdo.php";
    session_start();

    if ( isset($_POST['cancel']) ) {
        header('Location: WelcomePage.php');
        return;
    }

    


    if ( isset($_POST['name']) && isset($_POST['college']) && isset($_POST['year']) && isset($_POST['phone']) && isset($_POST['roll']) && 
        isset($_POST['accept']) && isset($_POST['accept']) ) {

        if (empty($_FILES["Id"]["name"])) {
            $_SESSION['error']='Id cannot be empty';
            header("Location:gymregister.php");
            return;
        }

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["Id"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["Id"]["tmp_name"]);
      if($check !== false) {
        $uploadOk = 1;
      } else {
        $uploadOk = 0;
      }

        // Check file size
        if ($_FILES["Id"]["size"] > 2097152) {
          $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
          $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $_SESSION['error']='error in uploading file';
        } else {
          if (move_uploaded_file($_FILES["Id"]["tmp_name"], $target_file)) {

          } else {
           
          }
        }

        $stmt = $pdo->prepare('INSERT INTO gym_registration
        (name,college,year,roll_number,registered_for,Phone,college_id) VALUES (:name,:college,:year,:roll_number,:registered_for,:phone,:college_id)');
        $stmt->execute(array(
        ':name' => htmlentities($_POST['name']),
        ':year' => htmlentities($_POST['year']),
        ':college' => htmlentities($_POST['college']),
        ':roll_number' => htmlentities($_POST['roll']),
        ':registered_for' => htmlentities($_POST['gym'])." ".htmlentities($_POST['badminton']),
        ':phone' => htmlentities($_POST['phone']),
        ':college_id' => basename( $_FILES["Id"]["name"])
        ));

        $_SESSION['success'] = "Record added.";
        header("Location: WelcomePage.php");
        return;
    }


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
    <link rel="stylesheet" type="text/css" href="css/home.css">

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
                        <a class="nav-link" href="#">Upcoming Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gym Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sports Availability</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">Admin</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
  <body>
    <div class="container">
        <strong><?php
            if ( isset($_SESSION['error']) ) {
                echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
                unset($_SESSION['error']);
            }
            ?>
            <?php
            if ( isset($_SESSION['success']) ) {
                echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
                unset($_SESSION['success']);
            }
            ?>
        </strong>
        <form method="post" action="gymregister.php" enctype="multipart/form-data">
            <div class="row justify-content-around" style="padding-bottom: 15px;">
                <div class="col-11 col-md-5">
                    <div class="row">
                        <label for="name">Name</label>
                    </div>
                    <div class="row">
                        <input class="form-control" type="text" name="name">
                    </div>
                </div>
                <div class="col-11 col-md-5">
                    <div class="row">
                        <label for="name">College</label>
                    </div>
                    <div class="row">
                        <select class="form-control" id="college" name="college" type="text">
                            <option value="choose">CHOOSE</option>
                            <option value="CBIT">CBIT</option>
                            <option value="MGIT">MGIT</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row justify-content-around" style="padding-bottom: 15px;">
                <div class="col-11 col-md-5">
                    <div class="row">
                        <label for="name">Year</label>
                    </div>
                    <div class="row">
                        <input class="form-control" type="text" name="year">
                    </div>
                </div>
                <div class="col-11 col-md-5">
                    <div class="row">
                        <label for="name">Phone Number</label>
                    </div>
                    <div class="row">
                        <input class="form-control" type="text" name="phone">
                    </div>
                </div>
            </div>
            <div class="row justify-content-around" style="padding-bottom: 15px;">
                <div class="col-11 col-md-5">
                    <div class="row">
                        <label for="name">Roll Number</label>
                    </div>
                    <div class="row">
                        <input class="form-control" type="text" name="roll">
                    </div>
                </div>
                <div class="col-11 col-md-5">
                    <div class="row">
                        <label for="prescription">Upload Id</label>
                    </div>
                    <div class="row">
                        <input class="form-control" id="Id" name="Id" type="file">
                    </div>
                </div>
            </div>
            <div class="row justify-content-around" style="padding-bottom: 15px;">
                <div class="col-11">
                    <div class="row">
                        <label for="roll">Register For</label>
                    </div>
                    <div class="col-11">
                        <div class="row">
                            <input class="form-check-input" type="checkbox" id="gym" name="gym" value="gym">
                            <label class="form-check-label" for="gym">GYM</label>
                        </div>
                        <div class="row">
                            <input class="form-check-input" type="checkbox" name="badminton" id="badminton" value="badminton">
                            <label class="form-check-label" for="badminton">BADMINTON</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-around" style="padding-bottom: 15px;">
                <div class="col-11">
                    <div class="row">
                        <label for="roll">ACCEPTING TERMS AND CONDITIONS</label>
                    </div>
                    <input class="form-check-input" type="checkbox" name="accept" id="accept" value="accept">
                    <label class="form-check-label" for="accept">ACCEPT</label>
                </div>
            </div>
            <div class="row justify-content-around">
                <div class="col-3">
                    <input id="submit" type="submit" name="submit" class="form-control btn btn-success" value="Submit">
                </div>
                <div class="col-3">
                    <input type="submit" id="cancel" name="cancel" class="form-control btn btn-danger" value="Cancel">
                </div>
            </div>
        </form>
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

  </body>
</html>
