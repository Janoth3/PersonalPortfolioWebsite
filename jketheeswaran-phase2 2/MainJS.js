//clearing/resetting the form when posting a blog entry
function clearForm(){
    if(window.confirm("Are you sure you want to reset the form?")){
        document.getElementById("blogForm").reset();
    }
}
//making the submit button highlight any fields if any are left blank/incomplete when posting a blog entry
var globalBlogTitleBox;
var globalBlogContentBox;
var globalVariablesSet = false;
function submitValidation(event){
    var blogTitleBox = document.getElementById("blogTitle").value;
    var blogContentBox = document.getElementById("blogContent").value;
    globalBlogTitleBox = blogTitleBox;
    globalBlogContentBox = blogContentBox;
    globalVariablesSet = true;
    if(blogTitleBox.length<=0||blogContentBox.length<=0){
        event.preventDefault();
        window.alert('Please fill in the missing fields');
        document.getElementById("blogTitle").style.backgroundColor = "#FFA500";
        document.getElementById("blogContent").style.backgroundColor = "#FFA500";
        if(blogTitleBox.length!=0){
            document.getElementById("blogTitle").style.backgroundColor = "#FFFFFF";
        }
        else if(blogContentBox.length!=0){
            document.getElementById("blogContent").style.backgroundColor = "#FFFFFF";
        }
    }
}
//making sure both passwords match when creating a new account
function submitRegistration(event){
    var passwordOriginal = document.getElementById("passwordOriginal").value;
    var passwordConfirm = document.getElementById("passwordConfirm").value;
    if(passwordOriginal!==passwordConfirm){
        e.preventDefault();
        window.alert('Please make sure your two password fields match.');
    }
}

let goBackButton = document.getElementById("goBackButton");
goBackButton.addEventListener('click', method);
function method(e){
    e.preventDefault();
    window.close();
}

function redirectPage(){
    window.location.replace("addPost.php");
}