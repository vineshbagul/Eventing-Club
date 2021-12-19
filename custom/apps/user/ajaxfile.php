 <?php
## Database configuration
include '../../../config.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (firstname like '%".$searchValue."%' or
         lastname like '%".$searchValue."%' or 
         email like '%".$searchValue."%' or
        mobile like '%".$searchValue."%' or 
        username like'%".$searchValue."%' ) ";
}

## Total number of records without filtering


   $records = $db_con->prepare("select count(*) as allcount from users" );
   $records->execute();
   //var_dump($records);
   $rows = $records->fetch(PDO::FETCH_ASSOC);
   $totalRecords = $rows['allcount'];

## Total number of record with filtering

$records = $db_con->prepare("select count(*) as allcount from users WHERE 1 ".$searchQuery);
$records->execute();
$records = $records->fetch(PDO::FETCH_ASSOC);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$userQuery = $db_con->prepare("select * from users WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage);
$userQuery->execute();
//$userRecords=$userQuery->fetch(PDO::FETCH_ASSOC);
$data = array();

while ($row = $userQuery->fetch(PDO::FETCH_ASSOC)) {

    $data[] = array( 
      "id" => $row['id'],
      "firstname"=>$row['firstname'],
      "lastname"=>$row['lastname'],
      "email"=>$row['email'],
      "mobile"=>$row['mobile'],
      "username"=>$row['username'],
      "password"=>$row['password'],
      "type"=>$row['type'],
      "created_on"=>$row['created_on']
     
      
   );
}


## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecordwithFilter,
  "iTotalDisplayRecords" => $totalRecords,
  "aaData" => $data
);

echo json_encode($response);




?>