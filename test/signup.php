<?php
include_once "database.php";

if (isset($_POST["email"]))
{
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    try
    {
        $sqlInsert = "INSERT INTO `usertbl` (users, email, password, date)
        VALUES (:username, :email, :password, now());";

        $stmt = $db->prepare($sqlInsert);
        $stmt->execute(array(":username" => $username, ":email" => $email, ":password" => $password));

        if ($stmt->rowCount() == 1)
            echo "Registration succesful.";
    }
    catch (PDOException $ex)
    {
        echo "Failed to register: ".$ex->getMessage();
    }

}
?>

<h1>Registration page</h1>

<form action="" method="post">
    <input type="text" name="username" placeholder="username" value="">
    <input type="email" name="email" placeholder="email" value="">
    <input type="password" name="password" placeholder="password" value="">
    <input type="submit" name="submit" placeholder="submit" value="signup">
</form>