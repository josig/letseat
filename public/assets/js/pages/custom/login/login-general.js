"use strict";

// Class Definition
var KTLogin = function() {
    var _login;

    var _showForm = function(form) {
        var cls = 'login-' + form + '-on';
        var form = 'kt_login_' + form + '_form';

        _login.removeClass('login-forgot-on');
        _login.removeClass('login-signin-on');
        _login.removeClass('login-signup-on');

        _login.addClass(cls);

        KTUtil.animateClass(KTUtil.getById(form), 'animate__animated animate__backInUp');
    }

    var _handleSignInForm = function() {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			KTUtil.getById('kt_login_signin_form'),
			{
				fields: {
					username: {
						validators: {
							notEmpty: {
								message: 'Este campo es requerido'
							},
						}
					},
					password: {
						validators: {
							notEmpty: {
								message: 'Campo clave requerido'
							}
						}
					}
				},
				plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        $('#kt_login_signin_submit').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
		        if (status == 'Valid') {
                    /*swal.fire({
		                text: "Todo bien! Podés enviar el formulario.",
		                icon: "success",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, entendido!",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            }).then(function() {
						KTUtil.scrollTop();
					});*/
				} else {
					swal.fire({
		                text: "Disculpa, parece que hay algunos errores, intenta nuevamente.",
		                icon: "error",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, entendido!",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            }).then(function() {
						KTUtil.scrollTop();
					});
				}
		    });
        });

        // Handle forgot button
        $('#kt_login_forgot').on('click', function (e) {
            e.preventDefault();
            _showForm('forgot');
        });

        // Handle signup
        $('#kt_login_signup').on('click', function (e) {
            e.preventDefault();
            _showForm('signup');
        });
    }

    var _handleSignUpForm = function(e) {
        var validation;
        var form = KTUtil.getById('kt_login_signup_form');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			form,
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
					},
					gender: {
						validators: {
							notEmpty: {
								message: 'Este campo es requerido'
							}
						}
					},
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
					email: {
                        validators: {
							notEmpty: {
								message: 'Este campo es requerido'
							},
                            emailAddress: {
								message: 'No es un email válido'
							}
						}
					},
					mobile: {
						validators: {
							notEmpty: {
								message: 'Este campo es requerido'
							},
							digits: {
								message: 'Debe contener sólo números'
							},
							stringLength: {
								min: 9,
								max: 14,
								message: 'Debe contener entre 9 y 14 números'
							}
						}
					},
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'Este campo es requerido'
                            },
							stringLength: {
								min: 8,
								message: 'Debe contener un mínimo de 8 caracteres'
							},
                        }
                    },
                    password_confirmation: {
                        validators: {
                            notEmpty: {
                                message: 'Este campo es requerido'
                            },
                            identical: {
                                compare: function() {
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: 'La contraseña y la confirmación no coinciden'
                            }
                        }
                    },
                    agree: {
                        validators: {
                            notEmpty: {
                                message: 'Debes aceptar los términos y condiciones'
                            }
                        }
                    },
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap(),

                    submitButton: new FormValidation.plugins.SubmitButton(),
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit() // Uncomment this line to enable normal button submit after form validation
				}
			}
		);

        $('#kt_login_signup_submit').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
		        if (status == 'Valid') {
                    /*swal.fire({
		                text: "All is cool! Now you submit this form",
		                icon: "success",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, got it!",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            }).then(function() {
						KTUtil.scrollTop();
					});*/
				} else {
					swal.fire({
		                text: "Disculpa, parece que hay algunos errores, intenta nuevamente.",
		                icon: "error",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, entendido!",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            }).then(function() {
						KTUtil.scrollTop();
					});
				}
		    });
        });

        // Handle cancel button
        $('#kt_login_signup_cancel').on('click', function (e) {
            e.preventDefault();

            _showForm('signin');
        });
    }

    var _handleForgotForm = function(e) {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			KTUtil.getById('kt_login_forgot_form'),
			{
				fields: {
					email: {
						validators: {
							notEmpty: {
								message: 'Este campo es requerido'
							},
                            emailAddress: {
								message: 'No es un email válido'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        // Handle submit button
        $('#kt_login_forgot_submit').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
		        if (status == 'Valid') {
                    // Submit form
                    KTUtil.scrollTop();
				} else {
					swal.fire({
		                text: "Disculpa, parece que hay algunos errores, intenta nuevamente.",
		                icon: "error",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, entendido!",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            }).then(function() {
						KTUtil.scrollTop();
					});
				}
		    });
        });

        // Handle cancel button
        $('#kt_login_forgot_cancel').on('click', function (e) {
            e.preventDefault();

            _showForm('signin');
        });
    }

    // Public Functions
    return {
        // public functions
        init: function() {
            _login = $('#kt_login');

            _handleSignInForm();
            _handleSignUpForm();
            _handleForgotForm();

        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();
});