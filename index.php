<?php 
include "connect.php";
session_start();
if(isset($_SESSION['username']))
{
    $username = $_SESSION['username'];
}
$domain0 = mysqli_real_escape_string($connection, $_POST["host"]);
$disallowed = array('http://', 'https://');
$domain = str_replace($disallowed,"",$domain0);
//ck
if(isset($_POST['submit']))
  {
    //$content = $_REQUEST['content'];
    $name = mysqli_real_escape_string($connection, $_POST["name"]);
    $email = mysqli_real_escape_string($connection, $_POST["email"]);
    $title = mysqli_real_escape_string($connection, $_POST["title"]);
    $tag = mysqli_real_escape_string($connection, $_POST["tag"]);
    $category = mysqli_real_escape_string($connection, $_POST["category"]);
    $content = mysqli_real_escape_string($connection, $_POST["content"]);
   //echo " " .$name,$email,$title,$tag,$category,$content;
    //$insert_query = mysqli_query($connection, "insert into tbl_ckeditor set content='$content'");
    $insert_query = mysqli_query($connection, "INSERT INTO `tbl_ckeditor`(`name`, `email`,`title`, `tag`, `category`, `content`) VALUES ('$name','$email','$title','$tag','$category','$content')");
    if($insert_query)
    {
      $msg = "<p style='width:100%;height:40px;background-color:green;color:white;font-size:24px;padding:3px;margin:5px;'>Data Inserted</p>";
    }
    else
    {
      $msg = "<p style='width:100%;height:40px;background-color:red;color:white;font-size:24px;padding:3px;margin:5px;'>Error</p>";
    }
  }
?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
<title>Free Article Submission - Adquash Articles</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<style>
 .box
 {
  width:100%;
  max-width:600px;
  background-color:#f9f9f9;
  border:1px solid #ccc;
  border-radius:5px;
  padding:16px;
  margin:0 auto;
 }
 .ck-editor__editable[role="textbox"] {
                /* editing area */
                min-height: 300px;
            }
.error
{
  color:  red;
}
</style>        
    </head>
    <body>
<div class="section-home our-causes">

        <div class="container">
            <div class="row">          

                <div class="col-md-9 col-sm-6">
    <h2 class="title-style-1">Free Article Submission<span class="title-under"></span></h2> 
    <div class="col-md-12">
<center><h3><?php if(!empty($msg)){ echo $msg; } ?></h3></center>
<h1 class="wp-block-heading">Submit your Guest Post Today!</h1>
<h3 class="wp-block-heading">Thank you for your interest in submitting your article to Adquash</h3>
<p>With hundred of thousands monthly page views and a domain authority of 54 as per Moz, this is the perfect place to <a href="https://www.entireweb.com/free_submission/facebook/" data-internallinksmanager029f6b8e52c="66" title="free facebook submission" target="_blank" rel="noopener">submit</a> your guest post to.</p>
<p>We really appreciate your effort to helping us building a great article site.</p>
<!--p>Adquash were established in 2016 and have been a search engine since 2016. We have worked with thousands of known brands since the start and our focus is to deliver high quality results.</p -->
<p>All articles <strong>MUST</strong> follow the below guidelines.</p>
<ul>
<!--li>May be included in our newsletter, which is sent on a weekly basis to more than 200.000 subscribers.</li -->
<li>Up to 3 do-follow links in article and author information including social links.</li>
<li>Include a short bio in your submission, explaining your area of expertise</li>
<li>Feel free to include a link to your favorite social profile and your website.</li>
<li>All articles MUST be suitable in one of the categories</li>
</ul>
<h5>* By submitting you article to us you guarantee that you have followed the below guidelines.</h5>
<ul>
<li>Articles must not be press releases, advertisements, sales letters, promotional copy, or blatant and excessive self-promotion or hype.</li>
<li>All submissions must be original work and not published anywhere else.</li>
<li>You must have rights to all material, including text, images and video clips that you provide.</li>
<li>All articles must be about webmaster related stuff</li>
<li>All articles must have a minimum of 500 words.</li>
</ul>

<form id="#" method="post" enctype="multipart/form-data" action>
<p>Please complete the required fields.</p>

<div class="col-md-6">
 <lable>Your Name :</lable>
 <input type="text" name="name" style="width:100%;height:50px;" placeholder="Your Name" required/><br>
                            </div>

