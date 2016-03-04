$(function() {

    Morris.Bar({
        axes: false,
        grid: true,
        element: 'morris-bar-chart',
        data: [{
            y: '2006',
            a: 100,
            b: 10,

        }, {
            y: '2007',
            a: 75,
        }, {
            y: '2008',
            a: 50,
        }, {
            y: '2009',
            a: 75,
            b: 30,
        }, {
            y: '2010',
            a: 50,
        }, {
            y: '2011',
            a: 75,
        }, {
            y: '2012',
            a: 100,
        }],
        xkey: 'y',
        ykeys: ['a','b'],
        labels: ['Uni', 'Lisauni'],
        hideHover: 'auto',
        stacked: true,
        resize: true
    });

});
