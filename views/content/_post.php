<div class="post">
	<?php $this->renderPartial('//site/attached-content', array('meta' => Content::model()->parseMeta($content->id))); ?>
	<div class="post-inner">
		<div class="post-header">
			<img class="post-avatar" src="<?php echo $content->author->gravatarImage(48); ?>" height="48" width="48">
			<h2 class="post-title"><?php echo CHtml::link($content->title, Yii::app()->createUrl($content->slug)); ?></h2>
		</div>
		<p class="post-meta">
			<?php echo Yii::t('themes.spectre.main.main', 'By {{author}} under {{category}}', array(
				'{{author}}' => CHtml::link(CHtml::encode($content->author->username), $this->createUrl("/profile/{$content->author->id}/"), array('class' => 'post-author')),
				'{{category}}' => CHtml::link(CHtml::encode($content->category->name), Yii::app()->createUrl($content->category->slug), array('class' => 'post-category post-category-design'))
			)); ?>
			<?php echo Cii::timeago($content->published); ?>
        </p>
        <div class="post-description">
			<?php echo strip_tags($md->safeTransform($content->extract), '<h1><h2><h3><h4><h5><6h><p><b><strong><i>'); ?>
        </div>

		<a class="read-more-icon" style="float:right" href="<?php echo $this->createUrl('/' . $content->slug); ?>" rel="bookmark">
			<?php echo Yii::t('themes.spectre.main', 'Read more'); ?>
		</a>
	</div>
    <div style="clear:both;"><br /></div>
</div>
