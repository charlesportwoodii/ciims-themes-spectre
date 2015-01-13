<div class="modal-container">
	<h1 class="content-subhead"><?php echo Yii::t('themes.spectre.main', 'Error {{code}}', array('{{code}}' => $error['code'])); ?></h1>
	<p><?php echo CHtml::encode($error['message']); ?></p>
</div>
<div class="clearfix"></div>