<div class="col-md-6">
<lable>Your Email </lable>
<input type="email" name="email" style="width:100%;height:50px;" placeholder="Provide email Address" id="emailInput" onkeyup="validateEmail()" required/><span id="emailError" style="color: red;"></span><br>
   <font color="red"> <b>Please provide active email email address . We will send confiramtion link for post activation.</b></font>  <br><br>                      
                            <script>
  function validateEmail() {
    const emailInput = document.getElementById("emailInput");
    const emailError = document.getElementById("emailError");
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
   // const emailPattern = /^[a-zA-Z0-9._-]+@gmail.com$/;
    if (!emailPattern.test(emailInput.value)) {
      emailError.textContent = "Invalid email format";
      document.getElementById('hideDiv').style.display = "none";
    } else {
      emailError.textContent = "";
      document.getElementById('hideDiv').style.display = 'block';
    }
    
  }
</script>
                            </div>

<div class="col-md-12">
                            <lable>Item Title:</lable><br>
                            <b>Special Characters not allow in title section</b><br>
                            <input type="text" id="txtName" name="title" style="width:100%;height:50px;" maxlength ="80" placeholder="Title" onkeyup="this.value = this.value.replace(/[^A-Za-z0-9 ]/g, '')" required/>
                            <br><span id="lblError" style="color: red"></span>
                        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>const el = document.getElementById("txtName");

// A function to encapsulate your logic. 
const process = e => {
  const v = el.value.toString().replace(/\ /g, '');

  // Must have length > 0 before the space bar will do anything. 
  if (v.length == 0 && e.which == 32) e.preventDefault();

  // First char must not be a space. 
  else if (el.value[0] == ' ') el.value = el.value.replace(/\ /, '');
};

// Do whatever here. 
const onChange = () => {
  el.onkeydown = process;
  el.onkeyup = process;
};

// Lazy on ready.. 
setTimeout(onChange, 100);
</script>
<script type="text/javascript">
    $(function () {
        $("#txtName").keypress(function (e) {
            var keyCode = e.keyCode || e.which;
 
            $("#lblError").html("");
 
            //Regex for Valid Characters i.e. Alphabets and Numbers.
            var regex = /^[A-Za-z0-9 ]+$/;
 
            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                $("#lblError").html("Only Alphabets and Numbers allowed in Title.");
            }
 
            return isValid;
        });
    });
</script>    
</div>
<div class="col-md-12">
 <lable>Post Tags :</lable>
 <input type="text" name="tag" style="width:100%;height:50px;" placeholder="Post Tags" required/><br>
                            </div>

<div class="col-md-12"><lable>Post Category</lable>
                            <select name="category" style="width:100%;height:50px;"required/>

<option value selected="true" disabled>Please select a category..</option>
<option value="AFFILIATE-MARKETING">AFFILIATE MARKETING</option>
<option value="AMAZON">AMAZON</option>
<option value="APPS">APPS</option>
<option value="BING">BING</option>
<option value="DUCKDUCKGO">DUCKDUCKGO</option>
<option value="EMAIL-MARKETING">EMAIL MARKETING</option>
<option value="FACEBOOK">FACEBOOK</option>
<option value="GOOGLE">GOOGLE</option>
<option value="HOWTO">HOWTO&#039;S</option>
<option value="INSTAGRAM">INSTAGRAM</option>
<option value="LINKEDIN">LINKEDIN</option>
<option value="MARKETING">MARKETING</option>
<option value="MICROSOFT">MICROSOFT</option>
<option value="NEWS">NEWS</option>
<option value="PPC">PPC</option>
<option value="SEARCHENGINES">SEARCHENGINES</option>
<option value="SECURITY">SECURITY</option>
<option value="SEO">SEO</option>
<option value="SOCIAL">SOCIAL</option>
<option value="TECHNOLOGY">TECHNOLOGY</option>
<option value="TIKTOK">TIKTOK</option>
<option value="TWITTER">TWITTER</option>
<option value="WORDPRESS">WORDPRESS</option>
<option value="YOUTUBE">YOUTUBE</option> </select><br><br></div> 
<div class="col-md-12">
<textarea id="content" name="content" rows="10" style="width:100%;height:150px;" required/> </textarea>
        </div>
    <center>  <div id="hideDiv"> <input type="submit" style="background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;" name="submit" value="Submit Your Free Ads Now"> 
                               </div></center> 
    </form>
    <script src="ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#content' ),{
          ckfinder:
          {
            uploadUrl: 'fileupload.php'
          }
        })
        .then(editor => {
          console.log(editor);
        })
        .catch( error => {
            console.error( error );
        });
</script>
</div>
<div class="col-md-12">
      <!--bottom ad -->
</div>
            </div>
    <div class="col-md-3"><a href="#"><img src=""></a></div>
        </div>

                </div>

            </div>

        </div>
        
    </div> <!-- /.our-causes -->
</body>
</html>