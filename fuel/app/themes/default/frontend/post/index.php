<div class="page-header">
    <h1>Blog</h1>
    <p class="lead">Welcome on my blog</p>
</div>

<?php if(empty($posts)): ?>
	<p><?= __('frontend.post.empty'); ?></p>
<?php else: ?>
	<?php foreach($posts as $post): ?>
		<article>
			<h2><a href="/<?= $post->slug; ?>"><?= $post->name; ?></a></h2>
			<p>
				<small>
				<?= __('category'); ?> : <a href="/category/<?= $post->category->slug; ?>"><?= $post->category->name; ?></a>,
				<?= __('by'); ?> <a href="/author/<?= $post->user->username; ?>"><?= $post->user->username; ?></a> <?= __('on'); ?> <em><?= date('d/m/Y', $post->created_at); ?></em>
				</small>
			</p>
			<p><?= \Str::truncate(\Markdown::parse($post->content), \Config::get('application.truncate', 200)); ?></p>
			<p class="text-right"><a href="/<?= $post->slug; ?>" class="btn btn-primary"><?= __('frontend.read-more'); ?>...</a></p>
		</article>
	<?php endforeach; ?>
<?php endif; ?>