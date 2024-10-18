<?php
// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define the upload directory
$target_dir = "files/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

// Allow certain file formats
$allowed_extensions = ['txt', 'jpg', 'png', 'php'];

// Check if the file has a valid extension
$file_extension = pathinfo($target_file, PATHINFO_EXTENSION);

if (in_array($file_extension, $allowed_extensions)) {
    // Attempt to upload the file
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "<h2>File has been uploaded.</h2>";

        // Check if the uploaded file is a PHP file
        if ($file_extension === 'php') {
            echo "<h3 style='color: green;'>You have successfully exploited the vulnerability!</h3>";
            // Include the uploaded PHP file to display its content (only for demonstration purposes)
            include($target_file);
        }
    } else {
        echo "<h3 style='color: red;'>Sorry, there was an error uploading your file.</h3>";
    }
} else {
    echo "<h3 style='color: red;'>Invalid file type! Only .txt, .jpg, .png, or .php files are allowed.</h3>";
}
?>
