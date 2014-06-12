<?php $this->beginContent('//layouts/main'); ?>
	<?php echo $content; ?>
	<!-- AddThis -->
	<div class="addthis">
		<?php if( Cii::getConfig('addThisPublisherID') != ''): ?>
			<!-- AddThis Smart Layers BEGIN -->
			<!-- Go to http://www.addthis.com/get/smart-layers to customize -->
			<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=<?php echo Cii::getConfig('addThisPublisherID'); ?>"></script>
			<script type="text/javascript">
			  addthis.layers({
			    'theme' : 'dark',
			    'share' : {
			      'position' : 'right',
			      'numPreferredServices' : 5,
			      'services' : 'facebook,twitter,linkedin,google_plusone_share,more'
			    },
			    'visible' : 'smart'
			  });
			</script>
			<!-- AddThis Smart Layers END -->
		<?php endif; ?>
	</div>
<?php $this->endContent(); ?>
