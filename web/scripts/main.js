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
            url: "http://localhost/FindMyTest/web/app_dev.php/envoieMail",
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
var btnSelect;
var url;
var carnet = "http://localhost/FindMyTest/web/app_dev.php/carnet";
$(window).load(function () {
    positionBase = $(".evenements").position().top;
//    $("#projet").hide();
//    var pathname = window.location.pathname;
    url = window.location.href;
    if (url != carnet) {
        btnSelect.css({marginLeft: 20 + "px", color: "white", backgroundColor: "darkslategrey"});
    }

    btnSelect = $(".trio > li[id = projet]").css({marginLeft: 0 + "px", color: "darkslategrey", backgroundColor: "white"});
    $(".carnet > section").hide();
    pageShow = $(".carnet > section[id = projet]").show();
});

$(window).scroll(function () {
    var newPosition = positionBase - $("body").scrollTop();
    if ($("body").scrollTop() < $("nav").height() + $("header").height()) {
        $(".evenements").css({top: newPosition + "px"});
    }
});

$(".trio > li").click(function () {
    if (url != carnet) {
        window.location = "http://localhost/FindMyTest/web/app_dev.php/carnet";
    }
    var id = $(this).attr("id");
    pageShow.hide();
    btnSelect.css({marginLeft: 20 + "px", color: "white", backgroundColor: "darkslategrey"});
    $(".trio > li[id =" + id + "").css({marginLeft: 0 + "px", color: "darkslategrey", backgroundColor: "white"});
    $(".carnet > section[id=" + id + "]").show();
    pageShow = $(".carnet > section[id=" + id + "]");
    btnSelect = $(".trio > li[id =" + id + "");
});