<h4><?= __('categories'); ?></h4>
<div class="list-group">
    <?php foreach((array)$categories as $category): ?>
        <a href="<?= \Router::get('show_post_category', array('category' => $category->slug)); ?>" class="list-group-item">
            <span class="badge"><?= $category->post_count; ?></span>
            <?= $category->name; ?>
        </a>
    <?php endforeach; ?>
</div>

<h4><?= __('last-posts'); ?></h4>
<div class="list-group">
    <?php foreach((array)$lastPosts as $post): ?>
        <a href="<?= \Router::get('show_post', array('segment' => $post->slug)); ?>" class="list-group-item">
            <?= $post->name; ?>
        </a>
    <?php endforeach; ?>
</div>