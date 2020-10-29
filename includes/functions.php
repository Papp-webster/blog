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

function loginUser($username, $password) {
    global $db;
    
    $sql = "SELECT * FROM admins WHERE username=:username AND password=:password LIMIT 1";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password);
    $stmt->execute();
    $result = $stmt->rowcount(); 
    if($result == 1) {
      return $found_Account = $stmt->fetch();
    } else {
        return null;
    }
}

?>