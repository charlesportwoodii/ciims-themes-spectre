<?php if (!Yii::app()->user->isGuest && $model->id == Yii::app()->user->id): ?>
	<span class="pull-right">
		<?php echo CHtml::link(Yii::t('SpectreTheme', 'edit'), '/profile/edit', array('class' => 'pure-button pure-button-primary pure-button-xsmall')); ?>
	</span>
<?php endif; ?>
<div class="clearfix"></div>
<div class="post">
	<div class="post-header">
		<h1 class="content-subhead"><?php echo Yii::t('SpectreTheme', 'About {{user}}', array('{{user}}' => CHtml::encode($model->name))); ?></h1>
		<img class="post-avatar" src="<?php echo $model->gravatarImage(48); ?>" height="48" width="48">
		<?php $md = new CMarkdownParser; echo $md->safeTransform($model->about); ?>
	</div>	
</div>


<div class="clearfix"></div>

<?php $this->widget('ext.timeago.JTimeAgo', array(
    'selector' => ' .timeago',
));
?>