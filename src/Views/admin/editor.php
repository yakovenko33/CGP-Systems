<?php require_once(ROOT . '/src/Views/Header.php');?>

<style>
    @import "/css/admin/editor.css";
</style>

<section class="edit-list">
    <div class="">
        <table class="table table-bordered" >
            <thead>
            <tr>
                <th scope="col" class="column-width">#</th>
                <th scope="col" class="column-width">Имя</th>
                <th scope="col" class="column-width">Email</th>
                <th scope="col" class="column-width">Задача</th>
                <th scope="col" class="column-width">Дата создания</th>
                <th scope="col" class="column-width">Дата редактирования</th>
                <th scope="col" class="column-width">Статус</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tasks as $task) {?>
            <tr class="row-table" id="<?php echo $task["id"]?>">
                    <th scope="col" data-task-id="<?php echo $task["id"]?>"><?php echo $task["id"]?></th>
                    <th scope="col"><?php echo $task["full_name"]?></th>
                    <th scope="col"><?php echo $task["email"]?></th>
                    <th scope="col" id="text-<?php echo $task["id"]?>"><?php echo $task["text"]?></th>
                    <th scope="col" id="update-<?php echo $task["id"]?>"><?php echo $task["created_at"]?></th>
                    <th scope="col"><?php echo $task["updated_at"]?></th>
                    <th scope="col" id="status-<?php echo $task["id"]?>"><?php echo $task['status'] > 0 ? "отредактировано администратором" : "в работе"?></th>
            </tr>

            <?php } ?>
            </tbody>
        </table>
    </div>
</section>



<script src="/js/Admin/editor.js"></script>

<?php require_once(ROOT . '/src/Views/Footer.php');?>
