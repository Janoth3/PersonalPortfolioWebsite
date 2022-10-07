<!DOCTYPE html>
<html>
<head>
    <link rel="reset" href="reset.css">
    <link rel="stylesheet" href="MainStylesheet.css">
    <script src="MainJS.js" defer></script>
</head>
<body>
<section class="top">
    <header>
        <nav id="navTOP">
            <a href="Index.html">JK</a> &nbsp; &nbsp;
            <a href="AboutMe.html">About Me</a> &nbsp; &nbsp;
            <a href="Skills.html">Skills</a> &nbsp; &nbsp;
            <a href="Education.html">Education</a> &nbsp; &nbsp;
            <a href="Experience.html">Experience</a> &nbsp; &nbsp;
            <a href="Projects.html">Projects</a> &nbsp; &nbsp;
            <a href="Blog.php">Blog</a> &nbsp; &nbsp;
            <a href="Logout.php">Log Out</a> &nbsp; &nbsp;
        </nav>
    </header>
</section>
<section class="bottom">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <fieldset>
            <legend><h2>User Registration</h2></legend>
            <label>First Name:</label>
            <br>
            <input type="text" name="firstName" required>
            <br>
            <label>Last Name:</label>
            <br>
            <input type="text" name="lastName" required>
            <br>
            <label>Email (Username):</label>
            <br>
            <input type="email" name="email" required>
            <br>
            <label>Password:</label>
            <br>
            <input type="text" id="passwordOriginal" name="passWordOriginal" pattern="[A-Z]{1}[a-z]+[0-9]{1}" required>
            <br>
            <label>Confirm Password:</label>
            <br>
            <input type="text" id="passwordConfirm" name="passWordConfirm" pattern="[A-Z]{1}[a-z]+[0-9]{1}" required>
            <br>
            <button type="submit" onclick="submitRegistration()" ">Submit</button>
            <button type="reset" value="Reset">Reset</button>
        </fieldset>
    </form>
</section>
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ecs417";

//Creates connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checks connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $fName = $_POST["firstName"];
    $lName = $_POST["lastName"];
    $email = $_POST["email"];
    $pass1 = $_POST["passWordOriginal"];
    $sql = "INSERT INTO USERS(firstName, lastName, email, passWord) VALUES ('$fName', '$lName', '$email', '$pass1')";
    if($conn->query($sql)===true){
        header("LOCATION: Login.php");
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
    }
    $conn->close();
}
?>
</body>
</html>
