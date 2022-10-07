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
            <a>JK</a> &nbsp; &nbsp;
            <a>About Me</a> &nbsp; &nbsp;
            <a>Skills</a> &nbsp; &nbsp;
            <a>Education</a> &nbsp; &nbsp;
            <a>Experience</a> &nbsp; &nbsp;
            <a>Projects</a> &nbsp; &nbsp;
            <a>Blog</a> &nbsp; &nbsp;
            <a>Log Out</a> &nbsp; &nbsp;
        </nav>
    </header>
</section>
<section class="bottom">
    <?php
    session_start();
        $outputTitle = $_POST['blogTitleName'];
        $outputContent = $_POST['blogContentName'];
        $_SESSION['savedTitle'] = $outputTitle;
        $_SESSION['savedContent'] = $outputContent;

        $outputTime = date("d-m-y h:i:s");
        echo"
            <h3>{$outputTitle}</h3>
            <br>
            <p class='aboutMyselfVTwo'>{$outputTime}<br>{$outputContent}</p>
        ";
    ?>
    <form id="blogFormReal" name="blogFormReal" action="addToBlog.php" method="POST">
            <input type="hidden" value="<?php echo $_POST['blogTitleName'] ?>" name="title">
            <input type="hidden" value="<?php echo $_POST['blogContentName'] ?>" name="content">
            <button type="submit" value="Submit">Submit</button>
            <button type="button" value="Edit" onclick="redirectPage()">Edit Post</button>
    </form>
</section>
</body>
</html>