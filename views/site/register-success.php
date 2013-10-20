<div class="login-container">
	<h1 class="content-subhead"><?php echo Yii::t('SpectreTheme', 'Thanks for Registering!'); ?></h1>
	<p class="alert"><?php echo Yii::t('SpectreTheme', "Before you can login to your account we need you to verify your email address. Be on the lookout for an email from {{email}} containing activating instructions.", array(
		'{{email}}' => CHtml::tag('strong', array(), $notifyUser->email)
	)); ?></p>
</div>
