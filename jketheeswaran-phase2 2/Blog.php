<?php
    session_start();
    if(!isset($_SESSION['UserID'])){
        header("LOCATION: Login.php");
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
            <a href="addPost.php">Add Post</a> &nbsp; &nbsp;
            <a href="Logout.php">Log Out</a> &nbsp; &nbsp;
        </nav>
    </header>
</section>
<section class="bottom">
    <form name="blogForm" action="entryArchive.php" method="POST">
        <fieldset>
            <label>Month (Archives):</label>
            <br>
            <select name="monthSelected">
                <optgroup label="Months">
                    <option>January</option>
                    <option>February</option>
                    <option>March</option>
                    <option>April</option>
                    <option>May</option>
                    <option>June</option>
                    <option>July</option>
                    <option>August</option>
                    <option>September</option>
                    <option>October</option>
                    <option>November</option>
                    <option>December</option>
                </optgroup>
            </select>
            <button type="submit" value="Submit">Submit</button>
            <button type="reset" onclick="clearForm()">Reset</button>
        </fieldset>
    </form>
    <?php
    $conn = new mysqli("localhost", "root", "", "ecs417");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT `ID`, `timePosted`, `title`, `content` FROM `POSTS`";
    $result = $conn->query($sql) or die("Bad query: " . $sql);
    $arrayIDs = array();
    while($row=mysqli_fetch_array($result)){
        $arrayIDs[] = (int)$row['ID'];
    }

    function bubbleSort(array $array) {
        $sorted = false;
        while (false === $sorted) {
            $sorted = true;
            for ($i = 0; $i < count($array)-1; ++$i) {
                $current = $array[$i];
                $next    = $array[$i+1];
                if ($next > $current) {
                    $array[$i]   = $next;
                    $array[$i+1] = $current;
                    $sorted    = false;
                }
            }
        }
        return $array;
    }
    $sortedArrayIDs = bubbleSort($arrayIDs);

    echo "<h2>Blog</h2>";
    $position = 0;
    $sorted = false;
    while(!$sorted){
        foreach($result as $rows){
            if(isset($sortedArrayIDs[$position])){
                if((int)$rows['ID']===$sortedArrayIDs[$position]){
                    echo "<h3>{$rows['title']}</h3><p class='aboutMyselfVTwo'>{$rows['timePosted']}<br>{$rows['content']}</p>";
                    $position++;
                }
            }
        }
        if($position===count($sortedArrayIDs)){
            $sorted = true;
        }
    }


    $conn->close();
    ?>
</section>
</body>
</html>
