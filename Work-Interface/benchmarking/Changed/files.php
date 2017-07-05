<?php

function addImage($conn,$filename)
{
  // Open and read the file that was uploaded
  $fp = fopen($filename, "r");
  if($fp == false)
      echo "Error opening file";
  // Begin a PostgreSQL transaction
  pg_exec("begin");
 
  // create the large object and get the lo id
  $lo_id = pg_locreate();
 
  // have postgresql open the large object for writing
  $lo_fp = pg_loopen($lo_id, "w");
 
  // for ever 8192 bytes of the uploaded file
  while($nbytes = fread($fp, 8192)) {
    
    // write to the large object
    $tmp = pg_lowrite($lo_fp, $nbytes);
    
    // handle possible error
    if($tmp < $nbytes) {
      echo "error while writing large object";
    }
    
  }
 
  // close the large object
  pg_loclose($lo_fp);
 
  // commit the postgresql transaction
  pg_exec("commit");
 
  // close the uploaded file
  fclose($fp);
 
 
  if (!is_int($lo_id)) {
     // return false
    return false;
  }
    
  if (is_int($lo_id)) {
    // return large object id
    return $lo_id;
  }
 
}

function ReadImage($lo_id,$filesize)
{
    pg_exec("begin");
    
    $handle = pg_lo_open($lo_id,"r");
    $data = pg_lo_read($handle,$filesize);
    //pg_lo_close($lo_fp);

    //pg_exec($conn,"commit");
    return $data;    
}

function WriteImageToFile($id,$filename,$filesize)
{
    $data = ReadImage($id,$filesize);
    $f = fopen($filename,"w");
    if(fwrite($f,$data) == FALSE)
    {
        $message ="ERROR";//getTokenValue("CANT_WRITE_FILE",$lang)." 
dbresource.txt";
    }
    fclose($f);
}
?>




-------- Database ----------------

CREATE TABLE images (
    name text,
    image oid,
    filesize bigint
);


---------- File to Database Exemple ------------
include("image.php");
$filetosave="HPIM0551.JPG" // file to save in the database
$loId = addImage($conn,$filetosave);
$id_Desc = $filetosave;
$fsize=filesize("HPIM0551.JPG");
$sql = "INSERT INTO images(name,value,filesize) 
VALUES('$id_Desc','$loId','$fsize')";
pg_query($sql);



-------- Database to Files Exemple ------------
include("image.php");
$sql = "Select value,name,filesize FROM images";
$res = Query($conn,$sql);
$dir = "C:\\images\\"; // directory
while(Fetch($res))
{
if (Cell($res,2))
{
 WriteImageToFile(Cell($res,0),$dir.Cell($res,1),Cell($res,2));
}
}
