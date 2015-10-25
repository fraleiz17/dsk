(function($){
	if($.validationEngineLanguage == undefined || $.validationEngineLanguage.allRules == undefined )
		alert("Please include other-validations.js AFTER the translation file");
	else {
		$.validationEngineLanguage.allRules["postcodeUK"] = {
		        "regex": /^([A-PR-UWYZ0-9][A-HK-Y0-9][AEHMNPRTVXY0-9]?[ABEHMNPRVWXY0-9]? {1,2}[0-9][ABD-HJLN-UW-Z]{2}|GIR 0AA)$/,
				"alertText": "* Invalid postcode"
		};
		$.validationEngineLanguage.allRules["postcodeUS"] = {
                "regex": /^\d{5}(-\d{4})?$/,
                "alertText": "* Invalid zipcode"
		};
		$.validationEngineLanguage.allRules["postcodeDE"] = {
                "regex": /^\d{5}?$/,
                "alertText": "* Invalid zipcode"
		};
		$.validationEngineLanguage.allRules["postcodeAT"] = {
                "regex": /^\d{4}?$/,
                "alertText": "* Invalid zipcode"
		};
    $.validationEngineLanguage.allRules["postcodeJP"] = {
      "regex": /^\d{3}(-\d{4})?$/,
      "alertText": "* 郵便番号が正しくありません"
    };
		$.validationEngineLanguage.allRules["onlyLetNumSpec"] = {
				"regex": /^[0-9a-zA-Z_-]+$/,
				"alertText": "* Only Letters, Numbers, hyphen(-) and underscore(_) allowed"
		};
	}
})(jQuery);
