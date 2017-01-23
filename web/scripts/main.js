// function show and hide section
$(".select > *").click(function () {
    $(".select > *").css({backgroundColor: "blue", paddingLeft:"0"});
    $(this).css({backgroundColor: "red", paddingLeft:"50px"});
});