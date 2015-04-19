<?= \Form::open(array('class' => 'form-signin')); ?>
	<h4 class="form-signin-heading">Please sign in</h4>
	<input type="text" class="form-control" name="username" placeholder="<?= __('user.model.username'); ?>" autofocus="">
	<input type="password" class="form-control" name="password" placeholder="<?= __('user.model.password'); ?>">
	<button class="btn btn-lg btn-primary btn-block" type="submit"><?= __('user.login.sign-in'); ?></button>
<?= \Form::close(); ?>