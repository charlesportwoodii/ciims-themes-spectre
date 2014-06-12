<div class="login-container">
	<h1 class="content-subhead"><?php echo Yii::t('SpectreTheme', 'Change Your Email Address'); ?></h41>
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
			<?php if(Yii::app()->user->hasFlash('authenticate-error')):?>
				<div class="alert alert-error" style="margin-top: 20px;">
				  	<?php echo Yii::app()->user->getFlash('authenticate-error'); ?>
				</div>
			<?php endif; ?>

			<?php if($success): ?>
				<div class="alert alert-success" style="margin-top: 20px;">
				  	<?php echo $success; ?>
				</div>
			<?php endif; ?>

			<?php if (!$success): ?>
				<p>
					<?php echo Yii::t('SpectreTheme', 'To change the email address associated to your account, please enter your current password.'); ?>
				</p>
				<?php echo CHtml::passwordField('password',  isset($_POST['password']) ? $_POST['password'] : '', array('placeholder'=>Yii::t('SpectreTheme', 'Your current password'))); ?>
				<?php echo CHtml::tag('button', array('type' => 'submit', 'id' => 'submit-comment', 'class' => 'pure-button pure-button-primary pure-button-xsmall pull-right'), Yii::t('SpectreTheme', 'Submit')); ?>
            <?php endif; ?>
		</div>
		
		<?php $this->endWidget(); ?>
	</fieldset>
</div>