$(document).ready(function () {

    $('[data-toggle="tooltip"]').tooltip();

    // avab login akna
    $("#login-toggle").on('click', function () {
        $("#login-modal").modal({show: true});
    });

    // sulgeb login akna
    $("#login-close").on('click', function () {
        $("#login-modal").modal('hide')
    }); // show login modal

    // veeretab menüü välja
    $("#menu-close").click(function (e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // veeretab menüü sisse
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });


    // kui vajutada arvuta aeg nupule, siis vahetab div'id ära
    $('#calc-sleep-now').click(function () {
        var text = document.getElementById('btn-label-left').innerText;
        $("#btn-label-left").text(text == "aeg" ? "uuesti" : "aeg");
        var ix = $(this).index();
        $('#calc-left-a').slideToggle(750, "linear", ix === 0);
        $('#calc-left-b').slideToggle(750, "linear", ix === 1);
    });

    $('#calc-sleep-later').click(function () {
        var text = document.getElementById('btn-label-right').innerText;
        $("#btn-label-right").text(text == "aeg" ? "uuesti" : "aeg");
        var ix = $(this).index();
        var ix = $(this).index();
        $('#calc-right-a').slideToggle(750, "linear", ix === 0);
        $('#calc-right-b').slideToggle(750, "linear", ix === 1);
    });


    // sujuv lehekülgede vahetus
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 500,
        outDuration: 500,
        linkElement: '.animsition-link',
        // e.g. linkElement: 'a:not([target="_blank"]):not([href^=#])'
        loading: true,
        loadingParentElement: 'body', //animsition wrapper element
        loadingClass: 'animsition-loading',
        loadingInner: '', // e.g '<img src="loading.svg" />'
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: ['animation-duration', '-webkit-animation-duration'],
        // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
        // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
        overlay: false,
        overlayClass: 'animsition-overlay-slide',
        overlayParentElement: 'body',
        transition: function (url) {
            window.location.href = url;
        }
    });
});

/* $(window).load(function () {
 $('#preloader').fadeOut('slow', function () {
 $(this).remove();
 });
 });*/

// kellaaja arvutamine, kui kohe magama minna                                                     ä
$('#calc-sleep-now').click(function () {
    var currentdate = new Date();
    var timeHour = currentdate.getHours();
    var timeMinute = currentdate.getMinutes() + 14;

    $("#time-text-left").text("");

    for (var i = 0; i < 7; i++) {
        timeHour++;
        timeMinute += 30;
        if (timeMinute >= 60) {
            timeHour++;
            timeMinute -= 60;
        }
        timeHour = timeHour % 24;
        var datetime = pad(timeHour) + ":" + pad(timeMinute);

        switch(i){
            case 1: $("#time-text-left-1").text(datetime); break
            case 2: $("#time-text-left-2").text(datetime); break
            case 3: $("#time-text-left-3").text(datetime); break
            case 4: $("#time-text-left-4").text(datetime); break
            case 5: $("#time-text-left-5").text(datetime); break
            case 6: $("#time-text-left-6").text(datetime); break

        }
    }
});

// kellaaegade arvutamine kui vaja ärgata teatud kellaaeg
$('#calc-sleep-later').click(function () {
    var input = document.getElementById('wakeup-insert').value;

    var timeHour = parseInt(input.split(/[.:;,-]/)[0]);
    var timeMinute = parseInt(input.split(/[.:;,-]/)[1]);

    timeHour += 21; // liidame 24 et saaks paremini lahutdada, ning lahutame 3, mis on hilisem uneaeg
    $("#time-text-right").text("");

    for (var i = 1; i < 8 ; i++) {
        var datetime = pad(timeHour % 24) + ":" + pad(timeMinute);

        switch(i){
            case 1: $("#time-text-right-6").text(datetime); break
            case 2: $("#time-text-right-5").text(datetime); break
            case 3: $("#time-text-right-4").text(datetime); break
            case 4: $("#time-text-right-3").text(datetime); break
            case 5: $("#time-text-right-2").text(datetime); break
            case 6: $("#time-text-right-1").text(datetime); break
        }
        timeHour--;
        timeMinute -= 30;
        if (timeMinute < 0) {
            timeHour--;
            timeMinute += 60;
        }
    }
});
// teeme kõik arvud vähemalt 2 kohaliseks ehk 1 oleks 01 jne
function pad(d) {
    return (d < 10) ? '0' + d.toString() : d.toString();
}
