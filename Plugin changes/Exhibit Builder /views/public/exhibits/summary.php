<?php echo head(array('title' => metadata('exhibit', 'title'), 'bodyclass'=>'exhibits summary')); ?>

<?php
//$pageTree = exhibit_builder_page_tree();
//if ($pageTree):
?>


<?php //endif; ?>

<nav id="exhibit-pages">
     <?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
</nav>

<h1><?php echo metadata('exhibit', 'title'); ?></h1>
<?php echo exhibit_builder_page_nav(); ?>

<div id="primary">
<?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
<div class="exhibit-description">
    <?php echo $exhibitDescription; ?>
</div>
<?php endif; ?>

<?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
<div class="exhibit-credits">
    <h3><?php echo __('Credits'); ?></h3>
    <p><?php echo $exhibitCredits; ?></p>
</div>
<?php endif; ?>
</div>

<?php
$pageTree = exhibit_builder_page_tree();
if ($pageTree):
?>
<nav id="exhibit-pages-bottom">
    <h4>Explore <?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h4>
     <?php echo $pageTree; ?>
</nav>
<?php endif; ?>

<?php echo foot(); ?>
