<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= \Router::get('homepage'); ?>">Blog</a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse navbar-right">
            <ul class="nav navbar-nav">
                <li><a href="<?= \Router::get('homepage'); ?>">< Back to front</a></li>
                <li><a href="<?= \Router::get('logout'); ?>">Logout</a></li>
            </ul>
        </div>

    </div><!-- /.container -->
</div>