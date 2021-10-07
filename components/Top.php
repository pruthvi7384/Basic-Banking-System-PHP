<?php
    session_start();
    include 'Site__url.php';
    include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Banking System</title>
    <!-- ---------Font Awsome CDN-------------- -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- ----X-----Font Awsome CDN----X-------- -->

    <!-- ----------Google Fonts---------------- -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital@0;1&display=swap" rel="stylesheet">
    <!-- -------X---Google Fonts------X-------- -->

    <!-- -----------Boostrap CDN------------------- -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- --------X---Boostrap CDN---X---------------- -->

    <!-- ---------External Style Sheet--------- -->
        <link rel="stylesheet" href="<?php echo SITE__PATH; ?>/style/style.css">
    <!-- -----X---External Style Sheet----X---- -->
</head>
<body>
