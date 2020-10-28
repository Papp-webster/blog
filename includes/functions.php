<?php

function redirect($newLoctaion){
 header("Location: $newLoctaion");
 exit;
}

function checkuser($user) {
 global $db;
 $sql = "SELECT username FROM admins WHERE username=:username";
 $stmt= $db->prepare($sql);
 $stmt->bindValue(':username', $user);
 $stmt->execute();
 $result= $stmt->rowCount();
 if($result == 1){
    return true;
    } else {
        return false;
    }
}

?>