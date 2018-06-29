<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show')); ?>

<h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>

<?php echo all_element_texts('item'); ?>

<!-- The following returns all of the files associated with an item. -->
<?php if (metadata('item', 'has files')): ?>
<div id="itemfiles" class="element">
    <h2><?php echo __('Files'); ?></h2>
    <div class="element-text"><?php echo files_for_item(); ?></div>
</div>
<?php endif; ?>

<!-- If the item belongs to a collection, the following creates a link to that collection. -->
<?php if (metadata('item', 'Collection Name')): ?>
<div id="collection" class="element">
    <h2><?php echo __('Collection'); ?></h2>
    <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
</div>
<?php endif; ?>

<!-- The following prints a list of all tags associated with the item -->
<?php if (metadata('item', 'has tags')): ?>
<div id="item-tags" class="element">
    <h2><?php echo __('Tags'); ?></h2>
    <div class="element-text"><?php echo tag_string('item'); ?></div>
</div>
<?php endif;?>

<!-- The following prints a citation for this item. -->
<div id="item-citation" class="element">
    <h2><?php echo __('Citation'); ?></h2>
    <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
</div>

<div id="item-output-formats" class="element">
    <h2><?php echo __('Output Formats'); ?></h2>
    <div class="element-text"><?php echo output_format_list(); ?></div>
</div>

<?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>

<nav class="item-pagination">
<ul class="navigation">
    <?php if ($previous = link_to_previous_item_show()): ?>
    <li id="previous-item" class="previous"><?php echo $previous; ?></li>
    <?php endif; ?>
    <?php if ($next = link_to_next_item_show()): ?>
    <li id="next-item" class="next"><?php echo $next; ?></li>
    <?php endif; ?>
</ul>
</nav>

<?php echo foot(); ?>