<?php

if(!defined('SAFETORUN')){
    echo 'You can\'t run this file on its own.';
    die;
}

/**
 * Take the information from the $_FILES super global to store an image file in the images folder and return the string containing the path to the image
 *
 * @return string - the relative path to the image in the site file structure
 */
function uploadImage() :string {
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["pic"]["name"]);
    $uploadOk = true;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["pic"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = true; 
        } else {
            echo "File is not an image.";
            $uploadOk = false;
        }
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = false;
    }   

    // Check if $uploadOk is set to 0 by an error
    if (!$uploadOk) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
            echo 'File Uploaded';
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    if(!$uploadOk){
        return '';
    }
    return $target_file;
}

/**
 * Taking information from the form and the path of an image in the server file system store a new entry in the bikes table.
 * If the pathname is null or the model is null then do not update the DB.
 *
 * @param string $aFilePath - path to the image of a new entry
 * @param PDO $aDBConnection - a connection to a database
 * @return void
 */
function addNewBikeToDB(string $aFilePath, PDO $aDBConnection, int $aMake, string $aModel, int $aDiscipline, int $aWheelsize){
    $make = $_POST['brand'];
    $model = $_POST['model'];
    $discipline = $_POST['discipline'];
    $wheelsize = $_POST['wheelsize'];

    if($aFilePath == ''){
        echo 'The database has not been updated as either the pic or the model is not there.';
    } else {
        // prepare
        $query = $aDBConnection->prepare("INSERT INTO bikes (brand_ID, model, discipline_ID, wheelSize_id, pic_url)
        VALUES (:make, :model, :discipline, :wheelsize, :pic)");

        // execute
        $query->execute(['make'=>$aMake, 'model'=>$aModel, 'discipline'=>$aDiscipline, 'wheelsize'=>$aWheelsize, 'pic'=>$aFilePath]);
    }
}

if(isset($_POST['submitAdd'])){
    $make = $_POST['brand'];
    $model = $_POST['model'];
    $discipline = $_POST['discipline'];
    $wheelsize = $_POST['wheelsize'];
    if(array_key_exists($make, selectorQuery($db, 'brand_name', 'brand')) && !empty($model) && array_key_exists($discipline, selectorQuery($db, 'discipline_name', 'discipline')) && array_key_exists($wheelsize, selectorQuery($db, 'wheel_diameter', 'wheelSize'))){
        $filePath = uploadImage();
        addNewBikeToDB($filePath, $db, $make, $model, $discipline, $wheelsize);
        echo '<script>window.location = "index.php"</script>';
    } else {
        echo 'Please make sure you make valid selections!';
    }
}
?>