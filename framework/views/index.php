<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$pwd = __DIR__;
?>
<html>
    <head>
        <title> <?=$pageTitle?> </title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php require_once $pwd.'/templates/global_style.php' ;?>
    </head>
    <body id='<?=$pageName?>' class="hold-transition skin-blue sidebar-mini">
        <?php require_once $pwd.'/templates/page_header.php'; ?>
        <?php require_once $pwd.'/templates/global_js.php' ;?>
    </body>
</html>

