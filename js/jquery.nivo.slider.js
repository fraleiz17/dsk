(function($){$.fn.nivoSlider=function(options){varsettings=$.extend({},$.fn.nivoSlider.defaults,options);returnthis.each(function(){varvars={currentSlide:0,currentImage:'',totalSlides:0,randAnim:'',running:false,paused:false,stop:false};varslider=$(this);slider.data('nivo:vars',vars);slider.css('position','relative');slider.width('1px');slider.height('1px');slider.addClass('nivoSlider');varkids=slider.children();kids.each(function(){varchild=$(this);if(!child.is('img')){if(child.is('a')){child.addClass('nivo-imageLink');}child=child.find('img:first');}varchildWidth=child.width();if(childWidth==0)childWidth=child.attr('width');varchildHeight=child.height();if(childHeight==0)childHeight=child.attr('height');if(childWidth>slider.width()){slider.width(childWidth);}if(childHeight>slider.height()){slider.height(childHeight);}child.css('display','none');vars.totalSlides++;});if(settings.startSlide>0){if(settings.startSlide>=vars.totalSlides)settings.startSlide=vars.totalSlides-1;vars.currentSlide=settings.startSlide;}if($(kids[vars.currentSlide]).is('img')){vars.currentImage=$(kids[vars.currentSlide]);}else{vars.currentImage=$(kids[vars.currentSlide]).find('img:first');}if($(kids[vars.currentSlide]).is('a')){$(kids[vars.currentSlide]).css('display','block');}slider.css('background','url('+vars.currentImage.attr('src')+')no-repeat');for(vari=0;i<settings.slices;i++){varsliceWidth=Math.round(slider.width()/settings.slices);if(i==settings.slices-1){slider.append($('<divclass="nivo-slice"></div>').css({left:(sliceWidth*i)+'px',width:(slider.width()-(sliceWidth*i))+'px'}));}else{slider.append($('<divclass="nivo-slice"></div>').css({left:(sliceWidth*i)+'px',width:sliceWidth+'px'}));}}slider.append($('<divclass="nivo-caption"><p></p></div>').css({display:'none',opacity:settings.captionOpacity}));if(vars.currentImage.attr('title')!=''){$('.nivo-captionp',slider).html(vars.currentImage.attr('title'));$('.nivo-caption',slider).fadeIn(settings.animSpeed);}vartimer=0;if(!settings.manualAdvance){timer=setInterval(function(){nivoRun(slider,kids,settings,false);},settings.pauseTime);}if(settings.directionNav){slider.append('<divclass="nivo-directionNav"><aclass="nivo-prevNav">Prev</a><aclass="nivo-nextNav">Next</a></div>');if(settings.directionNavHide){$('.nivo-directionNav',slider).hide();slider.hover(function(){$('.nivo-directionNav',slider).show();},function(){$('.nivo-directionNav',slider).hide();});}$('a.nivo-prevNav',slider).live('click',function(){if(vars.running)returnfalse;clearInterval(timer);timer='';vars.currentSlide-=2;nivoRun(slider,kids,settings,'prev');});$('a.nivo-nextNav',slider).live('click',function(){if(vars.running)returnfalse;clearInterval(timer);timer='';nivoRun(slider,kids,settings,'next');});}if(settings.controlNav){varnivoControl=$('<divclass="nivo-controlNav"></div>');slider.append(nivoControl);for(vari=0;i<kids.length;i++){if(settings.controlNavThumbs){varchild=kids.eq(i);if(!child.is('img')){child=child.find('img:first');}nivoControl.append('<aclass="nivo-control"rel="'+i+'"><imgsrc="'+child.attr('src').replace(settings.controlNavThumbsSearch,settings.controlNavThumbsReplace)+'"></a>');}else{nivoControl.append('<aclass="nivo-control"rel="'+i+'">'+i+'</a>');}}$('.nivo-controlNava:eq('+vars.currentSlide+')',slider).addClass('active');$('.nivo-controlNava',slider).live('click',function(){if(vars.running)returnfalse;if($(this).hasClass('active'))returnfalse;clearInterval(timer);timer='';slider.css('background','url('+vars.currentImage.attr('src')+')no-repeat');vars.currentSlide=$(this).attr('rel')-1;nivoRun(slider,kids,settings,'control');});}if(settings.keyboardNav){$(window).keypress(function(event){if(event.keyCode=='37'){if(vars.running)returnfalse;clearInterval(timer);timer='';vars.currentSlide-=2;nivoRun(slider,kids,settings,'prev');}if(event.keyCode=='39'){if(vars.running)returnfalse;clearInterval(timer);timer='';nivoRun(slider,kids,settings,'next');}});}if(settings.pauseOnHover){slider.hover(function(){vars.paused=true;clearInterval(timer);timer='';},function(){vars.paused=false;if(timer==''&&!settings.manualAdvance){timer=setInterval(function(){nivoRun(slider,kids,settings,false);},settings.pauseTime);}});}slider.bind('nivo:animFinished',function(){vars.running=false;$(kids).each(function(){if($(this).is('a')){$(this).css('display','none');}});if($(kids[vars.currentSlide]).is('a')){$(kids[vars.currentSlide]).css('display','block');}if(timer==''&&!vars.paused&&!settings.manualAdvance){timer=setInterval(function(){nivoRun(slider,kids,settings,false);},settings.pauseTime);}settings.afterChange.call(this);});});functionnivoRun(slider,kids,settings,nudge){varvars=slider.data('nivo:vars');if((!vars||vars.stop)&&!nudge)returnfalse;settings.beforeChange.call(this);if(!nudge){slider.css('background','url('+vars.currentImage.attr('src')+')no-repeat');}else{if(nudge=='prev'){slider.css('background','url('+vars.currentImage.attr('src')+')no-repeat');}if(nudge=='next'){slider.css('background','url('+vars.currentImage.attr('src')+')no-repeat');}}vars.currentSlide++;if(vars.currentSlide==vars.totalSlides){vars.currentSlide=0;settings.slideshowEnd.call(this);}if(vars.currentSlide<0)vars.currentSlide=(vars.totalSlides-1);if($(kids[vars.currentSlide]).is('img')){vars.currentImage=$(kids[vars.currentSlide]);}else{vars.currentImage=$(kids[vars.currentSlide]).find('img:first');}if(settings.controlNav){$('.nivo-controlNava',slider).removeClass('active');$('.nivo-controlNava:eq('+vars.currentSlide+')',slider).addClass('active');}if(vars.currentImage.attr('title')!=''){if($('.nivo-caption',slider).css('display')=='block'){$('.nivo-captionp',slider).fadeOut(settings.animSpeed,function(){$(this).html(vars.currentImage.attr('title'));$(this).fadeIn(settings.animSpeed);});}else{$('.nivo-captionp',slider).html(vars.currentImage.attr('title'));}$('.nivo-caption',slider).fadeIn(settings.animSpeed);}else{$('.nivo-caption',slider).fadeOut(settings.animSpeed);}vari=0;$('.nivo-slice',slider).each(function(){varsliceWidth=Math.round(slider.width()/settings.slices);$(this).css({height:'0px',opacity:'0',background:'url('+vars.currentImage.attr('src')+')no-repeat-'+((sliceWidth+(i*sliceWidth))-sliceWidth)+'px0%'});i++;});if(settings.effect=='random'){varanims=newArray("sliceDownRight","sliceDownLeft","sliceUpRight","sliceUpLeft","sliceUpDown","sliceUpDownLeft","fold","fade");vars.randAnim=anims[Math.floor(Math.random()*(anims.length+1))];if(vars.randAnim==undefined)vars.randAnim='fade';}vars.running=true;if(settings.effect=='sliceDown'||settings.effect=='sliceDownRight'||vars.randAnim=='sliceDownRight'||settings.effect=='sliceDownLeft'||vars.randAnim=='sliceDownLeft'){vartimeBuff=0;vari=0;varslices=$('.nivo-slice',slider);if(settings.effect=='sliceDownLeft'||vars.randAnim=='sliceDownLeft')slices=$('.nivo-slice',slider).reverse();slices.each(function(){varslice=$(this);slice.css('top','0px');if(i==settings.slices-1){setTimeout(function(){slice.animate({height:'100%',opacity:'1.0'},settings.animSpeed,'',function(){slider.trigger('nivo:animFinished');});},(100+timeBuff));}else{setTimeout(function(){slice.animate({height:'100%',opacity:'1.0'},settings.animSpeed);},(100+timeBuff));}timeBuff+=50;i++;});}elseif(settings.effect=='sliceUp'||settings.effect=='sliceUpRight'||vars.randAnim=='sliceUpRight'||settings.effect=='sliceUpLeft'||vars.randAnim=='sliceUpLeft'){vartimeBuff=0;vari=0;varslices=$('.nivo-slice',slider);if(settings.effect=='sliceUpLeft'||vars.randAnim=='sliceUpLeft')slices=$('.nivo-slice',slider).reverse();slices.each(function(){varslice=$(this);slice.css('bottom','0px');if(i==settings.slices-1){setTimeout(function(){slice.animate({height:'100%',opacity:'1.0'},settings.animSpeed,'',function(){slider.trigger('nivo:animFinished');});},(100+timeBuff));}else{setTimeout(function(){slice.animate({height:'100%',opacity:'1.0'},settings.animSpeed);},(100+timeBuff));}timeBuff+=50;i++;});}elseif(settings.effect=='sliceUpDown'||settings.effect=='sliceUpDownRight'||vars.randAnim=='sliceUpDown'||settings.effect=='sliceUpDownLeft'||vars.randAnim=='sliceUpDownLeft'){vartimeBuff=0;vari=0;varv=0;varslices=$('.nivo-slice',slider);if(settings.effect=='sliceUpDownLeft'||vars.randAnim=='sliceUpDownLeft')slices=$('.nivo-slice',slider).reverse();slices.each(function(){varslice=$(this);if(i==0){slice.css('top','0px');i++;}else{slice.css('bottom','0px');i=0;}if(v==settings.slices-1){setTimeout(function(){slice.animate({height:'100%',opacity:'1.0'},settings.animSpeed,'',function(){slider.trigger('nivo:animFinished');});},(100+timeBuff));}else{setTimeout(function(){slice.animate({height:'100%',opacity:'1.0'},settings.animSpeed);},(100+timeBuff));}timeBuff+=50;v++;});}elseif(settings.effect=='fold'||vars.randAnim=='fold'){vartimeBuff=0;vari=0;$('.nivo-slice',slider).each(function(){varslice=$(this);varorigWidth=slice.width();slice.css({top:'0px',height:'100%',width:'0px'});if(i==settings.slices-1){setTimeout(function(){slice.animate({width:origWidth,opacity:'1.0'},settings.animSpeed,'',function(){slider.trigger('nivo:animFinished');});},(100+timeBuff));}else{setTimeout(function(){slice.animate({width:origWidth,opacity:'1.0'},settings.animSpeed);},(100+timeBuff));}timeBuff+=50;i++;});}elseif(settings.effect=='fade'||vars.randAnim=='fade'){vari=0;$('.nivo-slice',slider).each(function(){$(this).css('height','100%');if(i==settings.slices-1){$(this).animate({opacity:'1.0'},(settings.animSpeed*2),'',function(){slider.trigger('nivo:animFinished');});}else{$(this).animate({opacity:'1.0'},(settings.animSpeed*2));}i++;});}}};$.fn.nivoSlider.defaults={effect:'random',slices:15,animSpeed:500,pauseTime:3000,startSlide:0,directionNav:true,directionNavHide:true,controlNav:true,controlNavThumbs:false,controlNavThumbsSearch:'.jpg',controlNavThumbsReplace:'_thumb.jpg',keyboardNav:true,pauseOnHover:true,manualAdvance:false,captionOpacity:0.8,beforeChange:function(){},afterChange:function(){},slideshowEnd:function(){}};$.fn.reverse=[].reverse;})(jQuery);