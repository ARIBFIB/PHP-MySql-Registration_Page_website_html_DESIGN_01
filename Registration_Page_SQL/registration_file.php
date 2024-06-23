<?php
/*
MIT License
Copyright (c) 2019 Fernando 
https://github.com/fernandod1/
*/

// Configure your MySQL database connection details:
$mysqlserverhost = "localhost";
$database_name = "Registration_Page_DESIGN_01";
$username_mysql = "root";
$password_mysql = "";

function sanitize($variable){
    $clean_variable = strip_tags($variable);
    $clean_variable = htmlentities($clean_variable, ENT_QUOTES, 'UTF-8');
    return $clean_variable;
}

function connect_to_mysqli($mysqlserverhost, $username_mysql, $password_mysql, $database_name){
    $connect = mysqli_connect($mysqlserverhost, $username_mysql, $password_mysql, $database_name);
    if (!$connect) {
        die("Connection failed mysql: " . mysqli_connect_error());
    }
    return $connect;    
}

if(isset($_POST["processform"])){
    $connection = connect_to_mysqli($mysqlserverhost, $username_mysql, $password_mysql, $database_name);
    $first_name = mysqli_real_escape_string($connection, sanitize($_POST["first_name"]));
    $last_name = mysqli_real_escape_string($connection, sanitize($_POST["last_name"]));
    $address1 = mysqli_real_escape_string($connection, sanitize($_POST["address1"]));
    $address2 = mysqli_real_escape_string($connection, sanitize($_POST["address2"]));
    $city = mysqli_real_escape_string($connection, sanitize($_POST["city"]));
    $state = mysqli_real_escape_string($connection, sanitize($_POST["state"]));
    $postal_code = mysqli_real_escape_string($connection, sanitize($_POST["postal_code"]));    
    $phone = mysqli_real_escape_string($connection, sanitize($_POST["phone"]));
    $email = mysqli_real_escape_string($connection, sanitize($_POST["email"]));
    $reference = mysqli_real_escape_string($connection, sanitize($_POST["reference"]));
    $feedback = mysqli_real_escape_string($connection, sanitize($_POST["feedback"]));
    $suggestions = mysqli_real_escape_string($connection, sanitize($_POST["suggestions"]));
    $recommend = mysqli_real_escape_string($connection, sanitize($_POST["recommend"]));
    $reference1_name = mysqli_real_escape_string($connection, sanitize($_POST["reference1_name"]));
    $reference1_address = mysqli_real_escape_string($connection, sanitize($_POST["reference1_address"]));
    $reference1_contact = mysqli_real_escape_string($connection, sanitize($_POST["reference1_contact"]));
    $reference2_name = mysqli_real_escape_string($connection, sanitize($_POST["reference2_name"]));
    $reference2_address = mysqli_real_escape_string($connection, sanitize($_POST["reference2_address"]));
    $reference2_contact = mysqli_real_escape_string($connection, sanitize($_POST["reference2_contact"]));
  
    $sql = "INSERT INTO signup_registrationform01 (
        First_Name,
        Last_Name,
        Address1, 
        Address2,
        City,
        State,
        Postal_Code,
        Phone_No,
        Email_Address,
        Reference,
        Feedback,
        Suggestions,
        Recommend,
        Reference1_Name,
        Reference1_Address,
        Reference1_Contact,
        Reference2_Name,
        Reference2_Address,
        Reference2_Contact
        ) 
      VALUES (
        '$first_name',
        '$last_name',
        '$address1',
        '$address2',
        '$city' ,
        '$state' ,
        '$postal_code',
        '$phone',
        '$email',
        '$reference',
        '$feedback',
        '$suggestions',
        '$recommend',
        '$reference1_name',
        '$reference1_address',
        '$reference1_contact',
        '$reference2_name',
        '$reference2_address',
        '$reference2_contact'
        )";

    if (mysqli_query($connection, $sql)) {
        echo "<h2><font color=blue>New record added to database.</font></h2>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Registration</title>
<style>
/* ===== Google Font Import - Poppins ===== */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #4070f4;
}
.container{
    position: relative;
    max-width: 900px;
    width: 100%;
    border-radius: 6px;
    padding: 30px;
    margin: 0 15px;
    background-color: #fff;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}
.container header{
    position: relative;
    font-size: 20px;
    font-weight: 600;
    color: #333;
}
.container header::before{
    content: "";
    position: absolute;
    left: 0;
    bottom: -2px;
    height: 3px;
    width: 27px;
    border-radius: 8px;
    background-color: #4070f4;
}
.container form{
    position: relative;
    margin-top: 16px;
    min-height: 490px;
    background-color: #fff;
    overflow: hidden;
}
.container form .form{
    position: absolute;
    background-color: #fff;
    transition: 0.3s ease;
}
.container form .form.second{
    opacity: 0;
    pointer-events: none;
    transform: translateX(100%);
}
form.secActive .form.second{
    opacity: 1;
    pointer-events: auto;
    transform: translateX(0);
}
form.secActive .form.first{
    opacity: 0;
    pointer-events: none;
    transform: translateX(-100%);
}
.container form .title{
    display: block;
    margin-bottom: 8px;
    font-size: 16px;
    font-weight: 500;
    margin: 6px 0;
    color: #333;
}
.container form .fields{
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}
form .fields .input-field{
    display: flex;
    width: calc(100% / 3 - 15px);
    flex-direction: column;
    margin: 4px 0;
}
.input-field label{
    font-size: 12px;
    font-weight: 500;
    color: #2e2e2e;
}
.input-field input, select, textarea{
    outline: none;
    font-size: 14px;
    font-weight: 400;
    color: #333;
    border-radius: 5px;
    border: 1px solid #aaa;
    padding: 0 15px;
    height: 42px;
    margin: 8px 0;
    resize: none;
}
.input-field textarea{
    height: auto;
    padding: 10px;
}
.input-field input:focus,
.input-field select:focus,
.input-field textarea:focus{
    box-shadow: 0 3px 6px rgba(0,0,0,0.13);
}
.input-field select,
.input-field input[type="date"]{
    color: #707070;
}
.input-field input[type="date"]:valid{
    color: #333;
}
.container form button, .backBtn{
    display: flex;
    align-items: center;
    justify-content: center;
    height: 45px;
    max-width: 200px;
    width: 100%;
    border: none;
    outline: none;
    color: #fff;
    border-radius: 5px;
    margin: 25px 0;
    background-color: #4070f4;
    transition: all 0.3s linear;
    cursor: pointer;
}
.container form .btnText{
    font-size: 14px;
    font-weight: 400;
}
form button:hover{
    background-color: #265df2;
}
form button i,
form .backBtn i{
    margin: 0 6px;
}
form .backBtn i{
    transform: rotate(180deg);
}
form .buttons{
    display: flex;
    align-items: center;
}
form .buttons button , .backBtn{
    margin-right: 14px;
}

@media (max-width: 750px) {
    .container form{
        overflow-y: scroll;
    }
    .container form::-webkit-scrollbar{
       display: none;
    }
    form .fields .input-field{
        width: calc(100% / 2 - 15px);
    }
}

@media (max-width: 550px) {
    form .fields .input-field{
        width: 100%;
    }
}
</style>
<script type="text/javascript">
  function validateForm() {
    var a = document.forms["Form"]["first_name"].value;
    var b = document.forms["Form"]["last_name"].value;
    var c = document.forms["Form"]["address1"].value;
    var d = document.forms["Form"]["address2"].value;
    var e = document.forms["Form"]["city"].value;
    var f = document.forms["Form"]["state"].value;
    var g = document.forms["Form"]["postal_code"].value;
    var h =document.forms["Form"]["phone"].value;
    var i =document.forms["Form"]["email"].value;
    var j =document.forms["Form"]["reference"].value;
    var k =document.forms["Form"]["feedback"].value;
    var l =document.forms["Form"]["suggestions"].value;
    var m =document.forms["Form"]["recommend"].value;
    var n =document.forms["Form"]["reference1_name"].value;
    var o =document.forms["Form"]["reference1_address"].value;
    var p =document.forms["Form"]["reference1_contact"].value;
    var q =document.forms["Form"]["reference2_name"].value;
    var r =document.forms["Form"]["reference2_address"].value;
    var s =document.forms["Form"]["reference2_contact"].value;

if (
a == null || a == "",
b == null || b == "",
c == null || c == "", 
d == null || d == "",
e == null || e == "",
f == null || f == "",
g == null || g == "",
h == null || h == "",
i == null || i == "",
j == null || j == "",
k == null || k == "",
l == null || l == "",
m == null || m == "",
n == null || n == "",
o == null || o == "",
p == null || p == "",
q == null || q == "",
r == null || r == "",
s == null || s == ""
)
    {
        alert("Please Fill All Required Field");    
        return false;
    }
}
</script>
</head>
<body>
    <div class="container">
        <header>Registration</header>
        <form action="registration_file.php" method="post" name="signUpForm" onsubmit="return validateForm()">
            <input type="hidden" name="processform" value="1">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label for="first_name">First Name *</label>
                            <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
                        </div>
                        <div class="input-field">
                            <label for="last_name">Last Name *</label>
                            <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
                        </div>
                        <div class="input-field">
                            <label for="address1">Address *</label>
                            <input type="text" id="address1" name="address1" placeholder="Street Address" required>
                        </div>
                        <div class="input-field">
                            <label for="address2">Address Line 2</label>
                            <input type="text" id="address2" name="address2" placeholder="Street Address Line 2">
                        </div>
                        <div class="input-field">
                            <label for="city">City *</label>
                            <input type="text" id="city" name="city" placeholder="City" required>
                        </div>
                        <div class="input-field">
                            <label for="state">State/Province *</label>
                            <input type="text" id="state" name="state" placeholder="State / Province" required>
                        </div>
                    </div>
                </div>
                <div class="details ID">
                    <div class="fields">
                        <div class="input-field">
                            <label for="postal_code">Postal/Zip Code *</label>
                            <input type="text" id="postal_code" name="postal_code" placeholder="Postal / Zip Code" required>
                        </div>
                        <div class="input-field">
                            <label for="phone">Phone Number *</label>
                            <input type="tel" id="phone" name="phone" placeholder="(000) 000-0000" required>
                        </div>
                        <div class="input-field">
                            <label for="email">E-mail *</label>
                            <input type="email" id="email" name="email" placeholder="example@example.com" required>
                        </div>
                        <div class="input-field">
                            <label for="reference">Reference *</label>
                            <input type="text" id="reference" name="reference" placeholder="Reference" required>
                        </div>
                        <div class="input-field">
                            <label for="feedback">Feedback *</label>
                            <textarea id="feedback" name="feedback" placeholder="Your Feedback" required></textarea>
                        </div>
                        <div class="input-field">
                            <label for="suggestions">Suggestions *</label>
                            <textarea id="suggestions" name="suggestions" placeholder="Your Suggestions" required></textarea>
                        </div>
                    </div>
                    <button class="nextBtn" type="button" onclick="document.querySelector('form').classList.add('secActive')">
                        <span class="btnText">Next</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div> 
            </div>
            <div class="form second">
                <div class="details address">
                    <div class="fields">
                        <div class="input-field">
                            <label for="recommend">Recommend *</label>
                            <textarea id="recommend" name="recommend" placeholder="Your Recommendations" required></textarea>
                        </div>
                        <div class="input-field">
                            <label for="reference1_name">Reference 1 Name *</label>
                            <input type="text" id="reference1_name" name="reference1_name" placeholder="Reference 1 Name" required>
                        </div>
                        <div class="input-field">
                            <label for="reference1_address">Reference 1 Address *</label>
                            <input type="text" id="reference1_address" name="reference1_address" placeholder="Reference 1 Address" required>
                        </div>
                        <div class="input-field">
                            <label for="reference1_contact">Reference 1 Contact *</label>
                            <input type="tel" id="reference1_contact" name="reference1_contact" placeholder="Reference 1 Contact" required>
                        </div>
                        <div class="input-field">
                            <label for="reference2_name">Reference 2 Name *</label>
                            <input type="text" id="reference2_name" name="reference2_name" placeholder="Reference 2 Name" required>
                        </div>
                        <div class="input-field">
                            <label for="reference2_address">Reference 2 Address *</label>
                            <input type="text" id="reference2_address" name="reference2_address" placeholder="Reference 2 Address" required>
                        </div>
                        <div class="input-field">
                            <label for="reference2_contact">Reference 2 Contact *</label>
                            <input type="tel" id="reference2_contact" name="reference2_contact" placeholder="Reference 2 Contact" required>
                        </div>
                    </div>
                    <div class="buttons">
                        <button class="backBtn" type="button" onclick="document.querySelector('form').classList.remove('secActive')">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </button>
                        <button class="submit" type="submit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
    </div>
</body>

</html>


