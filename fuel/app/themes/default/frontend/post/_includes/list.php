<?php if(empty($posts)): ?>
	<p><?= __('frontend.post.empty'); ?></p>
<?php else: ?>
	<?php foreach($posts as $post): ?>
		<article>
			<h2><a href="<?= \Router::get('show_post', array('segment' => $post->slug)); ?>"><?= $post->name; ?></a></h2>
			<p>
				<small>
				<?= __('category'); ?> : <a href="<?= \Router::get('show_post_category', array('category' => $post->category->slug)); ?>"><?= $post->category->name; ?></a>,
				<?= __('by'); ?> <a href="<?= \Router::get('show_post_author', array('author' => $post->user->username)); ?>"><?= $post->user->username; ?></a> <?= __('on'); ?> <em><?= date('d/m/Y', $post->created_at); ?></em>
				</small>
			</p>
			<p><?= \Str::truncate(\Markdown::parse($post->content), \Config::get('application.truncate', 200)); ?></p>
			<p class="text-right"><a href="<?= \Router::get('show_post', array('segment' => $post->slug)); ?>" class="btn btn-primary"><?= __('frontend.read-more'); ?>...</a></p>
		</article>
	<?php endforeach; ?>
	<?= $pagination; ?>
<?php endif; ?>

