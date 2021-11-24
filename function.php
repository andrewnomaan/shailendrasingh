<?php
 function get_safe_value($str){
     if($str!=''){
        $str=trim($str);
        $str = stripslashes($str);
        $str=htmlspecialchars($str);
        return $str;
     }
 }
?>