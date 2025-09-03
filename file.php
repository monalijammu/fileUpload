<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File</title>
</head>
<body>

<?php 
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])){
        $nameErr = "Name is required";
    } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)){
        $nameErr = "Only letters and white space allowed";
    }
    }
    if (empty($_POST["email"])){
        $emailErr = "Email is required";
    } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailErr = "Invalid email format";
    }
    }
    if (empty($_POST["website"])) {
        $website = "";
    } else {
    $website = test_input($_POST["website"]);
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)){
        $websiteErr = "Invalid URL";
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

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

    <form method="post" action="welcome.php">
        Name:<input type="text" name="name" value="<?php echo $name;?>">
        <span class="error">*<?php echo $nameErr;?></span><br><br>
    E-mail: <input type="text" name="email" value="<?php echo $email;?>"><br>
    <span class="error">*<?php echo $emailErr;?></span><br><br>
    Website: <input type="text" name="website" value="<?php echo $website;?>"><br>
    <span class="error">*<?php echo $websiteErr;?></span><br><br>
    Comment: <textarea name="comment" rows="5" cols="40" value="<?php echo $comment;?>"></textarea><br><br>
    Gender: <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other
    <span class="error">*<?php echo $genderErr;?></span><br><br>
    <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>