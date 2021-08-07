<!--

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $mobileno = $_POST['mobileno'];
    $city = $_POST['city'];
    $des = $_POST['des'];
    $people = $_POST['people'];

    //database connection

//     $conn = new mysqli('localhost', 'root','','booking');
//     if($conn->connect_error){
//         die('connection failed  : ' .$conn->connection_error)
//     }
//     else{
//         $stmt = $conn->prepare("insert into form(firstname,lastname,email,mobileno,city,des,people) values(?. ?, ?, ?, ?, ?, ?, ?)");
//         $stmt->bind_param("sssisss",$firstname, $lastname, $email, $mobileno,$city, $des. $people);
//         $stmt->execute();
//         echo"booking Successfull";
//         $stmt->close();
//         $conn->close();
//     }

// // ?> 

// 
// $firstname = filter_input(INPUT_POST, 'firstname');
// $lastname = filter_input(INPUT_POST, 'lastname');
// $email = filter_input(INPUT_POST, 'email');
// $mobileno = filter_input(INPUT_POST, 'mobileno');
// $city = filter_input(INPUT_POST, 'city');
// $des = filter_input(INPUT_POST, 'des');
// $people = filter_input(INPUT_POST, 'people');
// if (!empty($firstname)){
// if (!empty($lastname)){
// $host = "localhost";
// $dbusername = "root";
// $dbpassword = "";
// $dbname = "booking";
// // Create connection
// $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
// if (mysqli_connect_error()){
// die('Connect Error ('. mysqli_connect_errno() .') '
// . mysqli_connect_error());
// }
// else{
// $sql = "INSERT INTO form (firstname, lastname,email,mobileno,city,des,people)
// values ('$firstname','$lastname','$email','$mobileno','$city','$des','$people')";
// if ($conn->query($sql)){
// echo "New record is inserted sucessfully";
// }
// else{
// echo "Error: ". $sql ."
// ". $conn->error;
// }
// $conn->close();
// }
// }
// else{
// echo "Password should not be empty";
// die();
// }
// }
// else{
// echo "Username should not be empty";
// die();
// }
// ?> //

<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$mobileno = $_POST['mobileno'];
$city = $_POST['city'];
$des = $_POST['des'];
$people = $_POST['people'];
if (!empty($firstname) || !empty($lastname) || !empty($email) || !empty($mobileno) || !empty($city) || !empty($des)  || !empty($people)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "booking";
    //create connection
    $conn = new mysql($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From register Where email = ? Limit 50";
     $INSERT = "INSERT Into form (firstname, lastname, email, mobileno, city, des,people) values(?, ?, ?, ?, ?, ?,?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssisss", $firstname, $lastname, $email, $mobileno, $city, $des, $people );
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>