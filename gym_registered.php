<?php
    require_once "pdo.php";
    session_start();

    if ( !isset($_SESSION["admin_id"]) ) {
        die('ACCESS DENIED');
    }
    
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
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
                        <a class="nav-link" href="manage_sports.php">Manage Sports Availability</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
        <div class="container" id="booking-list">
            <table class="table table-responsive-lg">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">User_Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">College</th>
                        <th scope="col">Year</th>
                        <th scope="col">Registered For</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Roll Number</th>
                        <th scope="col">College Id</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $stmt = $pdo->query("SELECT * from gym_registration");
                        while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                            echo "<tr><td>";
                            echo(htmlentities($row['user_id']));
                            echo("</td><td>");
                            echo(htmlentities($row['name']));
                            echo("</td><td>");
                            echo(htmlentities($row['college']));
                            echo("</td><td>");
                            echo(htmlentities($row['year']));
                            echo("</td><td>");
                            echo(htmlentities($row['registered_for']));
                            echo("</td><td>");
                            echo(htmlentities($row['phone']));
                            echo("</td><td>");
                            echo(htmlentities($row['roll_number']));
                            echo("</td><td>");
                            echo('<a href="uploads/'.htmlentities($row['college_id']).'">view college Id</a>');
                            echo("</td></tr>");
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>