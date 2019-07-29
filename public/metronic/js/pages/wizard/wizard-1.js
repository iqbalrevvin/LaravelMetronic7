"use strict";

// Class definition
var KTWizard1 = function () {
	// Base elements
	var wizardEl;
	var formEl;
	var validator;
	var wizard;
	
	// Private functions
	var initWizard = function () {
		// Initialize form wizard
		wizard = new KTWizard('kt_wizard_v1', {
			startStep: 1
		});

		// Validation before going to next page
		wizard.on('beforeNext', function(wizardObj) {
			if (validator.form() !== true) {
				wizardObj.stop();  // don't go to the next step
			}
		})

		// Change event
		wizard.on('change', function(wizard) {
			setTimeout(function() {
				KTUtil.scrollTop();	
			}, 500);
		});
	}	



	return {
		// public functions
		init: function() {
			wizardEl = KTUtil.get('kt_wizard_v1');
			formEl = $('#kt_form');
			initWizard(); 

		}
	};
}();

jQuery(document).ready(function() {	
	KTWizard1.init();
});