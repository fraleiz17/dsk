(function($){'usestrict';$.fn.extend({customSelect:function(options){if(typeofdocument.body.style.maxHeight==='undefined'){returnthis;}vardefaults={customClass:'customSelect',mapClass:true,mapStyle:true},options=$.extend(defaults,options),prefix=options.customClass,changed=function($select,customSelectSpan){varcurrentSelected=$select.find(':selected'),customSelectSpanInner=customSelectSpan.children(':first'),html=currentSelected.html()||'&nbsp;';customSelectSpanInner.html(html);if(currentSelected.attr('disabled')){customSelectSpan.addClass(getClass('DisabledOption'));}else{customSelectSpan.removeClass(getClass('DisabledOption'));}setTimeout(function(){customSelectSpan.removeClass(getClass('Open'));$(document).off('mouseup.customSelect');},60);},getClass=function(suffix){returnprefix+suffix;};returnthis.each(function(){var$select=$(this),customSelectInnerSpan=$('<span/>').addClass(getClass('Inner')),customSelectSpan=$('<span/>');$select.after(customSelectSpan.append(customSelectInnerSpan));customSelectSpan.addClass(prefix);if(options.mapClass){customSelectSpan.addClass($select.attr('class'));}if(options.mapStyle){customSelectSpan.attr('style',$select.attr('style'));}$select.addClass('hasCustomSelect').on('render.customSelect',function(){changed($select,customSelectSpan);$select.css('width','');			varselectBoxWidth=parseInt($select.outerWidth(),10)-(parseInt(customSelectSpan.outerWidth(),10)-parseInt(customSelectSpan.width(),10));customSelectSpan.css({display:'inline-block'});varselectBoxHeight=customSelectSpan.outerHeight();if($select.attr('disabled')){customSelectSpan.addClass(getClass('Disabled'));}else{customSelectSpan.removeClass(getClass('Disabled'));}customSelectInnerSpan.css({width:selectBoxWidth,display:'inline-block'});$select.css({							'font-family':'select','-webkit-appearance':'menulist-button',							'max-width':'146px',							'padding':'10px',position:'absolute',opacity:0,height:selectBoxHeight,fontSize:customSelectSpan.css('font-size')});}).on('change.customSelect',function(){customSelectSpan.addClass(getClass('Changed'));changed($select,customSelectSpan);}).on('keyup.customSelect',function(e){if(!customSelectSpan.hasClass(getClass('Open'))){$select.trigger('blur.customSelect');$select.trigger('focus.customSelect');}else{if(e.which==13||e.which==27){changed($select,customSelectSpan);}}}).on('mousedown.customSelect',function(){customSelectSpan.removeClass(getClass('Changed'));}).on('mouseup.customSelect',function(e){if(!customSelectSpan.hasClass(getClass('Open'))){if($('.'+getClass('Open')).not(customSelectSpan).length>0&&typeofInstallTrigger!=='undefined'){$select.trigger('focus.customSelect');}else{customSelectSpan.addClass(getClass('Open'));e.stopPropagation();$(document).one('mouseup.customSelect',function(e){if(e.target!=$select.get(0)&&$.inArray(e.target,$select.find('*').get())<0){$select.trigger('blur.customSelect');}else{changed($select,customSelectSpan);}});}}}).on('focus.customSelect',function(){customSelectSpan.removeClass(getClass('Changed')).addClass(getClass('Focus'));}).on('blur.customSelect',function(){customSelectSpan.removeClass(getClass('Focus')+''+getClass('Open'));}).on('mouseenter.customSelect',function(){customSelectSpan.addClass(getClass('Hover'));}).on('mouseleave.customSelect',function(){customSelectSpan.removeClass(getClass('Hover'));}).trigger('render.customSelect');});}});})(jQuery);