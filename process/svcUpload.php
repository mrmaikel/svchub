<?php

function uploadImage($files,$adId,$pos) {

  // You need to add server side validation and better error handling here
  $data = array();

  if(isset($files)) {
    $error = false;
    $newId="";
    $cnt=0;
    $files = array();
    
    if (isset($_FILES)) {
      $uploaddir = "../adData/".$adId."/";
      $thumbpath = "../adData/".$adId."/thumbs/";
      
      // create folder if not exists
      if (!is_dir($uploaddir)) {
        mkdir($uploaddir, 0777, true);
        mkdir($thumbpath, 0777, true);
      }
      //$data = array('error' => $files);
      $posArr = explode("|*|",$pos);
      foreach($_FILES as $file) {
        if (is_dir($uploaddir)) {
          $cnt=$cnt+1;
          $position=$posArr[$cnt-1];

          // delete existing images from db and folder if pos exists
          $sqlFindImg="select * from adimg where adid=".$adId." and pos=".$position;
          $resFindImg=mysqli_query(conn(),$sqlFindImg);
          $resFindCnt = mysqli_num_rows($resFindImg);
          
          if ($resFindCnt==1) {
            while($rowFindImg = mysqli_fetch_array($resFindImg)) {
              $sqlDelImg="delete from adimg where id=".$rowFindImg["id"];
              $resDelImg=mysqli_query(conn(),$sqlDelImg);
              if ($resDelImg==1) {
                if (file_exists($uploaddir.$rowFindImg["name"])) {
                  unlink($uploaddir.$rowFindImg["name"]);
                  unlink($thumbpath.$rowFindImg["name"]);
                }
              }
            }
          }
        //return "x";
          //if (!file_exists($uploaddir.$file['name'])) {

          //$name=explode(".",basename($file['name']))[0];
          try {
            $url = $uploaddir.basename($file['name']);
            $size = filesize($file["tmp_name"]);
          } catch(Exception $e) {
            return $e->message();
          }
          
          // max 0.5MB - 500,000 Byte = 500KB = 0.5MB
          // files more than 0.5MB will be reduced to 50% quality
          // set max file upload size to 10MB
          // docker container exec -it 9ddd9bded663 bash -c "echo 'php_value upload_max_filesize 10M' > '/var/www/html/.htaccess'"
          // even for 4MB file, compress image reduced it to 8KB
          if ($size<=500000) { $quality=100; } else { $quality=50; }

          $filename = compressImage($file["tmp_name"],$url,$quality);

          //if(move_uploaded_file($file['tmp_name'],$uploaddir.basename($file['name']))) {
          if ($filename) {
            //insert in adimg table
            $sqlImg="insert into adimg (name,path,adId,pos,size) values ('".basename($file['name'])."','adData/".$adId."/".basename($file['name'])."',".$adId.",".$position.",'".$size."')";
            $link=conn();
            $resImg=mysqli_query($link,$sqlImg);
            $newId=mysqli_insert_id($link);

            //createThumbnail($file['name'],$uploaddir,$thumbpath);
            $thumbUrl = $uploaddir."/thumbs/".basename($file['name']);

            if ($size<=100000) { $quality=100; } else { $quality=50; }
            createThumbnail($file['tmp_name'],$thumbUrl,$quality);
          } else {
            $data = array('error' => 'Failed to copy files');
          }
          $data = array('files' => $_FILES,'newId' => $newId);
          //} else {
          //  $data = array('error' => 'File with the same filename already exists');
          //}
        }
      }
    }
  } else {
    $data = array('error' => 'Failed to get files');
  }
  //echo json_encode($data);

  return $data;
}

function compressImage($source,$destination,$quality) {

  $info = getimagesize($source);
  if ($info['mime'] == 'image/jpeg') {
    $image = imagecreatefromjpeg($source);
  } elseif ($info['mime'] == 'image/gif') {
    $image = imagecreatefromgif($source);
  } elseif ($info['mime'] == 'image/png') {
    $image = imagecreatefrompng($source);
  }

  $ox = imagesx($image);
  $oy = imagesy($image);

  // resize with ratio
  if ($ox>$oy) {
    $imgWidth = 400;
    $nx = $imgWidth;
    $ny = floor($oy * ($imgWidth / $ox));
  } else {
    $imgWidth = 150;
    $nx = $imgWidth;
    $ny = floor($oy * ($imgWidth / $ox));
  }

  $nm = imagecreatetruecolor($nx,$ny);

  if ($info['mime'] == 'image/gif') {
    $background = imagecolorallocate($im, 0, 0, 0);
    imagecolortransparent($im, $background);
  } elseif ($info['mime'] == 'image/png') {
    $white = imagecolorallocate($nm, 255, 255, 255);
    imagefill($nm,0,0,$white);
  }

  imagecopyresampled($nm, $image, 0,0,0,0,$nx,$ny,$ox,$oy);

  imagejpeg($nm,$destination,$quality);

  return $destination;
}

