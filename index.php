Sure! In PHP, you can handle file uploads using the `$_FILES` superglobal. Here's a simple PHP project that demonstrates how to upload a file:

index.php:
```php
<!DOCTYPE html>
<html>
<head>
    <title>File Upload Example</title>
</head>
<body>
    <h1>File Upload Example</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file">Select a file:</label>
        <input type="file" name="file" id="file">
        <input type="submit" value="Upload">
    </form>
</body>
</html>
```

upload.php:
```php
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the file was uploaded without errors
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];

        // Move the uploaded file to a specific directory
        $upload_path = 'uploads/';
        move_uploaded_file($file_tmp, $upload_path . $file_name);

        echo "File uploaded successfully!";
    } else {
        echo "Error uploading file.";
    }
}
?>
```

In this example, the `index.php` file displays a form with a file input. When the user selects a file and clicks the "Upload" button, the form is submitted to the `upload.php` script. The `upload.php` script checks if the file was uploaded without errors and then moves the uploaded file to a directory called "uploads" within the project folder.

Please note that this is a basic example for demonstration purposes, and in a real-world application, you would need to implement additional security checks and handle various file types and sizes. Additionally, make sure to properly sanitize and validate the file before saving it to the server.