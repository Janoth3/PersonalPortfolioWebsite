<?php
session_start();
if(isset($_SESSION['UserID'])){
    header("LOCATION: Index.html");
}
?>
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
    <main>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <fieldset>
                <legend><h2>Log In</h2></legend>
                <label>email:</label>
                <br>
                <input type="Email" name="user" required>
                <br>
                <label>Password:</label>
                <br>
                <input type="text" id="passwordOriginal" name="pass" pattern="[A-Z]{1}[a-z]+[0-9]{1}" required>
                <br>
                <button type="submit" value="Submit" id="submitButtonLogin">Submit</button>
                <button type="reset" value="Reset">Reset</button>
            </fieldset>
        </form>
    </main>
    <section>
        <h2>New To My Website?</h2>
        <a href="UserRegistration.php" ><h3 class="LoginText">Register</h3></a>
    </section>
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
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM USERS WHERE email='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql) or die("failed to query database".mysqli_error());
    $row = mysqli_fetch_array($result);

    if($row['email']==$username&&$row['password']==$password){
        session_start();
        $_SESSION['UserID']=$row['ID'];
        header("LOCATION: addPost.php");
    }
    else{
        echo "failed to log in";
    }
    $conn->close();
}
?>
</body>
</html>
