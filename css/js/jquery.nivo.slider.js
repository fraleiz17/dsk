!function(e){e.fn.nivoSlider=function(i){function n(i,n,t,a){var r=i.data("nivo:vars");if((!r||r.stop)&&!a)return!1;t.beforeChange.call(this),a?("prev"==a&&i.css("background","url("+r.currentImage.attr("src")+") no-repeat"),"next"==a&&i.css("background","url("+r.currentImage.attr("src")+") no-repeat")):i.css("background","url("+r.currentImage.attr("src")+") no-repeat"),r.currentSlide++,r.currentSlide==r.totalSlides&&(r.currentSlide=0,t.slideshowEnd.call(this)),r.currentSlide<0&&(r.currentSlide=r.totalSlides-1),e(n[r.currentSlide]).is("img")?r.currentImage=e(n[r.currentSlide]):r.currentImage=e(n[r.currentSlide]).find("img:first"),t.controlNav&&(e(".nivo-controlNav a",i).removeClass("active"),e(".nivo-controlNav a:eq("+r.currentSlide+")",i).addClass("active")),""!=r.currentImage.attr("title")?("block"==e(".nivo-caption",i).css("display")?e(".nivo-caption p",i).fadeOut(t.animSpeed,function(){e(this).html(r.currentImage.attr("title")),e(this).fadeIn(t.animSpeed)}):e(".nivo-caption p",i).html(r.currentImage.attr("title")),e(".nivo-caption",i).fadeIn(t.animSpeed)):e(".nivo-caption",i).fadeOut(t.animSpeed);var c=0;if(e(".nivo-slice",i).each(function(){var n=Math.round(i.width()/t.slices);e(this).css({height:"0px",opacity:"0",background:"url("+r.currentImage.attr("src")+") no-repeat -"+(n+c*n-n)+"px 0%"}),c++}),"random"==t.effect){var s=new Array("sliceDownRight","sliceDownLeft","sliceUpRight","sliceUpLeft","sliceUpDown","sliceUpDownLeft","fold","fade");r.randAnim=s[Math.floor(Math.random()*(s.length+1))],void 0==r.randAnim&&(r.randAnim="fade")}if(r.running=!0,"sliceDown"==t.effect||"sliceDownRight"==t.effect||"sliceDownRight"==r.randAnim||"sliceDownLeft"==t.effect||"sliceDownLeft"==r.randAnim){var o=0,c=0,l=e(".nivo-slice",i);("sliceDownLeft"==t.effect||"sliceDownLeft"==r.randAnim)&&(l=e(".nivo-slice",i).reverse()),l.each(function(){var n=e(this);n.css("top","0px"),c==t.slices-1?setTimeout(function(){n.animate({height:"100%",opacity:"1.0"},t.animSpeed,"",function(){i.trigger("nivo:animFinished")})},100+o):setTimeout(function(){n.animate({height:"100%",opacity:"1.0"},t.animSpeed)},100+o),o+=50,c++})}else if("sliceUp"==t.effect||"sliceUpRight"==t.effect||"sliceUpRight"==r.randAnim||"sliceUpLeft"==t.effect||"sliceUpLeft"==r.randAnim){var o=0,c=0,l=e(".nivo-slice",i);("sliceUpLeft"==t.effect||"sliceUpLeft"==r.randAnim)&&(l=e(".nivo-slice",i).reverse()),l.each(function(){var n=e(this);n.css("bottom","0px"),c==t.slices-1?setTimeout(function(){n.animate({height:"100%",opacity:"1.0"},t.animSpeed,"",function(){i.trigger("nivo:animFinished")})},100+o):setTimeout(function(){n.animate({height:"100%",opacity:"1.0"},t.animSpeed)},100+o),o+=50,c++})}else if("sliceUpDown"==t.effect||"sliceUpDownRight"==t.effect||"sliceUpDown"==r.randAnim||"sliceUpDownLeft"==t.effect||"sliceUpDownLeft"==r.randAnim){var o=0,c=0,d=0,l=e(".nivo-slice",i);("sliceUpDownLeft"==t.effect||"sliceUpDownLeft"==r.randAnim)&&(l=e(".nivo-slice",i).reverse()),l.each(function(){var n=e(this);0==c?(n.css("top","0px"),c++):(n.css("bottom","0px"),c=0),d==t.slices-1?setTimeout(function(){n.animate({height:"100%",opacity:"1.0"},t.animSpeed,"",function(){i.trigger("nivo:animFinished")})},100+o):setTimeout(function(){n.animate({height:"100%",opacity:"1.0"},t.animSpeed)},100+o),o+=50,d++})}else if("fold"==t.effect||"fold"==r.randAnim){var o=0,c=0;e(".nivo-slice",i).each(function(){var n=e(this),a=n.width();n.css({top:"0px",height:"100%",width:"0px"}),c==t.slices-1?setTimeout(function(){n.animate({width:a,opacity:"1.0"},t.animSpeed,"",function(){i.trigger("nivo:animFinished")})},100+o):setTimeout(function(){n.animate({width:a,opacity:"1.0"},t.animSpeed)},100+o),o+=50,c++})}else if("fade"==t.effect||"fade"==r.randAnim){var c=0;e(".nivo-slice",i).each(function(){e(this).css("height","100%"),c==t.slices-1?e(this).animate({opacity:"1.0"},2*t.animSpeed,"",function(){i.trigger("nivo:animFinished")}):e(this).animate({opacity:"1.0"},2*t.animSpeed),c++})}}var t=e.extend({},e.fn.nivoSlider.defaults,i);return this.each(function(){var i={currentSlide:0,currentImage:"",totalSlides:0,randAnim:"",running:!1,paused:!1,stop:!1},a=e(this);a.data("nivo:vars",i),a.css("position","relative"),a.width("1px"),a.height("1px"),a.addClass("nivoSlider");var r=a.children();r.each(function(){var n=e(this);n.is("img")||(n.is("a")&&n.addClass("nivo-imageLink"),n=n.find("img:first"));var t=n.width();0==t&&(t=n.attr("width"));var r=n.height();0==r&&(r=n.attr("height")),t>a.width()&&a.width(t),r>a.height()&&a.height(r),n.css("display","none"),i.totalSlides++}),t.startSlide>0&&(t.startSlide>=i.totalSlides&&(t.startSlide=i.totalSlides-1),i.currentSlide=t.startSlide),e(r[i.currentSlide]).is("img")?i.currentImage=e(r[i.currentSlide]):i.currentImage=e(r[i.currentSlide]).find("img:first"),e(r[i.currentSlide]).is("a")&&e(r[i.currentSlide]).css("display","block"),a.css("background","url("+i.currentImage.attr("src")+") no-repeat");for(var c=0;c<t.slices;c++){var s=Math.round(a.width()/t.slices);c==t.slices-1?a.append(e('<div class="nivo-slice"></div>').css({left:s*c+"px",width:a.width()-s*c+"px"})):a.append(e('<div class="nivo-slice"></div>').css({left:s*c+"px",width:s+"px"}))}a.append(e('<div class="nivo-caption"><p></p></div>').css({display:"none",opacity:t.captionOpacity})),""!=i.currentImage.attr("title")&&(e(".nivo-caption p",a).html(i.currentImage.attr("title")),e(".nivo-caption",a).fadeIn(t.animSpeed));var o=0;if(t.manualAdvance||(o=setInterval(function(){n(a,r,t,!1)},t.pauseTime)),t.directionNav&&(a.append('<div class="nivo-directionNav"><a class="nivo-prevNav">Prev</a><a class="nivo-nextNav">Next</a></div>'),t.directionNavHide&&(e(".nivo-directionNav",a).hide(),a.hover(function(){e(".nivo-directionNav",a).show()},function(){e(".nivo-directionNav",a).hide()})),e("a.nivo-prevNav",a).live("click",function(){return i.running?!1:(clearInterval(o),o="",i.currentSlide-=2,void n(a,r,t,"prev"))}),e("a.nivo-nextNav",a).live("click",function(){return i.running?!1:(clearInterval(o),o="",void n(a,r,t,"next"))})),t.controlNav){var l=e('<div class="nivo-controlNav"></div>');a.append(l);for(var c=0;c<r.length;c++)if(t.controlNavThumbs){var d=r.eq(c);d.is("img")||(d=d.find("img:first")),l.append('<a class="nivo-control" rel="'+c+'"><img src="'+d.attr("src").replace(t.controlNavThumbsSearch,t.controlNavThumbsReplace)+'"></a>')}else l.append('<a class="nivo-control" rel="'+c+'">'+c+"</a>");e(".nivo-controlNav a:eq("+i.currentSlide+")",a).addClass("active"),e(".nivo-controlNav a",a).live("click",function(){return i.running?!1:e(this).hasClass("active")?!1:(clearInterval(o),o="",a.css("background","url("+i.currentImage.attr("src")+") no-repeat"),i.currentSlide=e(this).attr("rel")-1,void n(a,r,t,"control"))})}t.keyboardNav&&e(window).keypress(function(e){if("37"==e.keyCode){if(i.running)return!1;clearInterval(o),o="",i.currentSlide-=2,n(a,r,t,"prev")}if("39"==e.keyCode){if(i.running)return!1;clearInterval(o),o="",n(a,r,t,"next")}}),t.pauseOnHover&&a.hover(function(){i.paused=!0,clearInterval(o),o=""},function(){i.paused=!1,""!=o||t.manualAdvance||(o=setInterval(function(){n(a,r,t,!1)},t.pauseTime))}),a.bind("nivo:animFinished",function(){i.running=!1,e(r).each(function(){e(this).is("a")&&e(this).css("display","none")}),e(r[i.currentSlide]).is("a")&&e(r[i.currentSlide]).css("display","block"),""!=o||i.paused||t.manualAdvance||(o=setInterval(function(){n(a,r,t,!1)},t.pauseTime)),t.afterChange.call(this)})})},e.fn.nivoSlider.defaults={effect:"random",slices:15,animSpeed:500,pauseTime:3e3,startSlide:0,directionNav:!0,directionNavHide:!0,controlNav:!0,controlNavThumbs:!1,controlNavThumbsSearch:".jpg",controlNavThumbsReplace:"_thumb.jpg",keyboardNav:!0,pauseOnHover:!0,manualAdvance:!1,captionOpacity:.8,beforeChange:function(){},afterChange:function(){},slideshowEnd:function(){}},e.fn.reverse=[].reverse}(jQuery);
