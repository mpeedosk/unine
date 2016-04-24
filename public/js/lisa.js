/**
 * Created by Martin on 24.04.2016.
 */
poll();

$(document).ready(function () {

    $.ajax({
        type: "GET",
        url: "autor.xml",
        dataType: "xml",
        success: parseXML
    });

    function parseXML(xml) {
        var emails = xml.getElementsByTagName("email");
        var names = xml.getElementsByTagName("nimi");
        var tableHead = "<table class='info-table'><thead>" +
            "<tr>" +
            "<th>Nimi</th>" +
            "<th>Email</th>" +
            "</tr>" +
            "</thead><tbody>";
        var tableFooter = "</tbody></table>";

        var tableBody = "";

        for(var i = 0; i < emails.length;i++){
            tableBody +=    "<tr>" +
                "<td>" + names[i].textContent.toString() + "</td>" +
                "<td>" + emails[i].textContent.toString() + "</td>" +
                "</tr>" ;
        }

        $('#autorid').html(tableHead + tableBody + tableFooter);
    }
});