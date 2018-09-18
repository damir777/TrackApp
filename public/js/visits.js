function saveVisitEndTime()
{
    $.ajax({
        url: 'http://46.101.171.222/dkopic/trackApp/public/saveVisitEndTime',
        type: 'get',
        dataType: 'json',
        async: false,
        success: function(result) { }
    });
}

$(document).ready(function() {

    window.onbeforeunload = function(){

        saveVisitEndTime();
    }
});