<?php

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');

?>

    <div id="post">
        <h1 id="article_title"><span class="tag">#</span> <?php $this->title() ?></h1>
        <div class="about">
            <span class="post_date"><?php $this->date('Y-m-d'); ?></span>
            <span class="post_cate"><?php $this->category(','); ?></span>
            <span class="tags">Tags: <?php $this->tags(',', true, '无标签'); ?></span>
            <span class="tags">阅读: <?php get_post_view($this) ?></span>
        </div>
        <div id="content" class="entry-content">
            <?php $this->content() ?>
        </div>
    </div>

<?php include('comments.php'); ?>
<?php include('footer.php');