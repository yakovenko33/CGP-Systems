
$(document).ready(() => {
    $("#send-data").on("click", () => {
        $(".errors").remove();

        let data = $('#sing-in-form').serialize();

        $.ajax({
            type: 'POST',
            url: "/admin/sing-in",
            data: data,
            success: (result) => {
                let resultPars = JSON.parse(result);
                validate(resultPars);

                if(resultPars.status === "success") {
                    console.log(resultPars.data.url);
                    window.location.href = resultPars.data.url;
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
        if (resultPars.errors.hasOwnProperty("email")) {
            $("#email-error").remove();
            $("#email-field").after(getError(resultPars.errors.email[0], 'email-error'));
        }
        if (resultPars.errors.hasOwnProperty("password")) {
            $("#password-error").remove();
            $("#password-field").after(getError(resultPars.errors.password[0], 'password-error'));
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

