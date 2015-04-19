<p><a href="<?= \Router::get('admin_post_add'); ?>" class="btn btn-primary"><?= __('backend.post.add'); ?></a></p>

<?php if(empty($posts)): ?>
	<?= __('backend.post.empty'); ?>
<?php else: ?>
	<table class="table table-striped">
        <thead>
            <tr>
                <th><?= __('post.model.id'); ?></th>
                <th><?= __('post.model.name'); ?></th>
                <th><?= __('post.model.category'); ?></th>
                <th><?= __('post.model.publication-date'); ?></th>
                <th><?= __('backend.actions'); ?></th>
            </tr>
        </thead>
        <tbody>
        	<?php foreach($posts as $post): ?>
	            <tr>
	                <td><?= $post->id; ?></td>
	                <td><?= $post->name; ?></td>
	                <td><?= date('d/m/Y H:i:s', $post->created_at); ?></td>
	                <td><?= $post->category->name; ?></td>
	                <td>
	                    <a href="<?= \Router::get('admin_post_edit', array('id' => $post->id)); ?>" class="btn btn-primary"><?= __('backend.edit'); ?></a>
	                    <a href="<?= \Router::get('admin_post_delete', array('id' => $post->id)); ?>" class="btn btn-danger" onclick="return confirm('<?= __('backend.are-you-sure'); ?>')"><?= __('backend.delete'); ?></a>
	                </td>
	            </tr>
        	<?php endforeach; ?>
        </tbody>
    </table>

    <?= $pagination; ?>
<?php endif; ?>