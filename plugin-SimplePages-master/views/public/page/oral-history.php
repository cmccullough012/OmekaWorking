<?php $text = metadata('simple_pages_page', 'vid', array('no_escape' => true)); ?>

<p><?php echo $this->shortcodes($text); ?>

<?php echo $text; ?></p>