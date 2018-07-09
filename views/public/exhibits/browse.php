<?php
$title = __('Browse Exhibits');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>
<h1>
    <?php foreach (loop('exhibit') as $exhibit): ?>
        <?php
            $total_results_adj = $total_results;
            /*Hides the exhibit titled "Rochester Communities" on the browse page so it can appear as an upper-level page without confusion*/
            $compare = strcmp(metadata('exhibit', 'title'), 'Rochester Communities');
        if ($compare ==0): 
            $total_results_adj = $total_results-1;
            break;
        
        endif; ?>
    <?php endforeach; ?>
    <?php echo $title; ?> <?php echo __('(%s total)', $total_results_adj); ?></h1>
<?php if (count($exhibits) > 0): ?>

<nav class="navigation secondary-nav">
    <?php echo nav(array(
        array(
            'label' => __('Browse All'),
            'uri' => url('exhibits')
        ),
        array(
            'label' => __('Browse by Tag'),
            'uri' => url('exhibits/tags')
        )
    )); ?>
</nav>

<?php echo pagination_links(); ?>

<?php $exhibitCount = 0; ?>
<?php foreach (loop('exhibit') as $exhibit): ?>
    <?php $exhibitCount++; ?>
        <?php
            /*Hides the exhibit titled "Rochester Communities" on the browse page so it can appear as an upper-level page without confusion*/
            $compare = strcmp(metadata('exhibit', 'title'), 'Rochester Communities'); ?>
        <?php if ($compare ==0): 
            $exhibitCount++;
            continue;
        ?>
        <?php endif; ?>
    <div class="exhibit <?php if ($exhibitCount%2==1) echo ' even'; else echo ' odd'; ?>">
            <h2><?php echo link_to_exhibit(); ?></h2>
            <?php if ($exhibitImage = record_image($exhibit)): ?>
                <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); ?>
            <?php endif; ?>
            <!-- Shortens summary description to 1000 characters -->
            <?php if ($description = metadata('exhibit','description', array('snippet' => 1000))): ?>
                <div class="browse_description">
                    <?php echo $description; ?>
                </div>
            <?php endif; ?>
            <?php if ($exhibitTags = tag_string('exhibit', 'exhibits')): ?>
            <p class="tags"><?php echo $exhibitTags; ?></p>
            <?php endif; ?> 
        
    </div>
<?php endforeach; ?>

<?php else: ?>
<p><?php echo __('There are no exhibits available yet.'); ?></p>
<?php endif; ?>

<?php echo foot(); ?>
