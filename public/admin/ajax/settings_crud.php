<?php

    require_once '../../include.php';
    require_once '../../liens/essentials.php';

    if(isset($_POST['get_general'])){
        $query = "SELECT * FROM settings WHERE sr_no = 1";
        $values = [1];
        $res = select($query,$values);
        $data = fetch($res);

        echo json_encode($data);
    }

?>