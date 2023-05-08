$(document).ready(function () {
    $("#h").on("click", function () {
        $("#home").fadeIn();
        $("#item1").hide();
        $("#item2").hide();
        $("#item3").hide();
    });
    $("#i1").on("click", function () {
        $("#item1").fadeIn();
        $("#home").hide();
        $("#item2").hide();
        $("#item3").hide();
    });
    $("#i2").on("click", function () {
        $("#item2").fadeIn();
        $("#home").hide();
        $("#item1").hide();
        $("#item3").hide();
    });
    $("#i3").on("click", function () {
        $("#item3").fadeIn();
        $("#home").hide();
        $("#item1").hide();
        $("#item2").hide();
    });
})
