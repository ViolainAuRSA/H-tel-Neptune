<?php

    $host    = 'database';  
    $name    = 'app';   
    $user    = 'app';     
    $pass    = 'app_password';      

    $con = new PDO('mysql:host=' . $host . ';dbname=' . $name, $user, $pass);

    if(!$con){
        die("Erreur de connexion à la base de données".mysqli_connect_error());
    }

    function filteration($data){
        foreach($data as $key => $value){
            $data[$key] = trim($value);
            $data[$key] = stripslashes($value);
            $data[$key] = htmlspecialchars($value);
            $data[$key] = strip_tags($value);
        }
        return $data;
    }

    function select($sql, $value, $datatypes){
        $con = $GLOBALS['con'];
        if($stmt = $con->prepare($sql)){
            $stmt->bindParam($datatypes, ...$value);
            if($stmt->execute()){
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }else{
                $result = $stmt->errorInfo();
                die("Erreur d'exécution de la requête");
            }
        }else{
            die("Erreur de préparation de la requête");
        }
    }


?>