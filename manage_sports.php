<?php
    require_once "pdo.php";
    session_start();

    if ( !isset($_SESSION["admin_id"]) ) {
        die('ACCESS DENIED');
    }

    if(isset($_POST['sport_id']) && isset($_POST['add']) ){
        $available=$_POST['availability']+1;
        if($available>10){
            $_SESSION['error']="cannot be More than 10";
            header("location:manage_sports.php");
            return;
        }
        $stmt=$pdo->prepare('UPDATE sports_availability SET availability=:available WHERE sport_id=:sport_id');
        $stmt->execute(array(
            ":available"=>$available,
            ":sport_id"=>$_POST['sport_id']
        ));
        $_SESSION['success']="Altered Availability";
        header("location:manage_sports.php");
        return;
    }

    if(isset($_POST['rm_sport_id']) && isset($_POST['remove']) ){
        $available=$_POST['availability']-1;
        if($available<0){
            $_SESSION['error']="cannot be less than Zero";
            header("location:manage_sports.php");
            return;
        }
        $stmt=$pdo->prepare('UPDATE sports_availability SET availability=:available WHERE sport_id=:sport_id');
        $stmt->execute(array(
            ":available"=>$available,
            ":sport_id"=>$_POST['sport_id']
        ));
        $_SESSION['success']="Altered Availability";
        header("location:manage_sports.php");
        return;
    }

?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> 
        <script src="mindmup-editabletable.js"></script>
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    </head>
    <body>
        <header>
        <nav class="navbar  navbar-expand-md navbar-dark" id="navigation" >
            <img src="" >
           
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-content">
                <ul class="navbar-nav ml-auto" align="right">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Manage Upcoming Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminpage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gym_registered.php">Gym Registered Users</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container" id="booking-list">
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
        <table class="table table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Sport_Id</th>
                    <th scope="col">Sport Name</th>
                    <th scope="col">Availability</th>
                    <th scope="col">Add One</th>
                    <th scope="col">Remove One</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stmt = $pdo->query("SELECT * from sports_availability");
                    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                        echo "<tr><td>";
                        echo(htmlentities($row['sport_id']));
                        echo("</td><td>");
                        echo(htmlentities($row['sport_name']));
                        echo("</td><td>");
                        echo(htmlentities($row['availability']));
                        echo("</td><td>");
                        echo('<a href="add.php?sport_id='.$row['sport_id'].'">ADD</a> ');
                        echo("</td><td>");
                        echo('<a href="remove.php?sport_id='.$row['sport_id'].'">REMOVE</a>');
                        echo("</td></tr>");
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>