<?php require_once(ROOT . '/src/Views/Header.php');?>

<section class="home">

    <div id="filter" class="card mg-bot-50">
        <div class="card-header">
            <h5 class="card-title">Фильтр</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group row">
                    <label for="input-author-name" class="col-sm-2 col-form-label">Имя автора</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input-author-name" placeholder="Имя автора">
                    </div>

                    <label for="input-email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input-email" placeholder="Email">
                    </div>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="done">
                    <label class="form-check-label" for="active">
                        Выполненые
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="0" id="not-done">
                    <label class="form-check-label" for="not-active">
                        Не выполненые
                    </label>
                </div>
            </form>
        </div>
    </div>

    <div class="mg-bot-50 add-button">
       <button id="add-task" class="btn btn-primary btn-lg">
           Добавить задачу
       </button>
    </div>

    <div id="task-list">
        <?php foreach($tasks as $task) { ?>

            <div id="<?php echo $task['id']; ?>" class="card mg-bot-50">
                <div class="card-header">
                    <h5 class="card-title"><?php echo $task['text']; ?></h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Имя: <?php echo $task['full_name']; ?></p>
                    <p class="card-text">Email: <?php echo $task['email']; ?></p>
                    <p class="card-text">Статус: <?php echo $task['status'] > 0 ? "отредактировано администратором" : "в работе"?></p>
                </div>
                <div class="card-footer text-muted">
                    <?php echo $task['created_at']; ?>
                </div>
            </div>

        <?php } ?>
    </div>

<!--    <div id="1" class="card mg-bot-50">-->
<!--        <div class="card-header">-->
<!--            <h5 class="card-title">Название задачи</h5>-->
<!--        </div>-->
<!--        <div class="card-body">-->
<!--            <p class="card-text">Имя: Surname Name</p>-->
<!--            <p class="card-text">Email: test@email.com</p>-->
<!--            <p class="card-text">Статус: отредактировано администратором.</p>-->
<!--        </div>-->
<!--        <div class="card-footer text-muted">-->
<!--            20:06:2020-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div id="2" class="card mg-bot-50">-->
<!--        <div class="card-header">-->
<!--            Featured-->
<!--        </div>-->
<!--        <div class="card-body">-->
<!--            <h5 class="card-title">Special title treatment</h5>-->
<!--            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
<!--        </div>-->
<!--        <div class="card-footer text-muted">-->
<!--            2 days ago-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div id="3" class="card mg-bot-50">-->
<!--        <div class="card-header">-->
<!--            <h5 class="card-title">Название задачи</h5>-->
<!--        </div>-->
<!--        <div class="card-body">-->
<!--            <h5 class="card-title">Special title treatment</h5>-->
<!--            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
<!--        </div>-->
<!--        <div class="card-footer text-muted">-->
<!--            2 days ago-->
<!--        </div>-->
<!--    </div>-->
</section>

<div id="inline" style="display:none;">
    <form id="task-form">
        <div class="form-group text-center">
            <p class="header-form-add">Добавление задачи</p>
        </div>
        <div class="form-group row" id="full-name-field">
            <label for="full-name" class="col-sm-2 col-form-label">Имя автора</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="full_name" id="full-name" placeholder="Имя автора">
            </div>
        </div>

        <div class="form-group row" id="email-field">
            <label for="input-email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="email" id="input-email" placeholder="Email">
            </div>
        </div>

        <div class="form-group row" id="task-field">
            <label for="input-email" class="col-sm-2 col-form-label">Задача</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="task" id="input-email" placeholder="Задача">
            </div>
        </div>

        <div class="form-group text-center">
            <button id="send-data" type="button" class="btn btn-primary">
                Добавить
            </button>
        </div>
    </form>
</div>

<script src="./js/HomeView/addTask.js"></script>

<?php require_once(ROOT . '/src/Views/Footer.php');?>


