<!DOCTYPE html> 
<html> 
<head>
<meta charset="utf-8">
<title>プロシーズ課題</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

ご回答ありがとうございます！<br>
<?php 
$dbhost = 'localhost:3306';  
$dbuser = 'root';            
$dbpass = '';          
$dbname = "votedata";
$x=0;
$y=0;
$z=0;

$conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname);
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
 
$sql = "SELECT iphone, android, normal FROM votetable";
$result = $conn->query($sql);
 
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
		global $x,$y,$z;
		$x = $row["iphone"];
		$y = $row["android"];
		$z = $row["normal"];
    }
} else {
    echo "0 结果";
}
echo "あなたの選択は：";
if ($_POST["phone"] == "iphone"){
	global $x;
	$x++;
	$conn->query("UPDATE votetable SET iphone=$x");
	echo "スマートフォン(iosシステム)<br>";

}elseif($_POST["phone"] == "android"){
	global $y;
	$y++;
	$conn->query("UPDATE votetable SET android=$y");
	echo "スマートフォン(Androidシステム)<br>";
}else{
	global $z;
	$z++;
	$conn->query("UPDATE votetable SET normal=$z");
	echo "普通の携帯<br>";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
		echo "-スマートフォン(iosシステム)  -";
		echo $row["iphone"];
		echo "票";
		echo "<br>";
		echo "-スマートフォン(androidシステム)  -";
		echo $row["android"];
		echo "票";
		echo "<br>";
		echo "-普通の携帯  -";
		echo $z = $row["normal"];
		echo "票";
		echo "<br>";
    }
} else {
    echo "0 结果";
}

$conn->close();
?> 
	<a href="http://126.84.81.63/vote"><button>もう一度投票する</button></a>
</body> 
</html> 
