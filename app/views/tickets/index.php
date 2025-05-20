<?php
require_once APPROOT . '/config/config.php';

if (!isset($data)) {
    $data = ['title' => 'Aurora Theater'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?></title>
</head>
<body>
   
</body>
</html>