function refrech() {
    $(".loading").hide();
    $(".contact").show();
    $(".email").val("");
    $(".sujet").val("inscrption");
    $(".message").val("");
    $(".confirmation").val("");
}

//$(document).ready(function () {
//    $(".loading").hide();
//    $(".button").click(function (e) {
//        e.preventDefault();
//        $(".contact").hide();
//        $(".loading").show();
//        var mail = $(".email").val();
//        var subject = $(".sujet").val();
//        var message = $(".message").val();
//        alert(mail);
//        $.ajax({
//            url: "/envoieMail",
//            data: {"mail": mail, "sujet": subject, "message": message},
//            type: 'get',
//            dataType: 'json',
//            success: function (data) {
//                info = JSON.stringify(data);
//                alert(info);
//                $(".confirmation").val(info);
//                refrech();
//            },
//            error: function () {
//                $(".confirmation").append("Veuillez réessayer plus tard");
////                alert("sqb");
//            }
//        });
//    });
//});

var positionBase;
var pageShow;
var btnSelect;
var url;
var carnet = "http://www.findmycoop.fr/carnet";
$(window).load(function () {
    positionBase = $(".evenements").position().top;
//    $("#projet").hide();
//    var pathname = window.location.pathname;
    url = window.location.href;
    if (url != carnet) {
        $(btnSelect).css({marginLeft: 20 + "px", color: "white", backgroundColor: "red"});
    }

    btnSelect = $(".trio > li[id = projet]").css({marginLeft: 0 + "px", color: "darkslategrey", backgroundColor: "white"});
    //cache les section du carnet
    $(".carnet > section").hide();
    //affiche par default longlet projet du carnet
    pageShow = $(".carnet > section[id = projet]").show();
});

$(window).scroll(function () {
    var newPosition = positionBase - $("body").scrollTop();
    if ($("body").scrollTop() < $("nav").height() + $("header").height()) {
        $(".evenements").css({top: newPosition + "px"});
    }
});

$(".trio > li").click(function () {
    //redirect au carnet si tu click sur un des onglets
    //et que ton URI n'est pas /carnet
    if (url != carnet) {
        window.location = "http://www.findmycoop.fr/carnet";
    }
    //recupere lattribut id de la section
    var id = $(this).attr("id");
    pageShow.hide();
    btnSelect.css({marginLeft: 20 + "px", color: "white", backgroundColor: "darkslategrey", transition: "0.5s"});
    $(".trio > li[id =" + id + "").css({marginLeft: 0 + "px", color: "darkslategrey", backgroundColor: "white"});
    //afiche la section suivant l'id
    $(".carnet > section[id=" + id + "]").show();
    pageShow = $(".carnet > section[id=" + id + "]");
    btnSelect = $(".trio > li[id =" + id + "");
});

//$(".trio > li[id = profil]").click(function () {
//    var id = "";
//
//    $.ajax({
//        url: "/get/session",
//        type: 'get',
//        data: {"id": id},
//
//        dataType: 'json',
//        success: function (data) {
//            id = JSON.stringify(data);
//                window.location = "http://www.findmycoop.fr/carnet/" + id;
//        },
//        error: function () {
//            alert("bug");
//        }
//    });
//
//
//});


$("#validEditProfil").click(function (e) {
//    e.preventDefault();
    $.ajax({
        type: 'POST',
        async: false,
        dataType: 'json',
        url: "/carnet/profile",
        data:
                {
                    "nom": $("#nom").val(),
                    "prenom": $("#prenom").val(),
                    "pseudo": $("#pseudo").val(),
                    "password": $("#password").val(),
                    "adresse": $("#adresse").val(),
                    "ville": $("#ville").val(),
                    "url": $("#url").val(),
                    "mail": $("#mail").val(),
                    "codePostal": $("#codePostal").val()
                },
        success: function (data, textStatus, jqXHR) {
            alert(data);
        }
    });
});