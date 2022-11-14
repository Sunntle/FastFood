$('.btn-special').click(function () {
    $(this).toggleClass("click");
    $('.sidebar-sub').toggleClass("show");
    $('.wrap').toggleClass("p-show");
});
$('.first-btn').click(function () {
    $('.sidebar-sub ul .first-show').toggleClass("show1");
    $('.sidebar-sub ul .first').toggleClass("rotate");
});
$('.second-btn').click(function () {
    $('.sidebar-sub ul .second-show').toggleClass("show2");
    $('.sidebar-sub ul .second').toggleClass("rotate");
});

$('.third-btn').click(function () {
    $('.sidebar-sub ul .third-show').toggleClass("show3");
    $('.sidebar-sub ul .third').toggleClass("rotate");
});
$('.fourth-btn').click(function () {
    $('.sidebar-sub ul .fourth-show').toggleClass("show4");
    $('.sidebar-sub ul .fourth').toggleClass("rotate");
});
$('.fifth-btn').click(function () {
    $('.sidebar-sub ul .fifth-show').toggleClass("show5");
    $('.sidebar-sub ul .fifth').toggleClass("rotate");
});
$('.sixth-btn').click(function () {
    $('.sidebar-sub ul .sixth-show').toggleClass("show6");
    $('.sidebar-sub ul .sixth').toggleClass("rotate");
});
$('.seventh-btn').click(function () {
    $('.sidebar-sub ul .seventh-show').toggleClass("show7");
    $('.sidebar-sub ul .seventh').toggleClass("rotate");
});

$('.sidebar-sub ul li').click(function () {
    $(this).addClass("active").siblings().removeClass("active");
});