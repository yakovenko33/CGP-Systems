
$(document).ready(() => {
    $("#add-task").modaal({
        content_source: '#inline'
    });

    $("#send-data").on("click", () => {
        $(".errors").remove();

        let data = $('#task-form').serialize();
        $.ajax({
            type: 'POST',
            url: "/task",
            data: data,
            success: (result) => {
                let resultPars = JSON.parse(result);
                validate(resultPars);
                if(resultPars.status === "success") {
                    $(".add-button").after(resultPars.data);

                    document.getElementById('task-form').reset();
                    $('#add-task').modaal('close');
                }
            }
        });
    });

});

/**
 *
 * @param resultPars
 */
function validate(resultPars) {
    if (resultPars.status === 'error') {
        if (resultPars.errors.hasOwnProperty("full_name")) {
            $("#full-name-error").remove();
            $("#full-name-field").after(getError(resultPars.errors.full_name[0], 'full-name-error'));
        }
        if (resultPars.errors.hasOwnProperty("email")) {
            $("#email-error").remove();
            $("#email-field").after(getError(resultPars.errors.email[0], 'email-error'));
        }
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

