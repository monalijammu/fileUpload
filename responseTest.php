<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
	$nameErr = "";
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
  
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
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
//if you have reached this line all values are satisfied
  if(empty($nameErr) && empty($emailErr) && empty($genderErr)){
	 echo "Your form has been submitted successfully";
  }

}else{
	//write your html code
  echo "<h2>Your Input:</h2>";
  echo "Name: $name<br>";
  echo "Email: $email<br>";
  echo "Website: $website<br>";
  echo "Comment: $comment<br>";
  echo "Gender: $gender<br>";
  }



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!-- Printng the form for the client with values evaluated -->
<form method="post" action="responseTest.php">

Name: <input type="text" name="name" 
			 <?php if(!empty($name)) echo 'value=" '.$name.' " '; ?> >
<span class="error">* <?php if(!empty($nameErr)) echo $nameErr;?></span>
<br><br>
E-mail:
<input type="text" name="email" <?php if(!empty($email)) echo 'value=" '.$email.' " '; ?> >
<span class="error">* <?php if(!empty($emailErr)) echo $emailErr;?></span>
<br><br>
Website:
<input type="text" name="website" 
	   <?php if(!empty($website)) echo 'value=" '.$website.' " '; ?> >
<span class="error"></span>
<br><br>
Comment: <textarea name="comment" rows="5" cols="40" 
				   <?php if(!empty($comment)) echo 'value=" '.$comment.' " '; ?> ></textarea>
<br><br>
Gender:
<input type="radio" name="gender" value="female" 
	   <?php if($gender == 'female') echo 'checked'; ?>
	   >Female
<input type="radio" name="gender" value="male"
	   <?php if($gender == 'male') echo 'checked'; ?>
	   >Male
<input type="radio" name="gender" value="other" 
	   <?php if($gender == 'other') echo 'checked'; ?>
	   >Other
<span class="error">* <?php if(!empty($genderErr)) echo $genderErr;?></span>
<br><br>
<input type="submit" name="submit" value="Submit">

</form>

