$(document).ready(() => {
    $(".row-table").on("click", function () {
        $.ajax({
            type: 'GET',
            url: "/admin/edit-form?id=" + $(this).attr("id"),
            success: (result) => {
                let resultPars = JSON.parse(result);

                if(resultPars.status === "success") {

                    $(this).modaal({
                        start_open: true,
                        content_source: resultPars.data,
                        before_close: function () {
                            $(".edit-form-block").remove();
                        }
                    });

                    edit(this);
                }
            }
        });
    });
});

function edit(self) {
    $("#send-data").on("click", function () {
        let data = $('#edit-form').serialize();

        $.ajax({
            type: 'POST',
            url: "/admin/edit-task",
            data: data,
            success: (result) => {
                let resultPars = JSON.parse(result);
                validate(resultPars);

                if(resultPars.status === "success") {
                    $("#text-18").html(resultPars.data.text);
                    $("#update-18").html(resultPars.data.updated_at);

                    let status = resultPars.data.status > 0 ? "отредактировано администратором" : "в работе";
                    $("#status-18").html(status);

                    $(".edit-form-block").remove();
                    $(self).modaal('close');
                }
            }
        });

    });
}

function validate(resultPars) {
    if (resultPars.status === 'error') {
        if (resultPars.errors.hasOwnProperty("task")) {
            $("#task-error").remove();
            $("#task-field").after(getError(resultPars.errors.task[0], 'task-error'));
        }
    }
}

/**
 * @param text
 * @returns {string}
 */
function getError(text, id){
    return '<div class="form-group errors" id="'+ id + '">' +
        '<p >' + text + '</p>' +
        '</div>';
}