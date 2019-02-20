<?php
    require_once('controller/pages.php');
    $page = new Page();
    $page->CheckingQuery();
?>
<div id="content">
    <?php $page->CorePages();?>
</div>