    
    var setTablesNav = function() {
        var tableNav = document.getElementById("table-tabs");
        var reportNav = document.getElementById("report-tabs");
        var tableLink = document.getElementById("table-link");
        var reportLink = document.getElementById("report-link");

        setTimeout(function() {
            $("#table-li").addClass("active");
            $("#report-li").removeClass("active");
        }, 100);

        console.log("clicked set tables nav");
    };

    var setReportsNav = function() {
        var tableNav = document.getElementById("table-tabs");
        var reportNav = document.getElementById("report-tabs");
        var tableLink = document.getElementById("table-link");
        var reportLink = document.getElementById("report-link");

        setTimeout(function() {
            $("#table-li").removeClass("active");
            $("#report-li").addClass("active");
        }, 100);

        console.log("clicked set reports nav");
    };