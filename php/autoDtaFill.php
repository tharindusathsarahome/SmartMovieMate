
<?php
require('dbconn.php');
echo "<datalist id='nameList'>";
if (isset($_POST['query'])) {
	$inputText = $_POST['query'];
	$sql = "SELECT * FROM english_language_men_tb WHERE name LIKE '%$inputText%' ";
	$EX1 = $conn->query($sql);
	while ($row = $EX1->fetch_assoc()) {
		$sql2 = "SELECT imgUrl FROM image_tb WHERE movie_tb_movieID = '" . $row['movie_tb_movieID'] . "';";
		$EX2 = $conn->query($sql2);
		while ($row2 = $EX2->fetch_assoc()){
			echo "<option value='".$row['name']."' style='background-image: url(".$row2['imgUrl'].")'>";
		}

	}
} else {
	echo 'No Record</p>';
}
echo "</datalist>";

?>