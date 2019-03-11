<?php defined('DIR') OR exit();
    if (empty($storage->product)) {
        $section = $storage->section;
    } else {
        $section = $storage->product;
    }
    $section['pid'] = $storage->product['id'];
    $section['id'] = $storage->section['id'];
?>
<head>
    <base href="<?php echo href(); ?>" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo strip_tags($section["title"].' - '.s('sitetitle')); ?></title>
    <link type="text/css" media="all" rel="stylesheet" href="<?php echo WEBSITE ?>/css/general.css" />
    <link type="text/css" media="all" rel="stylesheet" href="<?php echo WEBSITE ?>/css/<?php echo l() ?>.css" />
    <link type="text/css" media="all" rel="stylesheet" href="<?php echo JAVASCRIPT ?>/beatpicker/beatpicker.min.css" />
    <script type="text/javascript" src="<?php echo JAVASCRIPT ?>/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo JAVASCRIPT ?>/beatpicker/beatpicker.min.js"></script>
</head>
<?php
	echo html_decode($storage->content);
?>