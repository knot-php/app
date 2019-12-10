<?php
/** @var array $page_info */
$path = $page_info['path'] ?? '';
?>
<div class="card">
    <div class="card-content">
        <h3>404/Page Not Found</h3>
        <?php e($path); ?> is not found on this server.
    </div>
</div>