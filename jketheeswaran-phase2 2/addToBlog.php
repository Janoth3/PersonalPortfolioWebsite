<?php
    session_start();
    $conn = new mysqli("localhost", "root", "", "ecs417");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $monthPosted = (int)date("m");
    $timePosted =  date("d-m-y h:i:s");
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO POSTS(monthPosted, timePosted, title, content) VALUES ('$monthPosted', '$timePosted', '$title', '$content')";
    if($conn->query($sql)===true){
        $conn->close();
        header("LOCATION: Blog.php");
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
    }
}
?>
