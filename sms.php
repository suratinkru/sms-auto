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

$keywords = preg_split("/[\s@\/]+/" , $text);


     print_r( $keywords);
     $date =$keywords[0];
     
     $date2 =$keywords[1];
     $time =$keywords[2];
     $amount =$keywords[3];
     
     $bk_tranfer = mb_substr($keywords[4], 3,11 ,'UTF-8');
     $bk_number = mb_substr($keywords[5], 11,21 ,'UTF-8');
     $bk_number_tranfer = mb_substr($keywords[5], 0,7 ,'UTF-8');
     $date = $date."/".$date2;


     
    print_r($date ." <br>");
     
     print_r($time ." <br>");
   
     print_r($amount ." <br>");
   
     print_r($bk_tranfer ." <br>");
     print_r($bk_number." <br>");
     print_r($bk_number_tranfer." <br>");

     print "<br>";

     $checkdate = date('Y-m-d');

$sql = "INSERT INTO `line` ( `name`, `pkg`, `title`, `text`, `subtext`, `bigtext`, `infotext`, `date`, `time`, `amount`, `bk_tranfer`, `bk_number`, `bk_number_tranfer`, `checkdate`)
 VALUES ('$name', '$pkg', '$title', '$text','$subtext', '$bigtext', '$infotext', '$date', '$time', '$amount', '$bk_tranfer', '$bk_number', '$bk_number_tranfer',' $checkdate')";

  if($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

$conn->close();


// $conn->close();

// $post = [
//     'name'  => $name,
//     'pkg'   => $pkg,
//     'title'  => $title,
//     'text' => $text,
//     'subtext' => $subtext,
//     'bigtext'  => $bigtext,
//     'infotext'  => $infotext,
//     'hash_key' => '4jMmPayt0DPJIJkg5pEPG4ZmeJPed91E'
// ];



// $data = json_encode($post,JSON_UNESCAPED_UNICODE);                                                                              
// $url = '';
// print_r($data);
// $ch = curl_init($url);
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
// $result = curl_exec($ch);
// curl_close($ch);
// print_r ($result);

?>