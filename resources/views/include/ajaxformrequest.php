<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $('body').on('submit','.ajax_form',function() {
            var posturl = $(this).attr('action');
            var formid = '#' + $(this).attr('id');
            //hideErrors();
            $(this).ajaxSubmit({
                url: posturl,
                dataType: 'json',
                beforeSend: function () {
                    responseArray = {
                        "status" : "responsePending",
                        "errorCode": "ResponsePending",
                        "message": "<span class='fa fa-info'><span> Checking login information. Please wait..."
                    };
                    showResponseMessage(responseArray, "error");
                    Metronic.blockUI({
                        target: '.content',
                        boxed: true
                    });
                },
                success: function (response) {
                    showResponseMessage(response,'error');
                    Metronic.unblockUI('.content');
                },
                error: function (xhr, textStatus, thrownError) {
                    resposeArray = {
                        "status" : "fail",
                        "errorCode": "unkonwn",
                        "message": "Problem logging in, please try again!"
                    };
                    showResponseMessage(resposeArray, "error");
                    Metronic.unblockUI('.content');
                }
            });
            return false;
        });
    });
    jQuery(document).ready(function() {
        // We need to set assets path because default Metronic path causes problems
        Metronic.setAssetsPath("{{ URL::asset("assets") }}/");

    });
</script>