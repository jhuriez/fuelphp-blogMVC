<?php if (\Messages::any()): ?>
    <br/>
    <?php foreach (array('success', 'info', 'warning', 'error') as $type): ?>
		<?php $class = ($type == 'error') ? 'danger' : $type; ?>
        <?php foreach (\Messages::instance()->get($type) as $message): ?>
            <div class="alert alert-<?= $class; ?>"><?= $message['body']; ?></div>
        <?php endforeach; ?>

    <?php endforeach; ?>
    <?php \Messages::reset(); ?>
<?php endif; ?>