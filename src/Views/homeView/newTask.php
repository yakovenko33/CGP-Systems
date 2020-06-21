
<div id="<?php echo $data['id']; ?>" class="card mg-bot-50">
    <div class="card-header">
        <h5 class="card-title"><?php echo $data['text']; ?></h5>
    </div>
    <div class="card-body">
        <p class="card-text">Имя: <?php echo $data['full_name']; ?></p>
        <p class="card-text">Email: <?php echo $data['email']; ?></p>
        <p class="card-text">Статус: <?php echo $data['status'] > 0 ? "отредактировано администратором" : "в работе"?></p>
    </div>
    <div class="card-footer text-muted">
        <?php echo $data['created_at']; ?>
    </div>
</div>

