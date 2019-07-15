<div id="comments">
    <!-- 判断设置是否允许对当前文章进行评论 -->
    <?php if($this->allow('comment')): ?>

        <div id="respond" class="comment-respond">
            <div class="comment-reply-title">
                <span>发表评论</span>
            </div>
            <!-- comment-reply-title -->
            <form action="<?php $this->commentUrl() ?>" method="post" id="commentform">
                <div class="comment-author-welcome"></div>
                <!-- comment-author-welcome -->
                <?php if($this->user->hasLogin()): ?>
                <!-- 显示当前登录用户的用户名以及登出连接 -->
                <p><a href="<?php $this->options->adminUrl(); ?>" style="color: #eb5055;"><?php $this->user->screenName(); ?></a>已登录
                    <a href="<?php $this->options->index('action/logout'); ?>" title="Logout">退出登录>></a></p>
                    <br>

                <!-- 若当前用户未登录 -->
                <?php else: ?>
                <div id="comment-author-info">
                    <div class="comment-form-author">
                        <label for="author">昵称（必填）</label>
                        <input type="text" name="author" id="author" class="commenttext" value="<?php $this->remember('author'); ?>" tabindex="1" required=""></div>
                    <div class="comment-form-email">
                        <label for="email">邮箱（必填）</label>
                        <input type="email" name="mail" id="email" class="commenttext" value="<?php $this->remember('mail'); ?>" tabindex="2" required=""></div>
                    <div class="comment-form-url">
                        <label for="url">网址</label>
                        <input type="text" name="url" id="url" class="commenttext" value="<?php $this->remember('url'); ?>" tabindex="3"></div>
                </div>
                <?php endif; ?>
                <div class="comment-form-comment">
                    <textarea id="comment" name="text" rows="4" tabindex="4" placeholder="你不说两句吗?" required=""></textarea>
                </div>
                <p id="comment-tips"></p>
                <button id="submit" type="submit" tabindex="5">提交评论</button>
            </form>
        </div>

    <br>
    <br>
    <br>
    <?php endif; ?>

    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>

        <?php $comments->listComments(); ?>

        <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>

    <?php endif; ?>
</div>