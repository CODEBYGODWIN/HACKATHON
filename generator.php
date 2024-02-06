<!-- download.php -->
<?php
header("Content-disposition: attachment; filename=generated.html");
header("Content-type: text/html");
readfile("generated.html");
?>
