<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
	<?php $this->header(); ?>
	<title><?php $this->options->title(); ?><?php $this->archiveTitle(); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('static/css/style.css'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('static/css/color.css');?>">
    <?php if ($this->is('post')||$this->is('page')) : ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.17.1/themes/prism-tomorrow.css">
  		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.15.0/plugins/line-numbers/prism-line-numbers.css">
        <link rel="stylesheet" href="<?php $this->options->themeUrl('static/css/post.css');?>">
    <?php endif; ?>
</head>
<body>
	<h1 id="title"><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></h1>
	<div id="nav">
        <ul class="clearfix" id="nav_menu">
        <li><a href="<?php $this->options->siteUrl(); ?>">Home</a></li>
        <?php $this->widget('Widget_Contents_Page_List')
                   ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
    </ul>
    </div>
