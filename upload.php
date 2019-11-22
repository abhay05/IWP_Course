<!DOCTYPE html>
<html>
<head>
<title>
    File Upload Program 
</title>
</head>
<body>
<form id="formn" name="formn" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="file" name="upload" id="upload">
<input type="submit" name="submit" value="Submit">
</form>
</body>
</html>

<?php
if(isset($_POST['submit']))
{


    $upload=0;
    $directory = "upload/";
    $finalfile = $directory.basename($_FILES['upload']['name']);
    $filesize=$_FILES['upload']['size'];
if($filesize>2097152)
    {
echo "file size is greater than 2 MB";
        $upload=1;
    }


    $fileextension="docx";
    $filename=$_FILES['upload']['name'];
    $filetype=strtolower(pathinfo($filename,PATHINFO_EXTENSION));
if($filetype!=$fileextension)
    {
echo "Only docx files are allowed";
        $upload=1;
    }


if(file_exists($finalfile))
    {
echo "Sorry File Already Exists";
        $upload=1;
    }

if($upload==0)
    {
if(move_uploaded_file($_FILES['upload']['tmp_name'],$finalfile))
        {
echo "File Upload Successful";
        }
    }

}
?>
