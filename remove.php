<?php
    require_once "pdo.php";
    session_start();

    if ( !isset($_SESSION["admin_id"]) ) {
        die('ACCESS DENIED');
    }

    if(isset($_GET['sport_id']) ){
        $stmt = $pdo->prepare("SELECT availability from sports_availability WHERE sport_id=:sport_id");
        $stmt->execute(array(
            ':sport_id'=>$_GET['sport_id']
        ));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $row['availability'];
        $available=$row['availability']-1;
        if($available<0){
            $_SESSION['error']="cannot be less than 0";
            header("location:manage_sports.php");
            return;
        }
        $stmt=$pdo->prepare('UPDATE sports_availability SET availability=:available WHERE sport_id=:sport_id');
        $stmt->execute(array(
            ":available"=>$available,
            ":sport_id"=>$_GET['sport_id']
        ));
        $_SESSION['success']="Altered Availability";
        header("location:manage_sports.php");
        return;
    }


?>