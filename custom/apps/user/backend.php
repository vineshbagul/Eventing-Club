<?php
    $db_host = "localhost";
    $db_name = "eventclub";
    $db_user = "root";
    $db_pass = "";

    try {
        $db_con = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
        $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
/*----------------------------------
ADDING USER
-----------------------------------*/

    extract($_POST);

    if (
        isset($_POST['firstname']) && isset($_POST['lastname']) &&
        isset($_POST['mobile']) && isset($_POST['email']) &&
        isset($_POST['username']) && isset($_POST['password'])
    ) {
        $sql = $db_con->prepare("INSERT INTO `users` (`firstname`, `lastname`, `email`, `mobile`, `username`, `password`) VALUES 
    ('" . $firstname . "','" . $lastname . "','" . $mobile . "','" . $email . "','" . $username . "','" . $password . "')");
        $sql->execute();
    }

    //PASS IT ON MODAL

if (isset($_POST['id']) && isset($_POST['id']) != "" && $_POST['action'] == 'getdetails') {
    $user_id = $_POST['id'];
    $result = $db_con->prepare("SELECT * FROM `users` WHERE id = '$user_id'");
    $result->execute();
    if (!$result == true) {
        echo $e->getMessage();
        exit();
    }

    $response = array();

    if ($result == true) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            $response = $row;
        }
    } else {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    //     PHP has some built-in functions to handle JSON.
    // Objects in PHP can be converted into JSON by using the PHP function json_encode(): 

    echo json_encode($response);
}
// ye top wala id jo humhe mil raha hai uska hai jaha wo id check karega sahi hai ya nai agar nai tho invalid req boldega...
else {
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}

/*--------------------------------------------------------
UPDATE USER FUNCTION 
--------------------------------------------------------*/
if (isset($_POST['id']) && $_POST['action'] == 'updatedetail') {
    // get values
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $statement = $db_con->prepare(" UPDATE `users` SET `firstname` = '$firstname', `lastname` = '$lastname', `email` = '$email', 
    `mobile` = '$mobile', `username` = '$username', `password` = '$password' WHERE `users`.`id` = $id;");
    $statement->execute();
    if ($statement == true) {
        ?>
        <script>
            alert('Information saved successfully into the Database!!')
            window.location.href = "http://localhost/Event/demo1/custom/apps/user/list-data.php";
        </script><?php
    }
}

/*--------------------------------------------------------
DELETE USER FUNCTION 
--------------------------------------------------------*/
if (isset($_POST['id']) && $_POST['action'] == 'deletedetails') {

    $id = $_POST['id'];
    $statement = $db_con->prepare("DELETE FROM `users` WHERE `id` ='$id'");
    $statement->execute();

    if ($statement) {
        echo "Yes";
    } else {
        echo "No";
    }
}

?>