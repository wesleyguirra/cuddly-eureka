$(document).ready(function(){
  $(".tab-content").hide();
  $(".tab-content:eq(0)").show();
  $(".ni:eq(0)").addClass("ni-active");
  $(".ni").click(function(e){
    e.preventDefault();
    var i = $(this).index();
    $(".ni").removeClass("ni-active");
    $(this).addClass("ni-active");
    $(".tab-content").hide();
    $(".tab-content:eq("+i+")").fadeIn();
  });
  $("nav ul li a").mouseover(function(){
    $(this).next("span").animate({ "left": "+=15px" }, "slow" ).css("opacity","100");
  });
  $("nav ul li a").mouseout(function(){
    $(this).next("span").animate({ "left": "-=15px" }, "slow" ).css("opacity","0");
  });
  $(".message").delay(3000).fadeOut(800);
  $(".cnpj").mask("99.999.999/9999-99");
});