function createThumbnail($source,$destination,$quality) {
  $info = getimagesize($source);
  if ($info['mime'] == 'image/jpeg') {
    $image = imagecreatefromjpeg($source);
  } elseif ($info['mime'] == 'image/gif') {
    $image = imagecreatefromgif($source);
  } elseif ($info['mime'] == 'image/png') {
    $image = imagecreatefrompng($source);
  }

  $ox = imagesx($image);
  $oy = imagesy($image);

  $nx = 100;
  $ny = 100;

  $nm = imagecreatetruecolor($nx,$ny);

  if ($info['mime'] == 'image/gif') {
    $background = imagecolorallocate($im, 0, 0, 0);
    imagecolortransparent($im, $background);
  } elseif ($info['mime'] == 'image/png') {
    $white = imagecolorallocate($nm, 255, 255, 255);
    imagefill($nm,0,0,$white);
  }

  imagecopyresampled($nm, $image, 0,0,0,0,$nx,$ny,$ox,$oy);

  imagejpeg($nm,$destination,$quality);
}







function createThumbnailOri($filename,$filepath,$thumbpath) {
    $imgWidth=100;
    if(preg_match('/[.](jpg)$/', $filename)) {
      $im = imagecreatefromjpeg($filepath.$filename);
    } else if (preg_match('/[.](gif)$/', $filename)) {
      $im = imagecreatefromgif($filepath.$filename);
    } else if (preg_match('/[.](png)$/', $filename)) {
      $im = imagecreatefrompng($filepath.$filename);
    }

    $ox = imagesx($im);
    $oy = imagesy($im);

    $nx = $imgWidth;
    //$ny = floor($oy * ($imgWidth / $ox));
    $ny = $imgWidth;

    $nm = imagecreatetruecolor($nx,$ny);

    // fix black background for png
    if (preg_match('/[.](png)$/', $filename)) {
        $white = imagecolorallocate($nm, 255, 255, 255);
        imagefill($nm,0,0,$white);
    } else if (preg_match('/[.](gif)$/', $filename)) {
        $background = imagecolorallocate($im, 0, 0, 0);
        imagecolortransparent($im, $background);
    }

    imagecopyresampled($nm, $im, 0,0,0,0,$nx,$ny,$ox,$oy);

    if(!file_exists($thumbpath)) {
      if(!mkdir($thumbpath)) {
           die("There was a problem. Please try again!");
      }
       }

    imagejpeg($nm,$thumbpath.$filename);
    //$tn = '<img src="'.$thumbpath.$filename.'" alt="image" />';
    //$tn .= '<br />Congratulations. Your file has been successfully uploaded, and a thumbnail has been created.';
}

// deleting folders
function rmdir_recursive($dir) {
  if (file_exists($dir)) {
    foreach(scandir($dir) as $file) {
        if ('.' === $file || '..' === $file) continue;
        if (is_dir("$dir/$file")) {
          rmdir_recursive("$dir/$file");
          echo "Deleted folder $dir$file<br>";
        } else {
          unlink("$dir/$file");
          echo "Deleted file $dir$file<br>";
        }
    }
    rmdir($dir);
  }
}



/*
switch ($stype)
{
    case "png":
        // integer representation of the color black (rgb: 0,0,0)
        $background = imagecolorallocate($simage, 0, 0, 0);
        // removing the black from the placeholder
        imagecolortransparent($simage, $background);

        // turning off alpha blending (to ensure alpha channel information
        // is preserved, rather than removed (blending with the rest of the
        // image in the form of black))
        imagealphablending($simage, false);

        // turning on alpha channel information saving (to ensure the full range
        // of transparency is preserved)
        imagesavealpha($simage, true);

        break;
    case "gif":
        // integer representation of the color black (rgb: 0,0,0)
        $background = imagecolorallocate($simage, 0, 0, 0);
        // removing the black from the placeholder
        imagecolortransparent($simage, $background);

        break;
 }
 */

?>
