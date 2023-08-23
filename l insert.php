<?php
$dbEmailAddress=$_POST['Email Address']
$Password=$_POST['Password']
if(!empty($dbEmailAddress) || !empty($Password)) {
       $host = "Localhost";
       $dbEmailAddress="root";
       $dbPassword="";
       $dbname="mysql";

       $conn = new mysqli($host,$dbEmailAddress,$Password,$dbname)

       if(mysqli_connect_error()) {
       die('connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}  else {
    $SELECT = "SELECT EmailAddress From register where EmailAdress = ? Limit 1";
    $INSERT = "INSERT Into register( EmailAddress, Password) values(?,?)";


    $stmt = $conn->prepare($SELECT);
    $stmt->blind_param("s",$EmailAddress);
    $stmt->execute();
    $stmt->blind_result($EmailAddress);
    $stmt->store_result();
    $rnum=$stmt->num_rows;

    if($rnum==0) {
        $stmt->close();

        $stmt=$conn->prepare($INSERT);
        $stmt->blind_param("ss",$EmailAddress,$Password);
        $stmt->execute();
        echo "New record inserted sucessfully";
      } else {
         echo "Someone already register using this email";
      }
      $stmt->close();
      $conn->close();
    }
}
    else {
    echo "All field are required";
    die();
}
?>