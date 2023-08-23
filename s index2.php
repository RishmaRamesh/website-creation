<?php
$dbname=$_POST['name']
$email=$_POST['email']
$password=$_POST['password']
$cpassword=$_POST['cpassword']
if(!empty($dbname) || !empty($email) !empty($password) !empty($cpassword)) {
       $host = "Localhost";
       $dbname="root";
       $dbemail="";
       $dbpassword="";
       $dbcpassword="";
       $dbname="mysql";

       $conn = new mysqli($host,$dbname,$edbmail,$dbpassword,$dbcpassword)

       if(mysqli_connect_error()) {
       die('connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}  else {
    $SELECT = "SELECT email From register where email = ? Limit 1";
    $INSERT = "INSERT Into register( name,email, password,cpassword) values(?,?,?,?)";


    $stmt = $conn->prepare($SELECT);
    $stmt->blind_param("s",$email);
    $stmt->execute();
    $stmt->blind_result($email);
    $stmt->store_result();
    $rnum=$stmt->num_rows;

    if($rnum==0) {
        $stmt->close();

        $stmt=$conn->prepare($INSERT);
        $stmt->blind_param("ssss",$email,$name,$password,$cpassword);
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