<!DOCTYPE Html>
<html>
<head>
	<title> PHP MOVE FILE </title>
</head>
<style>
body{
    background: #fafafa;
    font-family: sans-serif;
    color: #242424;
}
h2{
    color: #2e7eff;
}
.form{
	width: 50%;
	margin: 0 auto;
	background: #fff;
	box-shadow: 0 4px 10px rgba(0,0,0,0.10), 0 1px 2px rgba(0,0,0,0.10);
	border-radius: 15px;
	padding: 30px;
	margin-top: 30px;
}
</style>
<body>

	<div class="form">
		<h2>Moving a file to a new created folder</h2>
		<form action="index.php" method="post" enctype="multipart/form-data">
			<input type="text" name="dir" placeholder="Folder Name Here"><br><br>
			<input type="file" name="fileName"><br><br>
			<input type="submit" name="moveFile" value="Upload">
		</form>
		<br><br>

		<?php

		if(isset($_POST["moveFile"]))
		{	
			$dir = $_POST["dir"];
			$location = $dir . "/";
			$fileName = $_FILES["fileName"]["name"];
			$tempName = $_FILES["fileName"]["tmp_name"];
			if(isset($fileName))
			{
				$structure = "./" .$dir;
				if (!mkdir($structure, 0, true)) {
					echo "Failed to create folder";
				}
				if(!empty($fileName))
				{
					if(move_uploaded_file($tempName, $location.$fileName))
					{
						echo "File Uploaded to " .$dir;
					}
					else{
						echo "Not Uploaded to " .$dir;
					}
				}
			}
		}

		?>

	</div>
</body>
</html>
