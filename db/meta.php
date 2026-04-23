<?php
	$prot = isset($_SERVER['HTTPS']) ? 'https' : 'http'; // Get protocol

	$addr = $prot . '://' . str_replace('httpdocs/', '',
		str_replace('/var/www/vhosts/', '', __DIR__)
	) . '/banner.png'; // Get banner image on ever type of server (Ignore all str_replaces thats to remove vhost path from my school server lol)
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="<?= isset($proj['shortdesc']) ? $proj['shortdesc'] : 'I <3 SWAG (This is my portofolio site)' ?>">
<meta name="author" content="NeCanna / Sophie">
<meta name="keywords" content="NeCanna, Sophie, JS, PHP, ASM, x86, Python, Portofolio, CV">
<meta name="robots" content="index, follow, notranslate">
<meta property="og:image" content="<?= $addr ?>">
<meta property="twitter:image" content="<?= $addr ?>">

<link rel="stylesheet" type="text/css" href="style.css">
