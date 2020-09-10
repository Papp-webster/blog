<?php
session_start();

function message() {
if(isset($_SESSION['error'])) {
    
    $out = "<div class='alert alert-danger'>";
    $out .=htmlentities($_SESSION['error']);
    $out .="</div>";
   $_SESSION['error'] = null;
   return $out;

  }
}

function Successmessage() {
    if(isset($_SESSION['success'])) {
        
        $out = "<div class='alert alert-success'>";
        $out .= htmlentities($_SESSION['success']);
        $out .="</div>";
       $_SESSION['success'] = null;
       return $out;
    
      }
    }
?>