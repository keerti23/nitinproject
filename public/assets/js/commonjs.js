// Variable for testing error is from javascript or php
var slideID = "";

function showResponseMessage(response, divID)
{
    $('#'+divID).html('');
    toastrType = typeof toastrType !== 'undefined' ? toastrType : 'success';

    if(response.status == "error")
    {
        if (typeof response.message == "object") {

            // For Sliding to first error div
            var iCount = 0;

            for(var key in response.message) {
                if (response.message.hasOwnProperty(key)) {

                    if(iCount == 0)
                    {
                        slideID = key;
                    }

                    var obj = response.message[key];
                    showInputError(key, obj[0]);

                }
            }

            if(slideID != "")
            {
                $("html, body").animate({scrollTop: $('#'+slideID).offset().top-70 }, 1000);
            }
        } else {
            $('#'+divID).html('<div class="alert alert-danger"><p>' + response.message + '</p></div>');
        }

        showToastrMessage("Please fix the below errors", "Error", "error");

    }else if(response.status === "success")
    {
        $('#'+divID).html('<div class="alert alert-success"><p>'+response.message+'</p></div>');

        if(response.action == "redirect")
        {
            window.location.href = response.url;
        }
        if(response.action == "showToastr")
        {
            toastrType = typeof response.toastrType !== 'undefined' ? response.toastrType : 'success';
            showToastrMessage(response.toastrMessage, response.toastrHeading, toastrType)
        }



        if(response.action == "reload")
        {
            window.location.reload();
        }

    }else if(response.status == "responsePending")
    {
        $('#'+divID).html('<div class="alert alert-info"><p>'+response.message+'</p></div>');

    }
}

function hideErrors() {
    $(".has-error").each(function () {
       $(this).find(".help-block").text("");
        $(this).removeClass("has-error");
    });
}

function showInputError(inputName, errorMessage) {
    var formGroup = $("#"+inputName).closest(".form-group");
    formGroup.addClass("has-error");
    formGroup.find(".help-block").text(errorMessage);

    if(slideID == "") {
        $("html, body").animate({scrollTop: $('#' + inputName).offset().top - 70}, 1000);
    }
}

function showToastrMessage(toastrMessage, toastrHeading, toastrType)
{
    toastrType = typeof toastrType !== 'undefined' ? toastrType : 'success';

    Command: toastr[toastrType](toastrMessage, toastrHeading)
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
}