<?php
/** APP: Ajax Image uploader with progress bar
    Website:packetcode.com
    Author: Krishna TEja G S
    Date: 29th April 2014
***/

// an array of allowed extensions
include("connect.php");
if (session_id() == "")
    session_start();
$allowedExts = array("gif", "jpeg", "jpg", "png","GIF","JPEG","JPG","PNG");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);


//check if the file type is image and then extension
// store the files to upload folder
//echo '0' if there is an error
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {
    echo "0";
  } else {
      $naziv = $_FILES["file"];
      $update = "Update  korisnik  set profile_pic = '".$_FILES['file']["name"]."'where ID='".$_SESSION['ID']."'"; 
      
      if (mysql_query($update)) {
          $target = "upload/";
          move_uploaded_file($_FILES["file"]["tmp_name"], $target. $_FILES["file"]["name"]);
          
         	echo "Uspjesno ste promijenili sliku";
					echo  "<script> window.location.close(); </script>";

          
      } else {
          echo "Pogreška kod unosa podataka u bazu podataka:" . mysql_error();
      }
   
  }
} else {
  echo "0";
}
?>
