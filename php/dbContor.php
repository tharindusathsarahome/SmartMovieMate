<?php
class selectData{
    function select($tableName,$colNmame,$con){
        include 'dbconn.php';
        if ($con==" ") {
            $sql = "SELECT ".$colNmame." FROM ".$tableName;   
        }
        else {
            $sql = "SELECT ".$colNmame." FROM ".$tableName.$con;
        }
        $result = $conn->query($sql);
        return $result;
    }
}
class insertData{
    function insert($tableName,$colNmame,$values){
        include 'dbconn.php';
        $sql = "INSERT INTO ".$tableName."(".$colNmame.")"." VALUES "."(".$values.")";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

    }
}

?>