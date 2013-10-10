<ul class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb): ?>
        <?php if (empty($breadcrumb['url'])): ?>
            <li class="active"><?php echo $breadcrumb['name']; ?></li>
        <?php else: ?>
            <li><a href="<?php echo $breadcrumb['url']; ?>"><?php echo $breadcrumb['name']; ?></a></li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>