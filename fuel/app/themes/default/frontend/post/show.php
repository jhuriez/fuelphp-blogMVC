<div class="page-header">
    <h1><?= $post->name; ?></h1>
    <p>
    	<small>
			<?= __('category'); ?> : <a href="<?= \Router::get('show_post_category', array('category' => $post->category->slug)); ?>"><?= $post->category->name; ?></a>,
			<?= __('by'); ?> <a href="<?= \Router::get('show_post_author', array('author' => $post->user->username)); ?>"><?= $post->user->username; ?></a> <?= __('on'); ?> <em><?= date('d/m/Y', $post->created_at); ?></em>
		 </small>
	 </p>
</div>

<article>
	<?= \Markdown::parse($post->content); ?>
</article>
<hr>

<section class="comments">
    <h3><?= __('frontend.comment-this-post'); ?></h3>

    <?= \Form::open(); ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field('username')->set_attribute(array('class' => 'form-control')); ?>
            </div>
            <div class="col-md-6">
                <?= $form->field('mail')->set_attribute(array('class' => 'form-control')); ?>
            </div>
        </div>
        <?= $form->field('content')->set_attribute(array('class' => 'form-control')); ?>
        <?= $form->field('submit'); ?>
    <?= \Form::close(); ?>

	<?php if( ! empty($post->comments)): ?>
		<h3><?= count($post->comments); ?> <?= __('commentaires'); ?></h3>

		<?php foreach($post->comments as $comment): ?>
		<div class="row">
		    <div class="col-md-12">
		        <p><strong><?= $comment->username; ?></strong> <?= \Date::time_ago($comment->created_at); ?></p>
		        <p><?= $comment->content; ?></p>
		    </div>
		</div>
		<?php endforeach; ?>
	<?php endif; ?>
</section>