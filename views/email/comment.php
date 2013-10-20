<?php echo $content->author->displayName; ?>,<br /><br />
<p>
	<?php echo Yii::t('SpectreTheme', 'This is a notification informing you a new comment has been add on your post: {{title}}.', array(
		'{{title}}' => CHtml::link($content->title, Yii::app()->createAbsoluteUrl($content->slug) . '#comments')
	)); ?>
</p>
<p>
	<?php echo Yii::t('SpectreTheme', '{{from}} {{user}}', array(
		'{{from}}' => CHtml::tag('strong', array(), Yii::t('SpectreTheme', 'From:')),
		'{{user}}' => $comment->author->displayName
	)); ?><br /><br />
	<?php echo $comment->comment; ?>
</p>
