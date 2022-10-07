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
    <?php
    $conn = new mysqli("localhost", "root", "", "ecs417");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $sql = "SELECT `monthPosted`, `timePosted`, `title`, `content` FROM `POSTS`";
        $result = $conn->query($sql) or die("Bad query: " . $sql);

        if((string)$_POST['monthSelected']==="January"){
            foreach($result as $rows){
                    if((int)$rows['monthPosted']===1){
                        echo "<h3>{$rows['title']}</h3><p class='aboutMyselfVTwo'>{$rows['timePosted']}<br>{$rows['content']}</p>";
                    }
            }
        }
        else if((string)$_POST['monthSelected']==="February"){
            foreach($result as $rows){
                if((int)$rows['monthPosted']===2){
                    echo "<h3>{$rows['title']}</h3><p class='aboutMyselfVTwo'>{$rows['timePosted']}<br>{$rows['content']}</p>";
                }
            }
        }
        else if((string)$_POST['monthSelected']==="March"){
            foreach($result as $rows){
                if((int)$rows['monthPosted']===3){
                    echo "<h3>{$rows['title']}</h3><p class='aboutMyselfVTwo'>{$rows['timePosted']}<br>{$rows['content']}</p>";
                }
            }
        }
        else if((string)$_POST['monthSelected']==="April"){
            foreach($result as $rows){
                if((int)$rows['monthPosted']===4){
                    echo "<h3>{$rows['title']}</h3><p class='aboutMyselfVTwo'>{$rows['timePosted']}<br>{$rows['content']}</p>";
                }
            }
        }
        else if((string)$_POST['monthSelected']==="May"){
            foreach($result as $rows){
                if((int)$rows['monthPosted']===5){
                    echo "<h3>{$rows['title']}</h3><p class='aboutMyselfVTwo'>{$rows['timePosted']}<br>{$rows['content']}</p>";
                }
            }
        }
        else if((string)$_POST['monthSelected']==="June"){
            foreach($result as $rows){
                if((int)$rows['monthPosted']===6){
                    echo "<h3>{$rows['title']}</h3><p class='aboutMyselfVTwo'>{$rows['timePosted']}<br>{$rows['content']}</p>";
                }
            }
        }
        else if((string)$_POST['monthSelected']==="July"){
            foreach($result as $rows){
                if((int)$rows['monthPosted']===7){
                    echo "<h3>{$rows['title']}</h3><p class='aboutMyselfVTwo'>{$rows['timePosted']}<br>{$rows['content']}</p>";
                }
            }
        }
        else if((string)$_POST['monthSelected']==="August"){
            foreach($result as $rows){
                if((int)$rows['monthPosted']===8){
                    echo "<h3>{$rows['title']}</h3><p class='aboutMyselfVTwo'>{$rows['timePosted']}<br>{$rows['content']}</p>";
                }
            }
        }
        else if((string)$_POST['monthSelected']==="September"){
            foreach($result as $rows){
                if((int)$rows['monthPosted']===9){
                    echo "<h3>{$rows['title']}</h3><p class='aboutMyselfVTwo'>{$rows['timePosted']}<br>{$rows['content']}</p>";
                }
            }
        }
        else if((string)$_POST['monthSelected']==="October"){
            foreach($result as $rows){
                if((int)$rows['monthPosted']===10){
                    echo "<h3>{$rows['title']}</h3><p class='aboutMyselfVTwo'>{$rows['timePosted']}<br>{$rows['content']}</p>";
                }
            }
        }
        else if((string)$_POST['monthSelected']==="November"){
            foreach($result as $rows){
                if((int)$rows['monthPosted']===11){
                    echo "<h3>{$rows['title']}</h3><p class='aboutMyselfVTwo'>{$rows['timePosted']}<br>{$rows['content']}</p>";
                }
            }
        }
        else if((string)$_POST['monthSelected']==="December"){
            foreach($result as $rows){
                if((int)$rows['monthPosted']===12){
                    echo "<h3>{$rows['title']}</h3><p class='aboutMyselfVTwo'>{$rows['timePosted']}<br>{$rows['content']}</p>";
                }
            }
        }
    }
    echo "<h3>(If nothing appears on this page, then there are no posts that were posted in the month you selected.)</h3>";

    $conn->close();
    ?>
</section>
</body>
</html>