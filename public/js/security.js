$(document).ready(function () {
    //Disable cut copy paste
        $('body').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
    //Disable mouse right click
    $("body").on("contextmenu",function(e){
        return false;
    });
});