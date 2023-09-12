<?php

$user = 'root';
$password = 'root';
$db = 'corse';
$host = 'localhost';
$port = 3306;

global $con;
$con = mysqli_connect($host, $user, $password, $db, $port);

function createDBTables(){
    global $con;
    mysqli_query($con, "
CREATE TABLE IF NOT EXISTS `motociclisti` ( `id` INT NOT NULL AUTO_INCREMENT , `nome` VARCHAR(255) NOT NULL , `numero` INT NOT NULL , `motoclub` VARCHAR(255) NOT NULL , `moto` VARCHAR(255) NOT NULL , `id_categoria` INT NOT NULL , `data` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;
");
}

function db_query($query, $action){
    global $con;
    // Check connection
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if($action == 'INSERT'){
        if(mysqli_error($con)){
            die('Query failed: ' . mysqli_error($con));
        }else{
            mysqli_query($con, $query);
            return TRUE;
        }
    }elseif($action == 'SELECT'){    
        $result = mysqli_query($con, $query);

        if(!$result) {
            die('Query failed: ' . mysqli_error($con));
        }else{
            $resultArray = array();
            $tempArray = array();
            $row = $result -> fetch_array();
            while($row = mysqli_fetch_object($result)) {
                // Add each row to the results array
                $tempArray = $row;
                array_push($resultArray, $tempArray);
            }
        }    
    }
    mysqli_close($con);
}

