/**
 * Created by Martin on 24.04.2016.
 */
var currentId;

function logScript(e, logId) {
    e.preventDefault();
    currentId = logId;
    var url = "/unelogi/a/" + logId;
    $("#dvloader-log").show();

    $.ajax({
        url: url,
        type: "get",
        success: function (data) {
            $("#dvloader-log").hide();
            $('#log-text').val(data.body);
            $('#log-date').val(formatDate(data.date));
            $('#log-title').val(data.title);
            $('#log-form').attr('action', '/unelogi/' + logId);
        }
    });
}

// kuupäevad ameerika formaadist eesti formaati
function formatDate(date) {
    var parts = date.split('-');
    return parts[2] + "." + parts[1] + "." + parts[0];
}


$(document).ready(function () {


    currentId = $('#log-form').data('current-id');
    var postPane = $('.endless-pagination');
    var loader = $("#dvloader-log");

    updateLogs();

    // vaatame kas on ebaõnnestunud päringuid
    function updateLogs() {
        var title = localStorage.title;
        var body = localStorage.body;
        var date = localStorage.date;
        if (typeof title !== 'undefined' &&  typeof body !== 'undefined' && typeof date !== 'undefined') {
            $.ajax({
                url: "/unelogi/" + currentId,
                type: "patch",
                data: {
                    '_token': $('input[name="_token"]').val(),
                    'body': body,
                    'title': title,
                    'date': date
                },
                success: function (data) {
                    postPane.html(data.posts);
                    postPane.data('next-page', data.next_page);
                    loader.hide();
                    localStorage.clear();
                },
                error: function () {
                    setTimeout(function () {
                        updateLogs();
                    }, 10000);
                }
            });
        }
    }

    // infinite scroll ajax
    $('.log-panel-body').scroll(function () {
        var panel = $('.endless-pagination');

        var page = panel.data('next-page');
        if (page !== null) {

            clearTimeout($.data(this, "scrollCheck"));

            $.data(this, "scrollCheck", setTimeout(function () {
                var log_body = $('.log-panel-body');
                var scroll_position_for_posts_load = log_body.height() + log_body.scrollTop() + 70;
                if (scroll_position_for_posts_load >= $('.list-group').height()) {
                    loader.show();
                    $.get(page, function (data) {
                        panel.append(data.posts);
                        panel.data('next-page', data.next_page);
                        loader.hide();

                    });
                }
            }, 350))

        }
    });

    // olemasoleva sissekande uuendamine
    $('#log-form').on('submit', function (e) {
        e.preventDefault();

        var body = $('#log-text').val();
        var title = $('#log-title').val();
        var date = $('#log-date').val()
        loader.show();
        $.ajax({
            url: "/unelogi/" + currentId,
            type: "patch",
            data: {
                '_token': $('input[name="_token"]').val(),
                'body': body,
                'title': title,
                'date': date
            },

            success: function (data) {
                // laeme sissekannete paneeli uuesti
                postPane.html(data.posts);
                postPane.data('next-page', data.next_page);
                loader.hide();
            },
            error: function (data) {
                localStorage.setItem("body", body);
                localStorage.setItem("title", title);
                localStorage.setItem("date", date);
                setTimeout(function () {
                    updateLogs();
                });
            }
        })
    });

    // teeme uue sissekande ja uuendame sissekannete paneeli ja vormi välju
    $('#new-log').on('submit', function (e) {


        e.preventDefault();
        loader.show();

        $.ajax({
            url: $(this).parent().attr('action'),
            type: "post",
            data: {
                '_token': $('input[name="_token"]').val()
            },
            success: function (data) {
                postPane.html(data.posts);
                postPane.data('next-page', data.next_page);
                currentId = data.id;
                $('#log-text').val(data.body);
                $('#log-title').val(data.title);
                $('#log-date').val(formatDate(data.date));
                loader.hide();
            }
        })
    });

});