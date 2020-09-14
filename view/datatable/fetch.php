
<?php
//fetch.php


    session_start();
    include_once('../../config/server.php'); 



$connect = $conn;
$columns = array('id', 'name', 'pkg', 'title','text', 'subtext','bigtext','infotext','date','time', 'amount', 'bk_tranfer', 'bk_number', 'bk_number_tranfer', 'created_at','checkdate');

$query = "SELECT * FROM lines WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'checkdate BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (id LIKE "%'.$_POST["search"]["value"].'%" 
  OR name LIKE "%'.$_POST["search"]["value"].'%" 
  OR pkg LIKE "%'.$_POST["search"]["value"].'%" 
  OR title LIKE "%'.$_POST["search"]["value"].'%"
  OR text LIKE "%'.$_POST["search"]["value"].'%"
  OR subtext LIKE "%'.$_POST["search"]["value"].'%"
  OR bigtext LIKE "%'.$_POST["search"]["value"].'%"
  OR infotext LIKE "%'.$_POST["search"]["value"].'%"
  OR date LIKE "%'.$_POST["search"]["value"].'%"
  OR time LIKE "%'.$_POST["search"]["value"].'%"
  OR amount LIKE "%'.$_POST["search"]["value"].'%"
  OR bk_tranfer LIKE "%'.$_POST["search"]["value"].'%"
  OR bk_number LIKE "%'.$_POST["search"]["value"].'%"
  OR bk_number_tranfer LIKE "%'.$_POST["search"]["value"].'%"
  OR created_at LIKE "%'.$_POST["search"]["value"].'%"
  OR checkdate LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["data"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['data']['0']['column']].' '.$_POST['data']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $row["id"];
 $sub_array[] = $row["name"];
 $sub_array[] = $row["pkg"];
 $sub_array[] = $row["title"];
 $sub_array[] = $row["text"];
 $sub_array[] = $row["subtext"];
 $sub_array[] = $row["bigtext"];
 $sub_array[] = $row["infotext"];
 $sub_array[] = $row["date"];
 $sub_array[] = $row["time"];
 $sub_array[] = $row["amount"];
 $sub_array[] = $row["bk_tranfer"];
 $sub_array[] = $row["bk_number"];
 $sub_array[] = $row["bk_number_tranfer"];
 $sub_array[] = $row["created_at"];
 $sub_array[] = $row["checkdate"];
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM lines";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>