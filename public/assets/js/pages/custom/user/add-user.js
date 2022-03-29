"use strict";

// Class Definition
var KTAddUser = function () {
	// Private Variables
	var _wizardEl;
	var _formEl;
	var _wizardObj;
	var _avatar;
	var _validations = [];

	// Private Functions
	var _initWizard = function () {
		// Initialize form wizard
		_wizardObj = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: false  // allow step clicking
		});

		// Validation before going to next page
		_wizardObj.on('change', function (wizard) {
			if (wizard.getStep() > wizard.getNewStep()) {
				return; // Skip if stepped back
			}

			// Validate form before change wizard step
			var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						wizard.goTo(wizard.getNewStep());

						KTUtil.scrollTop();
					} else {
						Swal.fire({
							text: "Disculpas, parece que hay algunos errores, intenta nuevamente, por favor.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, entendido!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-light"
							}
						}).then(function () {
							KTUtil.scrollTop();
						});
					}
				});
			}

			return false;  // Do not change wizard step, further action will be handled by he validator
		});

		// Change event
		_wizardObj.on('changed', function (wizard) {
			KTUtil.scrollTop();
		});

		// Submit event
		_wizardObj.on('submit', function (wizard) {
			Swal.fire({
				text: "Correcto! Confirmá el envío de información.",
				icon: "success",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Ok, enviar!",
				cancelButtonText: "No, cancelar",
				customClass: {
					confirmButton: "btn font-weight-bold btn-primary",
					cancelButton: "btn font-weight-bold btn-default"
				}
			}).then(function (result) {
				if (result.value) {
					_formEl.submit(); // Submit form
				} else if (result.dismiss === 'cancel') {
					Swal.fire({
						text: "La información no se cargó! Recordá enviar el formulario.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok!",
						customClass: {
							confirmButton: "btn font-weight-bold btn-primary",
						}
					});
				}
			});
		});
	}

	var _initValidations = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/

		// Validation Rules For Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					firstName: {
						validators: {
							notEmpty: {
								message: 'Este campo es requerido'
							},
							regexp: {
								//regexp: /^[a-zA-Z\s]+$/,
								regexp: /[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ.-]+/,
								message: 'Debe contener caracteres alfabéticos',
							}
						}
					},
					middleName: {
						validators: {
							regexp: {
								regexp: /[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ.-]+/,
								message: 'Debe contener caracteres alfabéticos',
							}
						}
					},
					lastName: {
						validators: {
							notEmpty: {
								message: 'Este campo es requerido'
							},
							regexp: {
								regexp: /[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ.-]+/,
								message: 'Debe contener caracteres alfabéticos',
							}
						}
					},
					nickName: {
						validators: {
							regexp: {
								regexp: /[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ.-]+/,
								message: 'Debe contener caracteres alfabéticos',
							}
						}
					},
					gender: {
						validators: {
							notEmpty: {
								message: 'Este campo es requerido'
							}
						}
					},
					birthday: {
						validators: {
							notEmpty: {
								message: 'Este campo es requerido'
							}
						}
					},
					governmentIdType: {
						validators: {
							notEmpty: {
								message: 'Este campo es requerido'
							}
						}
					},
					governmentId: {
						validators: {
							notEmpty: {
								message: 'Este campo es requerido'
							},
							digits: {
								message: 'Debe contener sólo números'
							},
							stringLength: {
								min: 7,
								max: 8,
								message: 'Debe contener entre 7 y 8 números'
							},
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));
		// Validation Rules For Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					username: {
						validators: {
							notEmpty: {
								message: 'Este campo es requerido'
							},
							stringLength: {
								min: 4,
								max: 20,
								message: 'Debe contener entre 4 y 20 caracteres'
							},
						}
					},
					password: {
						validators: {
							stringLength: {
								min: 8,
								message: 'Debe contener un mínimo de 8 caracteres'
							},
						}
					},
					password_confirmation: {
						validators: {
							identical: {
								compare: function () {
									return _formEl.querySelector('[name="password"]').value;
								},
								message: 'La contraseña y la confirmación no coinciden',
							},
						},
					},
					email: {
						validators: {
							notEmpty: {
								message: 'Este campo es requerido'
							},
							emailAddress: {
								message: 'No es un email válido',
							},
						}
					},
					mobile: {
						validators: {
							stringLength: {
								min: 9,
								max: 14,
								message: 'Debe contener entre 9 y 14 números'
							},
							digits: {
								message: 'Debe contener sólo números'
							}
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				},
				/* Ver documentacion
				internationalTelephoneInput: new FormValidation.plugins.InternationalTelephoneInput({
					field: 'mobile',
					message: 'The phone number is not valid',
					utilsScript: 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js',
				}),*/
			}
		));
		// Validation Rules For Step 3
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					establishment: {
						validators: {
							notEmpty: {
								message: 'Este campo es requerido'
							}
						}
					},
					degree: {
						validators: {
							notEmpty: {
								message: 'Este campo es requerido'
							}
						}
					},
					section: {
						validators: {
							notEmpty: {
								message: 'Este campo es requerido'
							}
						}
					},
					shift: {
						validators: {
							notEmpty: {
								message: 'Este campo es requerido'
							}
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));
		// Validation Rules For Step 4
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					establishment: {
						validators: {
							notEmpty: {
								message: 'Este campo es requerido'
							}
						}
					},
					degree: {
						validators: {
							notEmpty: {
								message: 'Este campo es requerido'
							}
						}
					},
					section: {
						validators: {
							notEmpty: {
								message: 'Este campo es requerido'
							}
						}
					},
					shift: {
						validators: {
							notEmpty: {
								message: 'Este campo es requerido'
							}
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));
	}

	var _initAvatar = function () {
		_avatar = new KTImageInput('kt_user_add_avatar');
	}

	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('kt_wizard');
			_formEl = KTUtil.getById('kt_form');

			_initWizard();
			_initValidations();
			//_initAvatar();

			// Revalidate the confirmation password when changing the password
			_formEl.querySelector('[name="password"]').addEventListener('input', function () {
				fv.revalidateField('password_confirmation');
			});
		}
	};
}();

jQuery(document).ready(function () {
	KTAddUser.init();
});