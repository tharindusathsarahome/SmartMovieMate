
<?php
function add_some_extra($string){
    foreach ($string as $value) {
        echo $value ;
      }
    } 

$str = array();
add_some_extra($str);

?>
