<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $MobileeErr = $idErr = $PasswordErr ="";
$name = $email = $gender = $comment = $Mobile =$id = $Password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["id"])) {
      $idErr = "id is required";
    } else {
      $id = test_input($_POST["id"]);
      // check if name only contains letters and whitespace
      if (!preg_match(" /^[a-z0-9_-]\w{5,20}$/",$id)) {
        $idErr = "Only letters and white space allowed";
      }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["Password"])) {
        $PasswordErr = "Password is required";
      } else {
        $Password = test_input($_POST["Password"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^(?=.*[a-zA-Z])(?=.*[0-9]).{7,16}$/",$Password)) {
          $PasswordErr = "Only letters and white space allowed";
        }
      }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["Mobile"])) {
    $Mobile = "";
  } else {
    $Mobile = test_input($_POST["Mobile"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match(" /^01([016789]?)-?([0-9]{3,4})-?([0-9]{4})$/",$Mobile)) {
      $MobileErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  id: <input type="text" id="id" value="<?php echo $id;?>">
  <span class="error">* <?php echo $idErr;?></span>
  <br><br>
  Password: <input type="text" Password="Password" value="<?php echo $Password;?>">
  <span class="error">* <?php echo $PasswordErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Mobile: <input type="text" name="Mobile" value="<?php echo $Mobile;?>">
  <span class="error"><?php echo $MobileErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $id;
echo "<br>";
echo $Password;
echo "<br>";
echo $email;
echo "<br>";
echo $Mobile;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

</body>
</html>