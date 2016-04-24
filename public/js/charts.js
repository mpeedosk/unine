/**
 * Created by Martin on 24.04.2016.
 */

$('.clockpicker').clockpicker({
    placement: 'bottom',
    align: 'right',
    autoclose: 'true',
    donetext: 'Valmis'
});

$(function () {


    // teeme tühjad masiivid tulpade jaoks
    var allHours = [];
    var allDates = [];
    var extraHours = [];


    // leiame graafiku andmed
    var data = $('#chart').data('chart');

    // vaatame kõik andmed läbi ja lisame õigesse masiivi
    for (var entry in data) {
        allHours.push(data[entry].hours);
        allDates.push(data[entry].created_at);
        extraHours.push(0);
    }

    // graafiku jaoks arusaadav formaat
    var barChartData = {
        labels: allDates,
        datasets: [
            {
                // some styiling and data
                fillColor: "rgba(151,187,205,0.5)",
                strokeColor: "rgba(151,187,205,0.8)",
                highlightFill: "rgba(151,187,205,0.75)",
                highlightStroke: "rgba(151,187,205,1)",
                data: extraHours
            },
            {
                // some styiling and data
                fillColor: "rgba(220,220,220,0.5)",
                strokeColor: "rgba(220,220,220,0.8)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)",
                data: allHours
            }

        ]

    };

    // teeme uue barCharti
    var ctx = document.getElementById("canvas").getContext("2d");
    var myBar = new Chart(ctx).StackedBar(barChartData, {
        responsive: true,
        multiTooltipTemplate: "<%= toHours(value) %>"
    });


    // kui kasutaja sisesestab andmed
    $('#chart').on('submit', function (e) {
        e.preventDefault();
        $("#dvloader").show();
        document.getElementById("home-submit").disabled = true;

        $.ajax({
            url: $(this).parent().attr('action'),
            type: "post",
            datatype: 'json',
            data: {
                '_token': $('input[name="_token"]').val(),
                'went_to_sleep': $('#went-to-sleep').val(),
                'woke_up_at': $('#woke-up-at').val()
            },
            success: function (data) {
                if (myBar.datasets[0].bars.length >= 7)
                    myBar.removeData();
                myBar.addData([0, data.hours], data.created_at);
                $("#dvloader").hide();
                document.getElementById("home-submit").disabled = false;
            },
            error: function (data) {
                alert("OFFLINE");
                myBar.removeData();
                myBar.addData([0, data.hours], data.created_at);
                $("#dvloader").hide();
                var errors = data.responseJSON;
                console.log(errors);
            }
        })

    });

    var activeBars;

    function setPos() {
        var left = event.clientX + "px";
        var top = event.clientY + "px";
        var div = document.getElementById('pop');
        div.style.left = left;
        div.style.top = top;
    }

    $("#canvas").click(function (e) {
        var activeOld = activeBars;
        activeBars = myBar.getBarsAtEvent(e);

        if (activeBars.length > 0) {
//                activeBars[0].value = Math.random() * 100;
//                myBar.update();
//                document.getElementsByClassName('pop')

            if (!$('#pop').is(':visible')) {
                setPos();
                $('.pop').slideFadeToggle();
            }
            else {
                if (activeOld != null && (activeBars[1] === activeOld[1]))
                    $('.pop').slideFadeToggle();
                else {
                    setPos();
                }
            }
            return false;
        }
    });

    $('#extraHours').on('submit', function (e) {
        e.preventDefault();
        $('.pop').slideFadeToggle();
        activeBars[0].value = $('#addHour').val();
        $('#addHour').val("");
        myBar.update();


        /*$.ajax({
         url: $(this).parent().attr('action'),
         type: "post",
         datatype: 'json',
         data: {
         '_token': $('input[name="_token"]').val(),
         'went_to_sleep': $('#went-to-sleep').val(),
         'woke_up_at': $('#woke-up-at').val()
         },
         success: function (data) {
         myBar.removeData();
         myBar.addData([0, data.hours], data.created_at);
         $("#dvloader").hide();
         document.getElementById("home-submit").disabled = false;
         },
         error: function (data) {
         var errors = data.responseJSON;
         console.log(errors);
         }
         })*/

    });

});

function toHours(value) {
    var string = value + '';
    var parts = string.split('.');
    if (parts.length == 1)
        return parts[0] + "h";
    return parts[0] + "h " + Math.round((pad(parts[1]) / 100) * 60) + "m";
}

function pad(d) {
    return (d.length < 2) ? d * 10 : d;
}

$(function () {
    $('.close').on('click', function () {
        $('.pop').slideFadeToggle();
        return false;
    });
});

$.fn.slideFadeToggle = function (easing, callback) {
    return this.animate({opacity: 'toggle', height: 'toggle'}, 'fast', easing, callback);
};

$(window).scroll(function () {
    $('.pop').hide();
});
