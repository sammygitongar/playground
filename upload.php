<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the base64 image data from the POST request
    $base64_image = $_POST["image"];

    // Decode the base64 string into an image file
    $image_data = base64_decode($base64_image);

    // Specify the directory where you want to save the image
    $upload_dir = "uploads/";

    // Generate a unique filename
    $filename = $upload_dir . uniqid() . ".jpg"; // You can modify the filename or use a different extension

    // Save the image to the specified directory
    file_put_contents($filename, $image_data);

    // Optionally, you can return the filename or any other information to the client
    echo $filename;
}
