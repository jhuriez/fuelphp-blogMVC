<p><a href="<?= \Router::get('admin_post'); ?>">< <?= __('backend.back-to-post'); ?></a></p>

<?= \Form::open(array('class'   => '')); ?>
    <div class="row">
        <div class="col-md-6">
		    <?= $form->field('name')->set_attribute(array('class' => 'form-control')) ?>
        </div>
        <div class="col-md-6">
		    <?= $form->field('slug')->set_attribute(array('class' => 'form-control')) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
		    <?= $form->field('category_id')->set_attribute(array('class' => 'form-control')) ?>
        </div>
        <div class="col-md-6">
		    <?= $form->field('user_id')->set_attribute(array('class' => 'form-control')) ?>
        </div>
    </div>
    <?= $form->field('content')->set_attribute(array('class' => 'form-control')) ?>
    <?= $form->field('add') ?>
<?= \Form::close(); ?>