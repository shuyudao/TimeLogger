<?php

/**
 * 一款时间轴为基础的简单主题
 * 
 * @package TimeLogger
 * @author 术与道
 * @version 1.1.0
 * @link http://www.shuyudao.top
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');

?>
	
	<div id="main">
		<div id="line"></div>
	<div id="coos">
		<?php
			$i = 0;
			$index = 0;
			$color = array("yellow","pink","black","green","blue","purple");
			//打乱颜色
			shuffle($color);
		?>
		<?php while($this->next()): ?>
		    <div class="lis">
				<div class="spot"></div>
				<div class="ke">
					<div class="g-lin"></div>
					<div class="<?php echo "item"." ".$color[$index] ?>">
						<p class="date"><?php $this->date('Y-m-d'); ?></p>
						<h2 class="title"><span class="tag">#</span><?php $this->sticky();?> <a href="<?php $this->permalink() ?>" target="_blank"> <?php $this->title() ?></a></h2>
						<div class="des"><?php $this->excerpt(); ?></div>
					</div>
				</div>
			</div>
			<?php
                $i++;
                $index++;
                if($index>6){
                    $index = 0;
                }

            ?>
		<?php endwhile; ?>

	</div>
    </div>

    <div id="next"><?php if(ceil($this->getTotal() / $this->parameter->pageSize)>1)$this->pageLink('加载更多','next');else echo"<span>没有了~</span>" ?></div>

<?php $this->need('footer.php');