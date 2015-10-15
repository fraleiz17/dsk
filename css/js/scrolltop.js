$(function(){$("ul li a").on("click",function(t){t.preventDefault();var o=$(this).attr("href");$("html,div").stop(!0,!0).animate({scrollTop:$(o).offset().top},1e3)})});
