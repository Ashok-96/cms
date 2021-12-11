<?php
if(isset($_GET["file"])){
    // Get parameters
    $file = $_GET["file"]; // Decode URL-encoded string

    /* Test whether the file name contains illegal characters
    such as "../" using the regular expression */
        $filepath = "Submission/".$file;
        if(file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-tiff');
            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
            header('Expires: 0');
             header('Content-Transfer-Encoding: binary');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            flush(); // Flush system output buffer
            readfile($filepath);
            die();
        } else {
            http_response_code(404);
	        die();
        }
    } else {
        die("Invalid file name!");
    }
?>