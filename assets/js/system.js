var baseUrl = 'https://education.aikaaa.com/api/';
var imgUrl = 'https://education.aikaaa.com/uploads/';

function setDistrict(ele) {
    var dataId = $(ele).val();
    var action = 'select_district';
    $.post(baseUrl, {
            action,
            dataId,

        },
        function(data) {

            $('#center_district').html(data);
        });
}

function enableBtn(ele) {

    var btn = $(ele).val();
    if ($(ele).prop('checked')) {
        $(btn).attr('disabled', false);
        //alert(btn);
    } else {
        $(btn).prop('disabled', true);
    }
}


function extForm(ele) {
    var table = $(ele).data('name');
    var action = $(ele).data('ctrl');
    var formName = $(ele).data('frm');
    var btn = $(ele).val();

    var formData = new FormData($(formName)[0]);
    //var allData = $(formName).serialize() + "&table=" + table + "&action=" + action + "&token=" + token;
    formData.append('action', action);
    formData.append('table', table);
    if ($(formName).valid()) {
        $(ele).prop('disabled', true);
        $.ajax({
            beforeSend: function() {
                $(ele).html("<i class='fa fa-refresh fa-spin'></i> Wait ...");
            },
            url: baseUrl,
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                var all = JSON.parse(response);
                var message = all.message;
                var status = all.status;
                //var loadPage = all.location;

                if (status == 'success') {
                    $(formName)[0].reset();
                    // $('.modal').modal('hide');
                    notify(status, message);
                } else {
                    notify(status, message);
                }
            },
            error: function(e) {
                notify(e.statusText, e.responseText);
            },
            complete: function(data) {
                $(ele).prop('disabled', false);
                $(ele).html(btn);

            }

        });
    }
}
// student login function start
$('#forgotSpan').click(function() {
    $('#loginSpan').show();
    $('#loginBody').hide(600);
    $('#forgotBody').show(700);
    $('#forgotSpan').hide();
});
$('#loginSpan').click(function() {
    $('#loginSpan').hide();
    $('#loginBody').show(700);
    $('#forgotBody').hide(600);
    $('#forgotSpan').show();
});

var student_token = '';


/*----------------------------------------functions-----------*/

function login(ele) {
    localStorage.clear();
    var table = $(ele).data('name');
    var action = $(ele).data('ctrl');
    var formName = $(ele).data('frm');
    var btn = $(ele).val();
    var formData = new FormData($('#' + formName)[0]);
    var allData = $("#" + formName).serialize() + "&table=" + table + "&action=" + action + "&token=" + student_token;

    if ($('#' + formName).valid()) {
        $(ele).prop('disabled', true);
        $.ajax({
            beforeSend: function() {
                $(ele).html("<i class='fa fa-refresh fa-spin'></i> Wait ...");
            },
            'type': 'POST',
            'url': baseUrl,
            'data': allData,
            success: function(response) {
                //alert(response);
                console.log(response);
                var all = JSON.parse(response);
                var message = all.message;
                var status = all.status;
                notify(status, message);
                if (status == 'success') {
                    $('#' + formName)[0].reset();
                    localStorage.setItem('token', all.token);
                    localStorage.setItem('user_id', all.user_id);
                    localStorage.setItem('user_type', all.user_type);
                    setTimeout(function() {
                        window.location.href = 'paid_classes';
                    }, 1000);

                }


            },
            error: function(e) {
                console.log("ERROR : ", e);
                notify(e.statusText, e.responseText);
            },
            complete: function(data) {
                $(ele).prop('disabled', false);
                $(ele).html(btn);

            }

        });
    }
}

function resetPass(ele) {
    var table = 'student';
    var action = 'forgot_password';
    var formName = "#resetForm";
    var btn = $(ele).val();
    var formData = new FormData($(formName)[0]);
    var allData = $(formName).serialize() + "&table=" + table + "&action=" + action;

    if ($(formName).valid()) {
        $(ele).prop('disabled', true);
        $.ajax({
            beforeSend: function() {
                $(ele).html("<i class='fa fa-refresh fa-spin'></i> Wait ...");
            },
            'type': 'POST',
            'url': baseUrl,
            'data': allData,
            success: function(response) {
                console.log(response);
                var all = JSON.parse(response);
                var message = all.message;
                var status = all.status;
                var loadPage = all.location;

                if (status == 'success') {
                    $(formName)[0].reset();
                    //$('.modal').modal('hide');
                    notify(status, message);
                } else {
                    notify(status, message);
                }
            },
            error: function(e) {
                notify(e.statusText, e.responseText);
            },
            complete: function(data) {
                $(ele).prop('disabled', false);
                $(ele).html(btn);

            }

        });
    }
}
/*--------------------------------End Change Password---------------------------*/
/*--------------------------------logout---------------------------*/
function logOut() {
    bootbox.confirm("Are You Sure To Logout?", function(result) {
        if (result) {
            var action = 'signout';
            $.post(baseUrl, {
                    student_token,
                    action,

                },
                function(data) {
                    var all = JSON.parse(data);
                    var message = all.message;
                    var status = all.status;
                    if (message == 'success') {
                        localStorage.removeItem('token');
                        localStorage.removeItem('user_id');
                        localStorage.removeItem('user_type');

                        notify(status, message);
                        localStorage.clear();
                        setTimeout(function() {
                            window.location.href = 'signout';
                        }, 1000);
                    } else {
                        notify(status, message);
                        setTimeout(function() {
                            window.location.href = 'signout';
                        }, 1000);
                    }
                });

        }
    });
}

/*-----------------------------Notification function------------------------*/
function notify(status, message) {
    if (status == 'success') {
        round_success_noti(message);
        return false;
    } else {
        round_error_noti(message)
        return false;
    }
}