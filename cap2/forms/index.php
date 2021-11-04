<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
<form method="post" action="welcome.php">
    <input type="text" name="name"/>
    <input type="email" name="email"/>
    <input type="password" name="password"/>
    <div>
        <label for="male">Male</label><input id="male" type="radio" name="gender" value="male">
        <label for="female">Female</label><input  type="radio" id="female" name="gender" value="female">
        <label for="other">Other</label><input type="radio" id="other" name="gender" value="other">
    </div>
    <input type="submit" name="submit" value="send!">
</form>
</body>
</html>
