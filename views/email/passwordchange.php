<?php echo $user->displayName; ?>,<br /><br />
<?php echo Yii::t('themes.spectre.main.main', 'This is a notification that your password has been changed on {{name}}', array(
    '{{name}}' => CHtml::link(Cii::getConfig('name'), Yii::app()->createAbsoluteUrl('/'))
)); ?>
<br /><br />
<?php echo Yii::t('themes.spectre.main.main', 'Thank you.'); ?><br /><br />
