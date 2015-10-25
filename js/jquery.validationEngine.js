(function($){"usestrict";varmethods={init:function(options){varform=this;if(!form.data('jqv')||form.data('jqv')==null){options=methods._saveOptions(form,options);$(document).on("click",".formError",function(){$(this).fadeOut(150,function(){$(this).closest('.formErrorOuter').remove();});});}returnthis;},attach:function(userOptions){varform=this;varoptions;if(userOptions)options=methods._saveOptions(form,userOptions);elseoptions=form.data('jqv');options.validateAttribute=(form.find("[data-validation-engine*=validate]").length)?"data-validation-engine":"class";if(options.binded){form.on(options.validationEventTrigger,"["+options.validateAttribute+"*=validate]:not([type=checkbox]):not([type=radio]):not(.datepicker)",methods._onFieldEvent);form.on("click","["+options.validateAttribute+"*=validate][type=checkbox],["+options.validateAttribute+"*=validate][type=radio]",methods._onFieldEvent);form.on(options.validationEventTrigger,"["+options.validateAttribute+"*=validate][class*=datepicker]",{"delay":300},methods._onFieldEvent);}if(options.autoPositionUpdate){$(window).bind("resize",{"noAnimation":true,"formElem":form},methods.updatePromptsPosition);}form.on("click","a[data-validation-engine-skip],a[class*='validate-skip'],button[data-validation-engine-skip],button[class*='validate-skip'],input[data-validation-engine-skip],input[class*='validate-skip']",methods._submitButtonClick);form.removeData('jqv_submitButton');form.on("submit",methods._onSubmitEvent);returnthis;},detach:function(){varform=this;varoptions=form.data('jqv');form.off(options.validationEventTrigger,"["+options.validateAttribute+"*=validate]:not([type=checkbox]):not([type=radio]):not(.datepicker)",methods._onFieldEvent);form.off("click","["+options.validateAttribute+"*=validate][type=checkbox],["+options.validateAttribute+"*=validate][type=radio]",methods._onFieldEvent);form.off(options.validationEventTrigger,"["+options.validateAttribute+"*=validate][class*=datepicker]",methods._onFieldEvent);form.off("submit",methods._onSubmitEvent);form.removeData('jqv');form.off("click","a[data-validation-engine-skip],a[class*='validate-skip'],button[data-validation-engine-skip],button[class*='validate-skip'],input[data-validation-engine-skip],input[class*='validate-skip']",methods._submitButtonClick);form.removeData('jqv_submitButton');if(options.autoPositionUpdate)$(window).off("resize",methods.updatePromptsPosition);returnthis;},validate:function(){varelement=$(this);varvalid=null;if(element.is("form")||element.hasClass("validationEngineContainer")){if(element.hasClass('validating')){returnfalse;}else{element.addClass('validating');varoptions=element.data('jqv');varvalid=methods._validateFields(this);setTimeout(function(){element.removeClass('validating');},100);if(valid&&options.onSuccess){options.onSuccess();}elseif(!valid&&options.onFailure){options.onFailure();}}}elseif(element.is('form')||element.hasClass('validationEngineContainer')){element.removeClass('validating');}else{varform=element.closest('form,.validationEngineContainer'),options=(form.data('jqv'))?form.data('jqv'):$.validationEngine.defaults,valid=methods._validateField(element,options);}if(options.onValidationComplete){return!!options.onValidationComplete(form,valid);}returnvalid;},updatePromptsPosition:function(event){if(event&&this==window){varform=event.data.formElem;varnoAnimation=event.data.noAnimation;}elsevarform=$(this.closest('form,.validationEngineContainer'));varoptions=form.data('jqv');if(!options)options=methods._saveOptions(form,options);form.find('['+options.validateAttribute+'*=validate]').not(":disabled").each(function(){varfield=$(this);if(options.prettySelect&&field.is(":hidden"))field=form.find("#"+options.usePrefix+field.attr('id')+options.useSuffix);varprompt=methods._getPrompt(field);varpromptText=$(prompt).find(".formErrorContent").html();if(prompt)methods._updatePrompt(field,$(prompt),promptText,undefined,false,options,noAnimation);});returnthis;},showPrompt:function(promptText,type,promptPosition,showArrow){varform=this.closest('form,.validationEngineContainer');varoptions=form.data('jqv');if(!options)options=methods._saveOptions(this,options);if(promptPosition)options.promptPosition=promptPosition;options.showArrow=showArrow==true;methods._showPrompt(this,promptText,type,false,options);returnthis;},hide:function(){varform=$(this).closest('form,.validationEngineContainer');varoptions=form.data('jqv');if(!options)options=methods._saveOptions(form,options);varfadeDuration=(options&&options.fadeDuration)?options.fadeDuration:0.3;varclosingtag;if($(this).is("form")||$(this).hasClass("validationEngineContainer")){closingtag="parentForm"+methods._getClassName($(this).attr("id"));}else{closingtag=methods._getClassName($(this).attr("id"))+"formError";}$('.'+closingtag).fadeTo(fadeDuration,0.3,function(){$(this).closest('.formErrorOuter').remove();});returnthis;},hideAll:function(){varform=this;varoptions=form.data('jqv');varduration=options?options.fadeDuration:300;$('.formError').fadeTo(duration,300,function(){$(this).closest('.formErrorOuter').remove();});returnthis;},_onFieldEvent:function(event){varfield=$(this);varform=field.closest('form,.validationEngineContainer');varoptions=form.data('jqv');if(!options)options=methods._saveOptions(form,options);options.eventTrigger="field";window.setTimeout(function(){methods._validateField(field,options);},(event.data)?event.data.delay:0);},_onSubmitEvent:function(){varform=$(this);varoptions=form.data('jqv');if(form.data("jqv_submitButton")){varsubmitButton=$("#"+form.data("jqv_submitButton"));if(submitButton){if(submitButton.length>0){if(submitButton.hasClass("validate-skip")||submitButton.attr("data-validation-engine-skip")=="true")returntrue;}}}options.eventTrigger="submit";varr=methods._validateFields(form);if(r&&options.ajaxFormValidation){methods._validateFormWithAjax(form,options);returnfalse;}if(options.onValidationComplete){return!!options.onValidationComplete(form,r);}returnr;},_checkAjaxStatus:function(options){varstatus=true;$.each(options.ajaxValidCache,function(key,value){if(!value){status=false;returnfalse;}});returnstatus;},_checkAjaxFieldStatus:function(fieldid,options){returnoptions.ajaxValidCache[fieldid]==true;},_validateFields:function(form){varoptions=form.data('jqv');varerrorFound=false;form.trigger("jqv.form.validating");varfirst_err=null;form.find('['+options.validateAttribute+'*=validate]').not(":disabled").each(function(){varfield=$(this);varnames=[];if($.inArray(field.attr('name'),names)<0){errorFound|=methods._validateField(field,options);if(errorFound&&first_err==null)if(field.is(":hidden")&&options.prettySelect)first_err=field=form.find("#"+options.usePrefix+methods._jqSelector(field.attr('id'))+options.useSuffix);else{if(field.data('jqv-prompt-at')instanceofjQuery){field=field.data('jqv-prompt-at');}elseif(field.data('jqv-prompt-at')){field=$(field.data('jqv-prompt-at'));}first_err=field;}if(options.doNotShowAllErrosOnSubmit)returnfalse;names.push(field.attr('name'));if(options.showOneMessage==true&&errorFound){returnfalse;}}});form.trigger("jqv.form.result",[errorFound]);if(errorFound){if(options.scroll){vardestination=first_err.offset().top;varfixleft=first_err.offset().left;varpositionType=options.promptPosition;if(typeof(positionType)=='string'&&positionType.indexOf(":")!=-1)positionType=positionType.substring(0,positionType.indexOf(":"));if(positionType!="bottomRight"&&positionType!="bottomLeft"){varprompt_err=methods._getPrompt(first_err);if(prompt_err){destination=prompt_err.offset().top;}}if(options.scrollOffset){destination-=options.scrollOffset;}if(options.isOverflown){varoverflowDIV=$(options.overflownDIV);if(!overflowDIV.length)returnfalse;varscrollContainerScroll=overflowDIV.scrollTop();varscrollContainerPos=-parseInt(overflowDIV.offset().top);destination+=scrollContainerScroll+scrollContainerPos-5;varscrollContainer=$(options.overflownDIV).filter(":not(:animated)");scrollContainer.animate({scrollTop:destination},1100,function(){if(options.focusFirstField)first_err.focus();});}else{$("html,body").animate({scrollTop:destination},1100,function(){if(options.focusFirstField)first_err.focus();});$("html,body").animate({scrollLeft:fixleft},1100)}}elseif(options.focusFirstField)first_err.focus();returnfalse;}returntrue;},_validateFormWithAjax:function(form,options){vardata=form.serialize();vartype=(options.ajaxFormValidationMethod)?options.ajaxFormValidationMethod:"GET";varurl=(options.ajaxFormValidationURL)?options.ajaxFormValidationURL:form.attr("action");vardataType=(options.dataType)?options.dataType:"json";$.ajax({type:type,url:url,cache:false,dataType:dataType,data:data,form:form,methods:methods,options:options,beforeSend:function(){returnoptions.onBeforeAjaxFormValidation(form,options);},error:function(data,transport){if(options.onFailure){options.onFailure(data,transport);}else{methods._ajaxError(data,transport);}},success:function(json){if((dataType=="json")&&(json!==true)){varerrorInForm=false;for(vari=0;i<json.length;i++){varvalue=json[i];varerrorFieldId=value[0];varerrorField=$($("#"+errorFieldId)[0]);if(errorField.length==1){varmsg=value[2];if(value[1]==true){if(msg==""||!msg){methods._closePrompt(errorField);}else{if(options.allrules[msg]){vartxt=options.allrules[msg].alertTextOk;if(txt)msg=txt;}if(options.showPrompts)methods._showPrompt(errorField,msg,"pass",false,options,true);}}else{errorInForm|=true;if(options.allrules[msg]){vartxt=options.allrules[msg].alertText;if(txt)msg=txt;}if(options.showPrompts)methods._showPrompt(errorField,msg,"",false,options,true);}}}options.onAjaxFormComplete(!errorInForm,form,json,options);}elseoptions.onAjaxFormComplete(true,form,json,options);}});},_validateField:function(field,options,skipAjaxValidation){if(!field.attr("id")){field.attr("id","form-validation-field-"+$.validationEngine.fieldIdCounter);++$.validationEngine.fieldIdCounter;}if(field.hasClass(options.ignoreFieldsWithClass))returnfalse;if(!options.validateNonVisibleFields&&(field.is(":hidden")&&!options.prettySelect||field.parent().is(":hidden")))returnfalse;varrulesParsing=field.attr(options.validateAttribute);vargetRules=/validate\[(.*)\]/.exec(rulesParsing);if(!getRules)returnfalse;varstr=getRules[1];varrules=str.split(/\[|,|\]/);varisAjaxValidator=false;varfieldName=field.attr("name");varpromptText="";varpromptType="";varrequired=false;varlimitErrors=false;options.isError=false;options.showArrow=true;if(options.maxErrorsPerField>0){limitErrors=true;}varform=$(field.closest("form,.validationEngineContainer"));for(vari=0;i<rules.length;i++){rules[i]=rules[i].replace("","");if(rules[i]===''){deleterules[i];}}for(vari=0,field_errors=0;i<rules.length;i++){if(limitErrors&&field_errors>=options.maxErrorsPerField){if(!required){varhave_required=$.inArray('required',rules);required=(have_required!=-1&&have_required>=i);}break;}varerrorMsg=undefined;switch(rules[i]){case"required":required=true;errorMsg=methods._getErrorMessage(form,field,rules[i],rules,i,options,methods._required);break;case"custom":errorMsg=methods._getErrorMessage(form,field,rules[i],rules,i,options,methods._custom);break;case"groupRequired":varclassGroup="["+options.validateAttribute+"*="+rules[i+1]+"]";varfirstOfGroup=form.find(classGroup).eq(0);if(firstOfGroup[0]!=field[0]){methods._validateField(firstOfGroup,options,skipAjaxValidation);options.showArrow=true;}errorMsg=methods._getErrorMessage(form,field,rules[i],rules,i,options,methods._groupRequired);if(errorMsg)required=true;options.showArrow=false;break;case"ajax":errorMsg=methods._ajax(field,rules,i,options);if(errorMsg){promptType="load";}break;case"minSize":errorMsg=methods._getErrorMessage(form,field,rules[i],rules,i,options,methods._minSize);break;case"maxSize":errorMsg=methods._getErrorMessage(form,field,rules[i],rules,i,options,methods._maxSize);break;case"min":errorMsg=methods._getErrorMessage(form,field,rules[i],rules,i,options,methods._min);break;case"max":errorMsg=methods._getErrorMessage(form,field,rules[i],rules,i,options,methods._max);break;case"past":errorMsg=methods._getErrorMessage(form,field,rules[i],rules,i,options,methods._past);break;case"future":errorMsg=methods._getErrorMessage(form,field,rules[i],rules,i,options,methods._future);break;case"dateRange":varclassGroup="["+options.validateAttribute+"*="+rules[i+1]+"]";options.firstOfGroup=form.find(classGroup).eq(0);options.secondOfGroup=form.find(classGroup).eq(1);if(options.firstOfGroup[0].value||options.secondOfGroup[0].value){errorMsg=methods._getErrorMessage(form,field,rules[i],rules,i,options,methods._dateRange);}if(errorMsg)required=true;options.showArrow=false;break;case"dateTimeRange":varclassGroup="["+options.validateAttribute+"*="+rules[i+1]+"]";options.firstOfGroup=form.find(classGroup).eq(0);options.secondOfGroup=form.find(classGroup).eq(1);if(options.firstOfGroup[0].value||options.secondOfGroup[0].value){errorMsg=methods._getErrorMessage(form,field,rules[i],rules,i,options,methods._dateTimeRange);}if(errorMsg)required=true;options.showArrow=false;break;case"maxCheckbox":field=$(form.find("input[name='"+fieldName+"']"));errorMsg=methods._getErrorMessage(form,field,rules[i],rules,i,options,methods._maxCheckbox);break;case"minCheckbox":field=$(form.find("input[name='"+fieldName+"']"));errorMsg=methods._getErrorMessage(form,field,rules[i],rules,i,options,methods._minCheckbox);break;case"equals":errorMsg=methods._getErrorMessage(form,field,rules[i],rules,i,options,methods._equals);break;case"funcCall":errorMsg=methods._getErrorMessage(form,field,rules[i],rules,i,options,methods._funcCall);break;case"creditCard":errorMsg=methods._getErrorMessage(form,field,rules[i],rules,i,options,methods._creditCard);break;case"condRequired":errorMsg=methods._getErrorMessage(form,field,rules[i],rules,i,options,methods._condRequired);if(errorMsg!==undefined){required=true;}break;case"funcCallRequired":errorMsg=methods._getErrorMessage(form,field,rules[i],rules,i,options,methods._funcCallRequired);if(errorMsg!==undefined){required=true;}break;default:}varend_validation=false;if(typeoferrorMsg=="object"){switch(errorMsg.status){case"_break":end_validation=true;break;case"_error":errorMsg=errorMsg.message;break;case"_error_no_prompt":returntrue;break;default:break;}}if(i==0&&str.indexOf('funcCallRequired')==0&&errorMsg!==undefined){promptText+=errorMsg+"<br/>";options.isError=true;field_errors++;end_validation=true;}if(end_validation){break;}if(typeoferrorMsg=='string'){promptText+=errorMsg+"<br/>";options.isError=true;field_errors++;}}if(!required&&!(field.val())&&field.val().length<1&&$.inArray('equals',rules)<0)options.isError=false;varfieldType=field.prop("type");varpositionType=field.data("promptPosition")||options.promptPosition;if((fieldType=="radio"||fieldType=="checkbox")&&form.find("input[name='"+fieldName+"']").size()>1){if(positionType==='inline'){field=$(form.find("input[name='"+fieldName+"'][type!=hidden]:last"));}else{field=$(form.find("input[name='"+fieldName+"'][type!=hidden]:first"));}options.showArrow=options.showArrowOnRadioAndCheckbox;}if(field.is(":hidden")&&options.prettySelect){field=form.find("#"+options.usePrefix+methods._jqSelector(field.attr('id'))+options.useSuffix);}if(options.isError&&options.showPrompts){methods._showPrompt(field,promptText,promptType,false,options);}else{if(!isAjaxValidator)methods._closePrompt(field);}if(!isAjaxValidator){field.trigger("jqv.field.result",[field,options.isError,promptText]);}varerrindex=$.inArray(field[0],options.InvalidFields);if(errindex==-1){if(options.isError)options.InvalidFields.push(field[0]);}elseif(!options.isError){options.InvalidFields.splice(errindex,1);}methods._handleStatusCssClasses(field,options);if(options.isError&&options.onFieldFailure)options.onFieldFailure(field);if(!options.isError&&options.onFieldSuccess)options.onFieldSuccess(field);returnoptions.isError;},_handleStatusCssClasses:function(field,options){/*removeallclasses*/if(options.addSuccessCssClassToField)field.removeClass(options.addSuccessCssClassToField);if(options.addFailureCssClassToField)field.removeClass(options.addFailureCssClassToField);/*Addclasses*/if(options.addSuccessCssClassToField&&!options.isError)field.addClass(options.addSuccessCssClassToField);if(options.addFailureCssClassToField&&options.isError)field.addClass(options.addFailureCssClassToField);},_getErrorMessage:function(form,field,rule,rules,i,options,originalValidationMethod){varrule_index=jQuery.inArray(rule,rules);if(rule==="custom"||rule==="funcCall"||rule==="funcCallRequired"){varcustom_validation_type=rules[rule_index+1];rule=rule+"["+custom_validation_type+"]";delete(rules[rule_index]);}varalteredRule=rule;varelement_classes=(field.attr("data-validation-engine"))?field.attr("data-validation-engine"):field.attr("class");varelement_classes_array=element_classes.split("");varerrorMsg;if(rule=="future"||rule=="past"||rule=="maxCheckbox"||rule=="minCheckbox"){errorMsg=originalValidationMethod(form,field,rules,i,options);}else{errorMsg=originalValidationMethod(field,rules,i,options);}if(errorMsg!=undefined){varcustom_message=methods._getCustomErrorMessage($(field),element_classes_array,alteredRule,options);if(custom_message)errorMsg=custom_message;}returnerrorMsg;},_getCustomErrorMessage:function(field,classes,rule,options){varcustom_message=false;varvalidityProp=/^custom\[.*\]$/.test(rule)?methods._validityProp["custom"]:methods._validityProp[rule];if(validityProp!=undefined){custom_message=field.attr("data-errormessage-"+validityProp);if(custom_message!=undefined)returncustom_message;}custom_message=field.attr("data-errormessage");if(custom_message!=undefined)returncustom_message;varid='#'+field.attr("id");if(typeofoptions.custom_error_messages[id]!="undefined"&&typeofoptions.custom_error_messages[id][rule]!="undefined"){custom_message=options.custom_error_messages[id][rule]['message'];}elseif(classes.length>0){for(vari=0;i<classes.length&&classes.length>0;i++){varelement_class="."+classes[i];if(typeofoptions.custom_error_messages[element_class]!="undefined"&&typeofoptions.custom_error_messages[element_class][rule]!="undefined"){custom_message=options.custom_error_messages[element_class][rule]['message'];break;}}}if(!custom_message&&typeofoptions.custom_error_messages[rule]!="undefined"&&typeofoptions.custom_error_messages[rule]['message']!="undefined"){custom_message=options.custom_error_messages[rule]['message'];}returncustom_message;},_validityProp:{"required":"value-missing","custom":"custom-error","groupRequired":"value-missing","ajax":"custom-error","minSize":"range-underflow","maxSize":"range-overflow","min":"range-underflow","max":"range-overflow","past":"type-mismatch","future":"type-mismatch","dateRange":"type-mismatch","dateTimeRange":"type-mismatch","maxCheckbox":"range-overflow","minCheckbox":"range-underflow","equals":"pattern-mismatch","funcCall":"custom-error","funcCallRequired":"custom-error","creditCard":"pattern-mismatch","condRequired":"value-missing"},_required:function(field,rules,i,options,condRequired){switch(field.prop("type")){case"radio":case"checkbox":if(condRequired){if(!field.prop('checked')){returnoptions.allrules[rules[i]].alertTextCheckboxMultiple;}break;}varform=field.closest("form,.validationEngineContainer");varname=field.attr("name");if(form.find("input[name='"+name+"']:checked").size()==0){if(form.find("input[name='"+name+"']:visible").size()==1)returnoptions.allrules[rules[i]].alertTextCheckboxe;elsereturnoptions.allrules[rules[i]].alertTextCheckboxMultiple;}break;case"text":case"password":case"textarea":case"file":case"select-one":case"select-multiple":default:varfield_val=$.trim(field.val());vardv_placeholder=$.trim(field.attr("data-validation-placeholder"));varplaceholder=$.trim(field.attr("placeholder"));if((!field_val)||(dv_placeholder&&field_val==dv_placeholder)||(placeholder&&field_val==placeholder)){returnoptions.allrules[rules[i]].alertText;}break;}},_groupRequired:function(field,rules,i,options){varclassGroup="["+options.validateAttribute+"*="+rules[i+1]+"]";varisValid=false;field.closest("form,.validationEngineContainer").find(classGroup).each(function(){if(!methods._required($(this),rules,i,options)){isValid=true;returnfalse;}});if(!isValid){returnoptions.allrules[rules[i]].alertText;}},_custom:function(field,rules,i,options){varcustomRule=rules[i+1];varrule=options.allrules[customRule];varfn;if(!rule){alert("jqv:customrulenotfound-"+customRule);return;}if(rule["regex"]){varex=rule.regex;if(!ex){alert("jqv:customregexnotfound-"+customRule);return;}varpattern=newRegExp(ex);if(!pattern.test(field.val()))returnoptions.allrules[customRule].alertText;}elseif(rule["func"]){fn=rule["func"];if(typeof(fn)!=="function"){alert("jqv:customparameter'function'isnofunction-"+customRule);return;}if(!fn(field,rules,i,options))returnoptions.allrules[customRule].alertText;}else{alert("jqv:customtypenotallowed"+customRule);return;}},_funcCall:function(field,rules,i,options){varfunctionName=rules[i+1];varfn;if(functionName.indexOf('.')>-1){varnamespaces=functionName.split('.');varscope=window;while(namespaces.length){scope=scope[namespaces.shift()];}fn=scope;}elsefn=window[functionName]||options.customFunctions[functionName];if(typeof(fn)=='function')returnfn(field,rules,i,options);},_funcCallRequired:function(field,rules,i,options){returnmethods._funcCall(field,rules,i,options);},_equals:function(field,rules,i,options){varequalsField=rules[i+1];if(field.val()!=$("#"+equalsField).val())returnoptions.allrules.equals.alertText;},_maxSize:function(field,rules,i,options){varmax=rules[i+1];varlen=field.val().length;if(len>max){varrule=options.allrules.maxSize;returnrule.alertText+max+rule.alertText2;}},_minSize:function(field,rules,i,options){varmin=rules[i+1];varlen=field.val().length;if(len<min){varrule=options.allrules.minSize;returnrule.alertText+min+rule.alertText2;}},_min:function(field,rules,i,options){varmin=parseFloat(rules[i+1]);varlen=parseFloat(field.val());if(len<min){varrule=options.allrules.min;if(rule.alertText2)returnrule.alertText+min+rule.alertText2;returnrule.alertText+min;}},_max:function(field,rules,i,options){varmax=parseFloat(rules[i+1]);varlen=parseFloat(field.val());if(len>max){varrule=options.allrules.max;if(rule.alertText2)returnrule.alertText+max+rule.alertText2;returnrule.alertText+max;}},_past:function(form,field,rules,i,options){varp=rules[i+1];varfieldAlt=$(form.find("*[name='"+p.replace(/^#+/,'')+"']"));varpdate;if(p.toLowerCase()=="now"){pdate=newDate();}elseif(undefined!=fieldAlt.val()){if(fieldAlt.is(":disabled"))return;pdate=methods._parseDate(fieldAlt.val());}else{pdate=methods._parseDate(p);}varvdate=methods._parseDate(field.val());if(vdate>pdate){varrule=options.allrules.past;if(rule.alertText2)returnrule.alertText+methods._dateToString(pdate)+rule.alertText2;returnrule.alertText+methods._dateToString(pdate);}},_future:function(form,field,rules,i,options){varp=rules[i+1];varfieldAlt=$(form.find("*[name='"+p.replace(/^#+/,'')+"']"));varpdate;if(p.toLowerCase()=="now"){pdate=newDate();}elseif(undefined!=fieldAlt.val()){if(fieldAlt.is(":disabled"))return;pdate=methods._parseDate(fieldAlt.val());}else{pdate=methods._parseDate(p);}varvdate=methods._parseDate(field.val());if(vdate<pdate){varrule=options.allrules.future;if(rule.alertText2)returnrule.alertText+methods._dateToString(pdate)+rule.alertText2;returnrule.alertText+methods._dateToString(pdate);}},_isDate:function(value){vardateRegEx=newRegExp(/^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$|^(?:(?:(?:0?[13578]|1[02])(\/|-)31)|(?:(?:0?[1,3-9]|1[0-2])(\/|-)(?:29|30)))(\/|-)(?:[1-9]\d\d\d|\d[1-9]\d\d|\d\d[1-9]\d|\d\d\d[1-9])$|^(?:(?:0?[1-9]|1[0-2])(\/|-)(?:0?[1-9]|1\d|2[0-8]))(\/|-)(?:[1-9]\d\d\d|\d[1-9]\d\d|\d\d[1-9]\d|\d\d\d[1-9])$|^(0?2(\/|-)29)(\/|-)(?:(?:0[48]00|[13579][26]00|[2468][048]00)|(?:\d\d)?(?:0[48]|[2468][048]|[13579][26]))$/);returndateRegEx.test(value);},_isDateTime:function(value){vardateTimeRegEx=newRegExp(/^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])\s+(1[012]|0?[1-9]){1}:(0?[1-5]|[0-6][0-9]){1}:(0?[0-6]|[0-6][0-9]){1}\s+(am|pm|AM|PM){1}$|^(?:(?:(?:0?[13578]|1[02])(\/|-)31)|(?:(?:0?[1,3-9]|1[0-2])(\/|-)(?:29|30)))(\/|-)(?:[1-9]\d\d\d|\d[1-9]\d\d|\d\d[1-9]\d|\d\d\d[1-9])$|^((1[012]|0?[1-9]){1}\/(0?[1-9]|[12][0-9]|3[01]){1}\/\d{2,4}\s+(1[012]|0?[1-9]){1}:(0?[1-5]|[0-6][0-9]){1}:(0?[0-6]|[0-6][0-9]){1}\s+(am|pm|AM|PM){1})$/);returndateTimeRegEx.test(value);},_dateCompare:function(start,end){return(newDate(start.toString())<newDate(end.toString()));},_dateRange:function(field,rules,i,options){if((!options.firstOfGroup[0].value&&options.secondOfGroup[0].value)||(options.firstOfGroup[0].value&&!options.secondOfGroup[0].value)){returnoptions.allrules[rules[i]].alertText+options.allrules[rules[i]].alertText2;}if(!methods._isDate(options.firstOfGroup[0].value)||!methods._isDate(options.secondOfGroup[0].value)){returnoptions.allrules[rules[i]].alertText+options.allrules[rules[i]].alertText2;}if(!methods._dateCompare(options.firstOfGroup[0].value,options.secondOfGroup[0].value)){returnoptions.allrules[rules[i]].alertText+options.allrules[rules[i]].alertText2;}},_dateTimeRange:function(field,rules,i,options){if((!options.firstOfGroup[0].value&&options.secondOfGroup[0].value)||(options.firstOfGroup[0].value&&!options.secondOfGroup[0].value)){returnoptions.allrules[rules[i]].alertText+options.allrules[rules[i]].alertText2;}if(!methods._isDateTime(options.firstOfGroup[0].value)||!methods._isDateTime(options.secondOfGroup[0].value)){returnoptions.allrules[rules[i]].alertText+options.allrules[rules[i]].alertText2;}if(!methods._dateCompare(options.firstOfGroup[0].value,options.secondOfGroup[0].value)){returnoptions.allrules[rules[i]].alertText+options.allrules[rules[i]].alertText2;}},_maxCheckbox:function(form,field,rules,i,options){varnbCheck=rules[i+1];vargroupname=field.attr("name");vargroupSize=form.find("input[name='"+groupname+"']:checked").size();if(groupSize>nbCheck){options.showArrow=false;if(options.allrules.maxCheckbox.alertText2)returnoptions.allrules.maxCheckbox.alertText+""+nbCheck+""+options.allrules.maxCheckbox.alertText2;returnoptions.allrules.maxCheckbox.alertText;}},_minCheckbox:function(form,field,rules,i,options){varnbCheck=rules[i+1];vargroupname=field.attr("name");vargroupSize=form.find("input[name='"+groupname+"']:checked").size();if(groupSize<nbCheck){options.showArrow=false;returnoptions.allrules.minCheckbox.alertText+""+nbCheck+""+options.allrules.minCheckbox.alertText2;}},_creditCard:function(field,rules,i,options){varvalid=false,cardNumber=field.val().replace(/+/g,'').replace(/-+/g,'');varnumDigits=cardNumber.length;if(numDigits>=14&&numDigits<=16&&parseInt(cardNumber)>0){varsum=0,i=numDigits-1,pos=1,digit,luhn=newString();do{digit=parseInt(cardNumber.charAt(i));luhn+=(pos++%2==0)?digit*2:digit;}while(--i>=0)for(i=0;i<luhn.length;i++){sum+=parseInt(luhn.charAt(i));}valid=sum%10==0;}if(!valid)returnoptions.allrules.creditCard.alertText;},_ajax:function(field,rules,i,options){varerrorSelector=rules[i+1];varrule=options.allrules[errorSelector];varextraData=rule.extraData;varextraDataDynamic=rule.extraDataDynamic;vardata={"fieldId":field.attr("id"),"fieldValue":field.val()};if(typeofextraData==="object"){$.extend(data,extraData);}elseif(typeofextraData==="string"){vartempData=extraData.split("&");for(vari=0;i<tempData.length;i++){varvalues=tempData[i].split("=");if(values[0]&&values[0]){data[values[0]]=values[1];}}}if(extraDataDynamic){vartmpData=[];vardomIds=String(extraDataDynamic).split(",");for(vari=0;i<domIds.length;i++){varid=domIds[i];if($(id).length){varinputValue=field.closest("form,.validationEngineContainer").find(id).val();varkeyValue=id.replace('#','')+'='+escape(inputValue);data[id.replace('#','')]=inputValue;}}}if(options.eventTrigger=="field"){delete(options.ajaxValidCache[field.attr("id")]);}if(!options.isError&&!methods._checkAjaxFieldStatus(field.attr("id"),options)){$.ajax({type:options.ajaxFormValidationMethod,url:rule.url,cache:false,dataType:"json",data:data,field:field,rule:rule,methods:methods,options:options,beforeSend:function(){},error:function(data,transport){if(options.onFailure){options.onFailure(data,transport);}else{methods._ajaxError(data,transport);}},success:function(json){varerrorFieldId=json[0];varerrorField=$("#"+errorFieldId).eq(0);if(errorField.length==1){varstatus=json[1];varmsg=json[2];if(!status){options.ajaxValidCache[errorFieldId]=false;options.isError=true;if(msg){if(options.allrules[msg]){vartxt=options.allrules[msg].alertText;if(txt){msg=txt;}}}elsemsg=rule.alertText;if(options.showPrompts)methods._showPrompt(errorField,msg,"",true,options);}else{options.ajaxValidCache[errorFieldId]=true;if(msg){if(options.allrules[msg]){vartxt=options.allrules[msg].alertTextOk;if(txt){msg=txt;}}}elsemsg=rule.alertTextOk;if(options.showPrompts){if(msg)methods._showPrompt(errorField,msg,"pass",true,options);elsemethods._closePrompt(errorField);}if(options.eventTrigger=="submit")field.closest("form").submit();}}errorField.trigger("jqv.field.result",[errorField,options.isError,msg]);}});returnrule.alertTextLoad;}},_ajaxError:function(data,transport){if(data.status==0&&transport==null)alert("Thepageisnotservedfromaserver!ajaxcallfailed");elseif(typeofconsole!="undefined")console.log("Ajaxerror:"+data.status+""+transport);},_dateToString:function(date){returndate.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate();},_parseDate:function(d){vardateParts=d.split("-");if(dateParts==d)dateParts=d.split("/");if(dateParts==d){dateParts=d.split(".");returnnewDate(dateParts[2],(dateParts[1]-1),dateParts[0]);}returnnewDate(dateParts[0],(dateParts[1]-1),dateParts[2]);},_showPrompt:function(field,promptText,type,ajaxed,options,ajaxform){if(field.data('jqv-prompt-at')instanceofjQuery){field=field.data('jqv-prompt-at');}elseif(field.data('jqv-prompt-at')){field=$(field.data('jqv-prompt-at'));}varprompt=methods._getPrompt(field);if(ajaxform)prompt=false;if($.trim(promptText)){if(prompt)methods._updatePrompt(field,prompt,promptText,type,ajaxed,options);elsemethods._buildPrompt(field,promptText,type,ajaxed,options);}},_buildPrompt:function(field,promptText,type,ajaxed,options){varprompt=$('<div>');prompt.addClass(methods._getClassName(field.attr("id"))+"formError");prompt.addClass("parentForm"+methods._getClassName(field.closest('form,.validationEngineContainer').attr("id")));prompt.addClass("formError");switch(type){case"pass":prompt.addClass("greenPopup");break;case"load":prompt.addClass("blackPopup");break;default:}if(ajaxed)prompt.addClass("ajaxed");varpromptContent=$('<div>').addClass("formErrorContent").html(promptText).appendTo(prompt);varpositionType=field.data("promptPosition")||options.promptPosition;if(options.showArrow){vararrow=$('<div>').addClass("formErrorArrow");if(typeof(positionType)=='string'){varpos=positionType.indexOf(":");if(pos!=-1)positionType=positionType.substring(0,pos);}switch(positionType){case"bottomLeft":case"bottomRight":prompt.find(".formErrorContent").before(arrow);arrow.addClass("formErrorArrowBottom").html('<divclass="line1"><!----></div><divclass="line2"><!----></div><divclass="line3"><!----></div><divclass="line4"><!----></div><divclass="line5"><!----></div><divclass="line6"><!----></div><divclass="line7"><!----></div><divclass="line8"><!----></div><divclass="line9"><!----></div><divclass="line10"><!----></div>');break;case"topLeft":case"topRight":arrow.html('<divclass="line10"><!----></div><divclass="line9"><!----></div><divclass="line8"><!----></div><divclass="line7"><!----></div><divclass="line6"><!----></div><divclass="line5"><!----></div><divclass="line4"><!----></div><divclass="line3"><!----></div><divclass="line2"><!----></div><divclass="line1"><!----></div>');prompt.append(arrow);break;}}if(options.addPromptClass)prompt.addClass(options.addPromptClass);varrequiredOverride=field.attr('data-required-class');if(requiredOverride!==undefined){prompt.addClass(requiredOverride);}else{if(options.prettySelect){if($('#'+field.attr('id')).next().is('select')){varprettyOverrideClass=$('#'+field.attr('id').substr(options.usePrefix.length).substring(options.useSuffix.length)).attr('data-required-class');if(prettyOverrideClass!==undefined){prompt.addClass(prettyOverrideClass);}}}}prompt.css({"opacity":0});if(positionType==='inline'){prompt.addClass("inline");if(typeoffield.attr('data-prompt-target')!=='undefined'&&$('#'+field.attr('data-prompt-target')).length>0){prompt.appendTo($('#'+field.attr('data-prompt-target')));}else{field.after(prompt);}}else{field.before(prompt);}varpos=methods._calculatePosition(field,prompt,options);prompt.css({'position':positionType==='inline'?'relative':'absolute',"top":pos.callerTopPosition,"left":pos.callerleftPosition,"marginTop":pos.marginTopSize,"opacity":0}).data("callerField",field);if(options.autoHidePrompt){setTimeout(function(){prompt.animate({"opacity":0},function(){prompt.closest('.formErrorOuter').remove();});},options.autoHideDelay);}returnprompt.animate({"opacity":0.87});},_updatePrompt:function(field,prompt,promptText,type,ajaxed,options,noAnimation){if(prompt){if(typeoftype!=="undefined"){if(type=="pass")prompt.addClass("greenPopup");elseprompt.removeClass("greenPopup");if(type=="load")prompt.addClass("blackPopup");elseprompt.removeClass("blackPopup");}if(ajaxed)prompt.addClass("ajaxed");elseprompt.removeClass("ajaxed");prompt.find(".formErrorContent").html(promptText);varpos=methods._calculatePosition(field,prompt,options);varcss={"top":pos.callerTopPosition,"left":pos.callerleftPosition,"marginTop":pos.marginTopSize};if(noAnimation)prompt.css(css);elseprompt.animate(css);}},_closePrompt:function(field){varprompt=methods._getPrompt(field);if(prompt)prompt.fadeTo("fast",0,function(){prompt.closest('.formErrorOuter').remove();});},closePrompt:function(field){returnmethods._closePrompt(field);},_getPrompt:function(field){varformId=$(field).closest('form,.validationEngineContainer').attr('id');varclassName=methods._getClassName(field.attr("id"))+"formError";varmatch=$("."+methods._escapeExpression(className)+'.parentForm'+methods._getClassName(formId))[0];if(match)return$(match);},_escapeExpression:function(selector){returnselector.replace(/([#;&,\.\+\*\~':"\!\^$\[\]\(\)=>\|])/g,"\\$1");},isRTL:function(field){var$document=$(document);var$body=$('body');varrtl=(field&&field.hasClass('rtl'))||(field&&(field.attr('dir')||'').toLowerCase()==='rtl')||$document.hasClass('rtl')||($document.attr('dir')||'').toLowerCase()==='rtl'||$body.hasClass('rtl')||($body.attr('dir')||'').toLowerCase()==='rtl';returnBoolean(rtl);},_calculatePosition:function(field,promptElmt,options){varpromptTopPosition,promptleftPosition,marginTopSize;varfieldWidth=field.width();varfieldLeft=field.position().left;varfieldTop=field.position().top;varfieldHeight=field.height();varpromptHeight=promptElmt.height();promptTopPosition=promptleftPosition=0;marginTopSize=-promptHeight;varpositionType=field.data("promptPosition")||options.promptPosition;varshift1="";varshift2="";varshiftX=0;varshiftY=0;if(typeof(positionType)=='string'){if(positionType.indexOf(":")!=-1){shift1=positionType.substring(positionType.indexOf(":")+1);positionType=positionType.substring(0,positionType.indexOf(":"));if(shift1.indexOf(",")!=-1){shift2=shift1.substring(shift1.indexOf(",")+1);shift1=shift1.substring(0,shift1.indexOf(","));shiftY=parseInt(shift2);if(isNaN(shiftY))shiftY=0;};shiftX=parseInt(shift1);if(isNaN(shift1))shift1=0;};};switch(positionType){default:case"topRight":promptleftPosition+=fieldLeft+fieldWidth-27;promptTopPosition+=fieldTop;break;case"topLeft":promptTopPosition+=fieldTop;promptleftPosition+=fieldLeft;break;case"centerRight":promptTopPosition=fieldTop+4;marginTopSize=0;promptleftPosition=fieldLeft+field.outerWidth(true)+5;break;case"centerLeft":promptleftPosition=fieldLeft-(promptElmt.width()+2);promptTopPosition=fieldTop+4;marginTopSize=0;break;case"bottomLeft":promptTopPosition=fieldTop+field.height()+5;marginTopSize=0;promptleftPosition=fieldLeft;break;case"bottomRight":promptleftPosition=fieldLeft+fieldWidth-27;promptTopPosition=fieldTop+field.height()+5;marginTopSize=0;break;case"inline":promptleftPosition=0;promptTopPosition=0;marginTopSize=0;};promptleftPosition+=shiftX;promptTopPosition+=shiftY;return{"callerTopPosition":promptTopPosition+"px","callerleftPosition":promptleftPosition+"px","marginTopSize":marginTopSize+"px"};},_saveOptions:function(form,options){if($.validationEngineLanguage)varallRules=$.validationEngineLanguage.allRules;else$.error("jQuery.validationEnginerulesarenotloaded,plzaddlocalizationfilestothepage");$.validationEngine.defaults.allrules=allRules;varuserOptions=$.extend(true,{},$.validationEngine.defaults,options);form.data('jqv',userOptions);returnuserOptions;},_getClassName:function(className){if(className)returnclassName.replace(/:/g,"_").replace(/\./g,"_");},_jqSelector:function(str){returnstr.replace(/([;&,\.\+\*\~':"\!\^#$%@\[\]\(\)=>\|])/g,'\\$1');},_condRequired:function(field,rules,i,options){varidx,dependingField;for(idx=(i+1);idx<rules.length;idx++){dependingField=jQuery("#"+rules[idx]).first();if(dependingField.length&&methods._required(dependingField,["required"],0,options,true)==undefined){returnmethods._required(field,["required"],0,options);}}},_submitButtonClick:function(event){varbutton=$(this);varform=button.closest('form,.validationEngineContainer');form.data("jqv_submitButton",button.attr("id"));}};$.fn.validationEngine=function(method){varform=$(this);if(!form[0])returnform;if(typeof(method)=='string'&&method.charAt(0)!='_'&&methods[method]){if(method!="showPrompt"&&method!="hide"&&method!="hideAll")methods.init.apply(form);returnmethods[method].apply(form,Array.prototype.slice.call(arguments,1));}elseif(typeofmethod=='object'||!method){methods.init.apply(form,arguments);returnmethods.attach.apply(form);}else{$.error('Method'+method+'doesnotexistinjQuery.validationEngine');}};$.validationEngine={fieldIdCounter:0,defaults:{validationEventTrigger:"blur",scroll:true,focusFirstField:true,showPrompts:true,validateNonVisibleFields:false,ignoreFieldsWithClass:'ignoreMe',promptPosition:"topRight",bindMethod:"bind",inlineAjax:false,ajaxFormValidation:false,ajaxFormValidationURL:false,ajaxFormValidationMethod:'get',onAjaxFormComplete:$.noop,onBeforeAjaxFormValidation:$.noop,onValidationComplete:false,doNotShowAllErrosOnSubmit:false,custom_error_messages:{},binded:true,showArrow:true,showArrowOnRadioAndCheckbox:false,isError:false,maxErrorsPerField:false,ajaxValidCache:{},autoPositionUpdate:false,InvalidFields:[],onFieldSuccess:false,onFieldFailure:false,onSuccess:false,onFailure:false,validateAttribute:"class",addSuccessCssClassToField:"",addFailureCssClassToField:"",autoHidePrompt:false,autoHideDelay:10000,fadeDuration:0.3,prettySelect:false,addPromptClass:"",usePrefix:"",useSuffix:"",showOneMessage:false}};$(function(){$.validationEngine.defaults.promptPosition=methods.isRTL()?'topLeft':"topRight"});})(jQuery);