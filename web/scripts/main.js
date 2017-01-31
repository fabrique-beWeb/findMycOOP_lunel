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

//        console.log(mail, message, subject);
    });
});

var positionBase;

$(window).load(function () {
    positionBase = $(".evenements").position().top;
});
$(window).scroll(function () {
    var newPosition = positionBase - $("body").scrollTop();
    if ($("body").scrollTop() < $("nav").height()) {
        $(".evenements").css({top: newPosition + "px"})
    }

});