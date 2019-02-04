<script src="jquery/jquery-1.12.4.min.js"></script>
<?php
include "connection.php";
$target_dir = "img/";
$target_file_name = $target_dir .$_POST['filepic'];
// $namafile = basename($_FILES["file"]["name"]);
$response = array();

// Check if image file is a actual image or fake image
if (isset($_FILES["file"])) 
{
   if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file_name)) 
   {
     $success = true;
     $message = "Successfully Uploaded";
     //ajax
      $useremail = $_POST['useremail'];
      // $useremail = 'roe@gm.com';
      $nama = $_POST['nama'];
      $tanggal = $_POST['tanggal'];
      $nominal = $_POST['nominal'];
      $filepic = $_POST['filepic'];
      $query = $kon->query("INSERT INTO trdonasi (useremail, nama, tanggal, nominal, filepic, fgvalid, createddate) VALUES('$useremail', '$nama', '$tanggal', '$nominal', '$filepic', 'N', NOW())")or die(mysqli_error());
      if($query){
        echo "<script>document.location='donasianda.php?useremail=".$useremail."'</script>";
      }
     //
   }
   else 
   {
      $success = false;
      $message = "Error while uploading";
   }
}
else 
{
      $success = false;
      $message = "Required Field Missing";
}
$response["success"] = $success;
$response["message"] = $message;
// echo json_encode($response);

?>