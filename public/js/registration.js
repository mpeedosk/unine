/**
 * Created by Martin on 27.03.2016.
 */

function checkAvailabilityUser() {

    var username = $("#username").val();

    if (username.length > 0) {
        jQuery.ajax({
            url: "checkUser",
            data: {
                _token: $('input[name="_token"]').val(),
                username: username
            },
            type: "POST",
            success: function (data) {
                var status = $("#user-availability-status");

                if (data.response == "true") {
                    $('#username').css({"border": "1px solid #16E241", "box-shadow": "0 0 10px #2af44e"});
                    status.html("<span class='glyphicon glyphicon-ok' style='margin-top: 10px'></span>");
                    status.attr('data-original-title', "Sobib")
                }
                else {
                    $('#username').css({'border': '1px solid #e22e27', 'box-shadow': '0 0 10px #e22e27'});
                    status.html(decodeURI("%3Cspan class='glyphicon glyphicon-remove' style='margin-top: 10px' %3E%3C/span%3E"));
                    status.attr('data-original-title', "Selline kasutajanimi on juba olemas")
                }
            },
            error: function () {
            }
        });
    }
}

function checkAvailabilityEmail() {

    var email = $("#email").val();
    var status = $("#email-availability-status");

    if (validateEmail(email)) {
        jQuery.ajax({
            url: "checkEmail",
            data: {
                _token: $('input[name="_token"]').val(),
                email: email
            },
            type: "POST",
            success: function (data) {

                if (data.response == "true") {
                    $('#email').css({"border": "1px solid #16E241", "box-shadow": "0 0 10px #2af44e"});
                    status.html("<span class='glyphicon glyphicon-ok' style='margin-top: 10px'></span>");
                    status.attr('data-original-title', "Sobib")

                }
                else {
                    $("#email").css({'border': '1px solid #e22e27', 'box-shadow': '0 0 10px #e22e27'});
                    status.html("<span class='glyphicon glyphicon-remove' style='margin-top: 10px'></span>");
                    status.attr('data-original-title', "Selline email on juba kasutuses")

                }
            },
            error: function () {
            }
        });
    } else {
        $("#email").css({'border': '1px solid #e22e27', 'box-shadow': '0 0 10px #e22e27'});
        status.html("<span class='glyphicon glyphicon-remove' style='margin-top: 10px'></span>");
        status.attr('data-original-title', "See ei ole korrektne email")

    }
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function validatePassword() {
    var password = $("#password").val();
    var status = $("#password-status");
    if (password.length >= 6) {
        $("#password").css({"border": "1px solid #16E241", "box-shadow": "0 0 10px #2af44e"});
        status.html("<span class='glyphicon glyphicon-ok' style='margin-top: 10px'></span>");
        status.attr('data-original-title', "Sobib")

    } else if (password.length>0){
        $("#password").css({'border': '1px solid #e22e27', 'box-shadow': '0 0 10px #e22e27'});
        status.html("<span class='glyphicon glyphicon-remove' style='margin-top: 10px'></span>");
        status.attr('data-original-title', "Salasõna peab olema vähemalt 6 tähemärki")

    }
}