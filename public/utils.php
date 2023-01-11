<?php 

function connect()
{ 
    try{
        return new mysqli("localhost","root",'',"prjweb");
    }
    catch (PDOException $e) {
		die($e->getMessage());
	}
}

function db_select($table,$cols="*",$where = null,$one_row = false){
    $sql = "SELECT ".$cols." FROM ".$table;
    if(isset($where)){
        $sql = $sql." WHERE ".$where;
    }
    
    $db = connect();
    $res = $db -> query($sql);

    if($db->errno != 0){
        echo $db->errno." : ".$db->error;
        return null;
    }

    if($one_row)
        return $res -> fetch_assoc();
    else
        return $res -> fetch_all(MYSQLI_ASSOC);
}


function db_insert($table,array $cols,array $values){
    $n = sizeof($cols);
    $sql = "INSERT INTO ".$table;
    $strVal = "";
    $strCol = "";
    for($i = 0;$i<$n;$i++){
        $strVal = $strVal."'{$values[$i]}'";
        $strCol = $strCol."{$cols[$i]}";
        if($i != $n - 1){
            $strVal = $strVal.",";
            $strCol = $strCol.",";
        }
    }
    
    $sql = $sql." ({$strCol}) VALUE ({$strVal})";
   
    $db = connect();
    $db -> query($sql);

    if($db->errno != 0){
        echo "<br>".$db->errno." : ".$db->error."<br>";
        return null;
    }

    return $db -> insert_id;
}

function db_update($table,$where,array $cols,array $vals){
    $n = sizeof($cols);
    $sql = "UPDATE ".$table." SET ";
    
    $updates = "";

    for($i = 0;$i<$n;$i++){
        $updates = $updates.$cols[$i]." = '".$vals[$i]."'";
        if($i!=$n-1)
            $updates = $updates.",";
    }
    
    $sql = $sql.$updates;
    if(!empty($where)){
        $sql = $sql." WHERE ".$where; 
    }
    print($sql);
    $db = connect();
    $db -> query($sql);

    if($db->errno != 0){
        echo "<br>".$db->errno." : ".$db->error."<br>";
        return null;
    }
}

function usable($var){
    return isset($var) AND !empty($var);
}

function validLogIn($post){
    if( (!isset($post["email"]) || !filter_var($post["email"],FILTER_VALIDATE_EMAIL))
    || (!isset($post["password"]) && !empty($post["password"])))
    return false;
    return true;
}
