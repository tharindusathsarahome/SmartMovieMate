<?php
class Data
{

public $seletData;
public function SQLData($tableName,$col,$data,$type)
{
    if ($type=='I') {
        include 'dbconn.php';
        $sql = "INSERT INTO ".$tableName." (".$col.")
        VALUES (".$data.")";
        if ($conn->query($sql) === TRUE) {
            // echo "New record created successfully <br>";  
        } 
        
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    elseif ($type == 'S') {
        include 'dbconn.php';
        $sql = "SELECT $col FROM `$tableName` WHERE $data";
        // echo $sql;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $row1[]=$row;
          }
          $this->seletData=$row1;


        } else {
          echo "0 results";
        }
    }
    elseif ($type == 'S2') {
        include 'dbconn.php';
        $sql = "SELECT $col FROM `$tableName` WHERE $data";
        $result = $conn->query($sql);
        $this->seletData=$result;
    }
}
    
}


?>