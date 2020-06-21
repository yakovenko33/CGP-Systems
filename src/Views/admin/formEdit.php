
<div class="edit-form-block" style="display:none;">
<!--<div class="edit-form-block" >-->
    <form id="edit-form">
        <div class="form-group text-center">
            <p class="header-form-edit">Редактирование</p>
        </div>

        <input type="text" style="display:none;" class="form-control" value="<?php echo $task['id']; ?>" name="id" >

        <div class="form-group row" id="task-field">
            <label for="input-email" class="offset-sm-1 col-sm-2 col-form-label">Задача</label>

            <div class="mr-auto col-sm-8">
                <input type="text" class="form-control" value="<?php echo $task['text']; ?>" name="task" id="input-task">
            </div>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="done" value="1" >
            <label class="form-check-label" for="done">Выполнена</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="not-done" value="0" checked="checked">
            <label class="form-check-label" for="not-done">Не выполнена</label>
        </div>

        <div class="form-group text-center">
            <button id="send-data" type="button" class="btn btn-primary">
                Отправить
            </button>
        </div>
    </form>
</div>
