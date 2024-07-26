<?php
// Check if HTTP_REFERER is set
$previous_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();

?>
<div class="d-flex align-items-center h-100">
    <div class="row text-center m-auto">
        <h1>Unprocessable Entity</h1>
        <div class="text-danger">
            <?=$errors?>
        </div>
        <a href="<?= $previous_url?>">Go back</a>
    </div>
</div>