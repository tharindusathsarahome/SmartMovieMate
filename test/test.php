<?php

class  DateGrenret
{
public function Date($hour)
    {
        for ($i=0; $i <=24; $i++) {
            $name1 = $i.' '.'hours ago';
            if (strcmp($name1, $hour) !== 0) {
                echo 'Both strings are not equal'.'<br>';
            }
            else {
                echo 'Both strings are equal'.'<br>';
            }# code...
        }
        
    }    
}

  
// Use strcmp() function 





?>