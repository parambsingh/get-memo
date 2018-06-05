<?php 
header('Content-disposition: attachment; filename='.$_GET['file']);
header('Content-type: application/stack');

echo file_get_contents($_GET['file']);


