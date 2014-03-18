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

        <?= \Theme::instance()->view('user/_templates/top_navbar'); ?>

        <div class="container">
            <?= \Theme::instance()->view('_includes/message'); ?>
            
            <?php if(isset($pageTitle)): ?>
                <h1><?= $pageTitle; ?></h1>
            <?php endif; ?>

            <?php if(isset($partials['content'])): ?>
                <?= $partials['content']; ?>
            <?php endif; ?>

        </div> <!-- /container -->

        <?= \Theme::instance()->asset->render('js_core_bottom'); ?>
        <?= \Theme::instance()->asset->render('js_plugin'); ?>
    </body>
</html>