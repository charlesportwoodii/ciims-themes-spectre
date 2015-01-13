<div class="modal-container">
    <h1 class="content-subhead"><?php echo Yii::t('themes.spectre.main', 'Thanks for Activating Your Account!'); ?></h1>
    <p class="pull-text-left"><?php echo Yii::t('themes.spectre.main', "You may now {{login}} and head to the {{dashboard}}", array(
        '{{login}}' => CHtml::link(Yii::t('themes.spectre.main', 'login'), $this->createUrl('/login')),
        '{{dashboard}}' => CHtml::link(Yii::t('themes.spectre.main', 'dashboard'), $this->createUrl('/dashboard'))
    )); ?></p>
</div>
