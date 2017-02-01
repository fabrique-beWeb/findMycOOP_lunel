function refrech() {
    $(".loading").hide();
    $(".contact").show();
    $(".email").val("");
    $(".sujet").val("inscrption");
    $(".message").val("");
    $(".confirmation").val("");
}

$(document).ready(function () {
    $(".loading").hide();
    $(".button").click(function () {
        $(".contact").hide();
        $(".loading").show();
        var mail = $(".email").val();
        var subject = $(".sujet").val();
        var message = $(".message").val();
        $.ajax({
            url: "http://localhost/fmcTest/web/app_dev.php/envoieMail",
            data: {"mail": mail, "sujet": subject, "message": message},
            type: 'get',
            dataType: 'json',
            success: function (data) {
                info = JSON.stringify(data);
                $(".confirmation").val(info);
                refrech();
            },
            error: function () {
                $(".confirmation").append("Veuillez réessayer plus tard");
                alert("sqb");
            }
        });
    });
});

var positionBase;
var pageShow;
$(window).load(function () {
    positionBase = $(".evenements").position().top;
//    $("#projet").hide();
    $(".carnet > section").hide();
    pageShow = $(".carnet > section[id = projet]").show().css({marginLeft: 0 + "px"});
});

$(window).scroll(function () {
    var newPosition = positionBase - $("body").scrollTop();
    if ($("body").scrollTop() < $("nav").height()) {
        $(".evenements").css({top: newPosition + "px"});
    }
});

$(".trio > li").click(function () {
    var id = $(this).attr("id");
    pageShow.hide();
    $(".carnet > section[id=" + id + "]").show();
    pageShow = $(".carnet > section[id=" + id + "]");
});
