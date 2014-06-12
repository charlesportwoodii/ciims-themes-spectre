<div class="login-container">
	<h1 class="content-subhead"><?php echo Yii::t('SpectreTheme', 'Thanks for Activating Your Account!'); ?></h1>
	<p class="alert"><?php echo Yii::t('SpectreTheme', "You may now {{login}} and head to the {{dashboard}}", array(
		'{{login}}' => CHtml::link(Yii::t('SpectreTheme', 'login'), $this->createUrl('/login')),
		'{{dashboard}}' => CHtml::link(Yii::t('SpectreTheme', 'dashboard'), $this->createUrl('/dashboard'))
	)); ?></p>
</div>