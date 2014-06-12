<div class="login-container">
	<h1 class="content-subhead"><?php echo Yii::t('SpectreTheme', 'Forgot Your Password?'); ?></h1>
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'					=>	'login-form',
		'focus'					=>'	input[type="text"]:first',
		'enableAjaxValidation'	=>	true,
		'htmlOptions' => array(
			'class' => 'pure-form pure-form-stacked'
		)
	)); ?>
	<fieldset>
		<div class="login-form-container">
			<?php if(Yii::app()->user->hasFlash('reset-sent')):?>
				<div class="alert alert-success" style="margin-bottom: -5px;">
				  	<?php echo Yii::app()->user->getFlash('reset-sent'); ?>
				</div>
			<?php endif; ?>

			<?php if ($id == NULL): ?>		
				<?php echo CHtml::textField('email', isset($_POST['email']) ? $_POST['email'] : '', array('placeholder'=>Yii::t('SpectreTheme', 'Your email address (you@example.com)'))); ?>

			<?php else: ?>
				<?php if ($badHash): ?>
					<br />
				    <div class="red-box"><?php echo Yii::t('SpectreTheme', 'The password reset key you provided is either invalid or has expired.'); ?></div>
				<?php else: ?>
					
					<?php echo CHtml::passwordField('password',  isset($_POST['password']) ? $_POST['password'] : '', array('placeholder'=>Yii::t('SpectreTheme', 'Your new password'))); ?>
					<br />
					<br />
					<?php echo CHtml::passwordField('password2',  isset($_POST['password2']) ? $_POST['password2'] : '', array('placeholder'=>Yii::t('SpectreTheme', 'Once more with feeling!'))); ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<div class="login-form-footer">
			<?php echo CHtml::link(Yii::t('SpectreTheme', 'register'), Yii::app()->createUrl('/register'), array('class' => 'login-form-links')); ?>
			<span class="login-form-links"> | </span>
			<?php echo CHtml::link(Yii::t('SpectreTheme', 'login'), Yii::app()->createUrl('/login'), array('class' => 'login-form-links')); ?>
			<?php echo CHtml::tag('button', array('type' => 'submit', 'id' => 'submit-comment', 'class' => 'pure-button pure-button-primary pure-button-xsmall pull-right'), Yii::t('SpectreTheme', 'Submit')); ?>
		</div>
	</fieldset>
	<?php $this->endWidget(); ?>
</div>