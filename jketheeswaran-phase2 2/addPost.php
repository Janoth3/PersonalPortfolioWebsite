<?php
    session_start();
    function disableVariable($toUnset){
        unset($toUnset);
    }
    function setTitle(){
        if(isset($_SESSION['savedTitle'])){
            return $_SESSION['savedTitle'];
        }
        else{
            return null;
        }
    }
    function setContent(){
        if(isset($_SESSION['savedContent'])){
            return $_SESSION['savedContent'];
        }
        else{
            return null;
        }
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
        <form id="blogForm" name="blogForm" action="preview.php" method="POST">
            <fieldset>
                <legend><h2>Add Post</h2></legend>
                <label>Title:</label>
                <br>
                <input type="text" value="<?php echo setTitle(); ?>" id="blogTitle" name="blogTitleName">
                <br>
                <label>Content:</label>
                <br>
                <input type="text" value="<?php echo setContent(); ?>" id="blogContent" name="blogContentName">
                <br>
                <p class="aboutMyself">
                    Please note there is a 300 character limit on title and 1000 character limit on content.
                </p>
                <button type="submit" onclick="submitValidation(event)">Preview</button>
                <button type="reset" onclick="clearForm()">Reset</button>
            </fieldset>
        </form>
        <?php
            disableVariable($_SESSION);
        ?>
    </main>
</section>
</body>
</html>
