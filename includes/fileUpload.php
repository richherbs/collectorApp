<?php
function uploadImage() :string {
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["pic"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["pic"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }   

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
            echo '<script>window.location = "index.php"</script>';
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    return $target_file;
}

function addNewBikeToDB(string $aFilePath, PDO $aDBConnection){
    $make = $_POST['brand'];
    $model = $_POST['model'];
    $discipline = $_POST['discipline'];
    $wheelsize = $_POST['wheelsize'];

    // prepare
    $query = $aDBConnection->prepare("INSERT INTO bikes (brand_ID, model, discipline_ID, wheelSize_id, pic_url)
                            VALUES (:make, :model, :discipline, :wheelsize, :pic)");

    // execute
    $query->execute(['make'=>$make, 'model'=>$model, 'discipline'=>$discipline, 'wheelsize'=>$wheelsize, 'pic'=>$aFilePath]);
}

if(isset($_POST['submit'])){

    $filePath = uploadImage();

    addNewBikeToDB($filePath, $db);
}
?>