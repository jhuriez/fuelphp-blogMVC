<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?= $title; ?></title>

        <!-- Bootstrap core CSS -->
        <?= \Theme::instance()->asset->render('css_core'); ?>
        <?= \Theme::instance()->asset->render('css_plugin'); ?>
        <?= \Theme::instance()->asset->render('js_core_top'); ?>

        <style>
                body {
                        padding-top: 50px;
                }
                .sidebar{
                        margin-top: 50px;
                }
        </style>
    </head>
    <body>

        <?= \Theme::instance()->view('frontend/_templates/top_navbar'); ?>

        <div class="container">
            <div class="col-md-8">
                <?= \Theme::instance()->view('_includes/message'); ?>
                
                <?php if(isset($partials['content'])): ?>
                    <?= $partials['content']; ?>
                <?php endif; ?>
            </div>

            <div class="col-md-4 sidebar">

                <h4>Categories</h4>
                <div class="list-group">
                    <a href="category.html" class="list-group-item">
                        <span class="badge">14</span>
                        Category #1
                    </a>
                    <a href="category.html" class="list-group-item">
                        <span class="badge">5</span>
                        Category #2
                    </a>
                    <a href="category.html" class="list-group-item">
                        <span class="badge">1</span>
                        Category #3
                    </a>
                    <a href="category.html" class="list-group-item">
                        <span class="badge">7</span>
                        Category #4
                    </a>
                </div>

                <h4>Last posts</h4>
                <div class="list-group">
                    <a href="post.html" class="list-group-item">
                        The Route of All Evil
                    </a>
                    <a href="post.html" class="list-group-item">
                        Good news everyone !
                    </a>
                </div>
            </div>

        </div> <!-- /container -->

        <?= \Theme::instance()->asset->render('js_core_bottom'); ?>
        <?= \Theme::instance()->asset->render('js_plugin'); ?>
    </body>
</html>