<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');

?>

    <div id="post"">
    <h1 id="article_title"><span class="tag">#</span> <?php $this->title() ?></h1>

    <div id="content">
        <?php $this->content() ?>
    </div>
    </div>

<?php include('comments.php'); ?>
<?php include('footer.php');