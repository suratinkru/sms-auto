<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "noti";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
} 


$name = $_GET["name"];
$pkg = $_GET["pkg"];
$title = $_GET["title"];
$text = $_GET["text"];
$subtext = $_GET["subtext"];
$bigtext = $_GET["bigtext"];
$infotext = $_GET["infotext"];

// $message = "";

// if($pkg=="com.sample.app"){
// $message = "from sample app {$title} ${text} ";
// echo $message;
// } else {
// $message = "{$title} !! ${text} ";

// echo $message;

// }

// $cmd = "/usr/bin/curl -X POST -d \"text=" . $message . "\" http://sample.com/to_sample";
// $ret = exec($cmd);

// echo $ret;
// echo "dsfds";


// $text = substr($text, 0 ,11);

// $keywords = preg_split("/[\s,@,\/]+/" , $text);
// $date =$keywords[0];    
// $date2 =$keywords[1];
// $time =$keywords[2];
// $amount =$keywords[3];
// $kb = mb_substr($keywords[4], 3,11 ,'UTF-8');
// $acount = mb_substr($keywords[5], 11,21 ,'UTF-8');

// $date = $date."/".$date2;
//      var_dump($keywords);
// $sql = "INSERT INTO test (name,pkg,title,date,time,amount,kb,acount,subtext,bigtext,infotext)
// VALUES ('$name', '$pkg', '$title', '$date', '$time', '$amount', '$kb','$acount', '$subtext', '$bigtext', '$infotext')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();
$checkdate = date('Y-m-d');

$sql = "INSERT INTO `line` ( `name`, `pkg`, `title`, `text`, `subtext`, `bigtext`, `infotext`, `checkdate`) 
VALUES ('$name', '$pkg', '$title', '$text','$subtext', '$bigtext', '$infotext','$checkdate')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

$post = [
    'name'  => $name,
    'pkg'   => $pkg,
    'title'  => $title,
    'text' => $text,
    'subtext' => $subtext,
    'bigtext'  => $bigtext,
    'infotext'  => $infotext,
    'hash_key' => '4jMmPayt0DPJIJkg5pEPG4ZmeJPed91E'
];



$data = json_encode($post,JSON_UNESCAPED_UNICODE);                                                                              
$url = 'http://128.199.214.40:4000/api/deposit/curl';
print_r($data);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$result = curl_exec($ch);
curl_close($ch);
print_r ($result);

?>