<?php

    include 'dbconnect.php';

    echo 'it\'s a good day';
?>

    <form action="ajax.php" method='post' enctype='multipart/form-data'>
        <input type="text" name="adno" id="adno">
        <input type="file" name="image" id="image">
        <button type="submit">Submit</button>
    </form>

<?php 
//Process the form to submit
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $adno = $_POST['adno'];

    //File Upload Handling
    $target_dir = 'uploads/';
    $target_file = $target_dir.basename($_FILES['image']['name']);
    $uploadOK = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Generate unique filename
    $filename = basename($_FILES['image']['name']);
    $i = 1;
    while (file_exists($target_dir . $filename)) {
        $filename = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME) . $i . '.' . $imageFileType;
        $i++;
    }
    $target_file = $target_dir . $filename;

    //Check if the file is an image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $uploadOK = 1;
    } else {
        echo "File is not an image";
        $uploadOK = 0;
    }

    if($_FILES['image']['size'] > 1000000){
        echo "Sorry, your file is too large.";
        $uploadOK = 0;
    }

    if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg') {
        echo "Sorry, your image format is not allowed";
        $uploadOK = 0;
    }

    //Now upload the file
    if($uploadOK == 0){
        echo "File Uploading failed";
    } else {
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
            echo "The file ". htmlspecialchars( basename(($_FILES["image"]["name"]))) . " has been uploaded";
        //Insert data to DB
        $image_url = $target_file;
        $sql = "INSERT INTO ajax_test (adno, image_url) VALUES ('$adno', '$image_url' )";

        } if($conn->query($sql) === true) {
            echo "New record created";
        } else {
            echo "Error " .$sql . "<br>" . $conn->error;
        }

    } 

}






?>
