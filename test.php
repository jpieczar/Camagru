<html>
	<head>
		<title>Camera</title>
	</head>
	<body>
	<form action="" method="post" enctype="multipart/form-data">
        <table>
            <input type="file" name="file">
            <button type="submit" name="upload">upload</button>
        </table>
        </form>
	</body>
</html>
<?php
// if(isset($_POST["submit1"]))
// {
// 	var_dump($_FILES);
// 	$imgname = $_FILES["f1"]["name"];
// 	$dst = "/goinfre/jpieczar/Desktop/Mamp/apache2/htdocs/Camagru/app/img_database/".$imgname;
// 	move_uploaded_file($_FILES["file"]["tmp_name"], $dst);
// }

if(isset($_POST['upload']))
{
	var_dump($_FILES);
    echo "<br>"."START"."<br>";
    $file = $_FILES['file'];
    $filename = $_FILES['file']['name'];
    $filetempname = $_FILES['file']['tmp_name'];
    $fileError = $_FILES['file']['error'];
    $filesize = $_FILES['file']['size'];
    $filetype = $_FILES['file']['type'];
    $fileExt = explode('.', $filename);
    $fileactuallyExt = strtolower(end($fileExt));
    $allow = array('jpg', 'jpeg', 'png');
    if(in_array($fileactuallyExt, $allow))
    {
		echo "1"."<br>";
        if($fileError === 0)
        {
			echo "2"."<br>";
            if($filesize > 0)
            {
				echo "3"."<br>";
				$fileNewName = "camagru".uniqid("").".".$fileactuallyExt;
				echo $fileNewName."<br>";
				$fileDestination = '/goinfre/jpieczar/Desktop/Mamp/apache2/htdocs/Camagru/app/img_database/'.$fileNewName;
				echo $fileDestination."<br>";
				if(move_uploaded_file($filetempname, $fileDestination))
					echo "NICE"."<br>";
				else
					echo "NOPE"."<br>";
                //header("Location: index.php?uploadsuccesss");
			}
			else
			{
				echo "Too large";
			}
        }
    }
}
?>