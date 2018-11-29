<?php

// include_once "db.php";

function enregisterImage($tmpurl, $url)
{
// 	global $db;

	$statusMsg = '';

	// File upload path
	$targetDir = "/home/tristan/Documents/USMB/INFO_305/PainChocolatine/Site/uploads/"; // TODO
	$fileName = basename($url);
	$targetFilePath = $targetDir . $fileName;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

	/*$fn = mysqli_escape_string($db, $fileName);
	$cmd = "INSERT INTO `image` (`name`) VALUES ('$fn');";
	$val = mysqli_query($db, $cmd);*/

	// Allow certain file formats
	$allowTypes = array('jpg','png','jpeg','gif','pdf');
	if (in_array($fileType, $allowTypes)) {
		// Upload file to server
		if (move_uploaded_file($tmpurl, $targetFilePath)) {
			// Insert image file name into database

			/*if ($val)*/ {
				$statusMsg = "The file ".$fileName. " has been uploaded successfully.";
				return true;
			}
			/*else {
				$statusMsg = "File upload failed, please try again.";
				return false;
			}*/
		}
		else {
			$statusMsg = "Sorry, there was an error uploading your file.";
			return false;
		}
	}
	else {
		$statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
		return false;
	}
}

function imagePath($image)
{
	$targetDir = "uploads/"; // TODO
	return $targetDir . $image;
}

?>
