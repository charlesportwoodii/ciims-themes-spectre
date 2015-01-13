<div id="posts">
	<h1 class="content-subhead"><?php echo Yii::t('themes.spectre.main.main', 'Recent Posts'); ?></h1>
    <?php foreach($data as $content): ?>
    	<?php $this->renderPartial('//content/_post', array('content' => $content, 'md' => new CMarkdownParser)); ?>
    <?php endforeach; ?>
</div>

<?php if (count($data)): ?>
	<?php $this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
	    'url'=>isset($url) ? $url : 'blog',
	    'contentSelector' => '#posts',
	    'pages' => $pages,
	    'defaultCallback' => "js:function(response, data) {
	    	Theme.infScroll(response, data);
 		}"
	)); ?>
	<?php Yii::app()->clientScript->registerScript('unbind-infinite-scroll', "Theme.loadAll();"); ?>
<?php else: ?>
	<div class="alert alert-info">
		<?php echo Yii::t('themes.spectre.main.main', "{{woah}} It looks like there aren't any posts in this category yet. Why don't you check out some of our other pages or check back later?", 
			array(
				'{{woah}}' => CHtml::tag('strong', array(), Yii::t('themes.spectre.main.main', 'Woah!'))
		)); ?>
	</div>
<?php endif; ?>
