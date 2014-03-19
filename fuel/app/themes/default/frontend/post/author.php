<div class="page-header">
    <h1>Blog</h1>
    <p class="lead"><?= $author->username; ?></p>
</div>

<?= \Theme::instance()->view('frontend/post/_includes/list')->set(array('posts' => $posts, 'pagination' => $pagination), null, false); ?>