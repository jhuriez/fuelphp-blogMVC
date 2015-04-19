<div class="page-header">
    <h1>Blog</h1>
    <p class="lead"><?= __('welcome'); ?></p>
</div>

<?= \Theme::instance()->view('frontend/post/_includes/list')->set(array('posts' => $posts, 'pagination' => $pagination), null, false); ?>