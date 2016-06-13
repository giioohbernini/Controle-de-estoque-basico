$(document).ready(function() {


    if ($.isFunction($.fn.validate)) {

        $('#produto_validate').validate({
            focusInvalid: false,
            ignore: "",
            rules: {
                nome: {
                    minlength: 2,
                    required: true
                },
                descricao: {
                    required: true,
                    minlength: 2
                },
                preco: {
                    required: true
                }

            },

            messages: {
                nome: {
                    required: "Este campo é obrigatorio.",
                    minlength: "Caracteres insuficientes."
                },
                descricao: {
                    required: "Este campo é obrigatorio.",
                    minlength: "Caracteres insuficientes."
                },
                preco: {
                    required: "Este campo é obrigatorio.",
                }
            },

            invalidHandler: function(event, validator) {
                //
            },

            errorPlacement: function(label, element) { // render error placement for each input type   
                console.log(label);
                $('<p class="text-danger"></p>').insertAfter(element).append(label)
                var parent = $(element).parent().parent('.form-group');
                parent.removeClass('has-success').addClass('has-error');
            },

            highlight: function(element) { // hightlight error inputs
                var parent = $(element).parent().parent('.form-group');
                parent.removeClass('has-success').addClass('has-error');
            },

            unhighlight: function(element) { // revert the change done by hightlight

            },

            success: function(label, element) {
                var parent = $(element).parent().parent('.form-group');
                parent.removeClass('has-error').addClass('has-success');
            },

            submitHandler: function(form) {
                form.submit();
            }
        });


        $('#clientes_validate').validate({
            focusInvalid: false,
            ignore: "",
            rules: {
                nome: {
                    minlength: 2,
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                telefone: {
                    required: true,
                    minlength: 8
                }

            },

            messages: {
                nome: {
                    required: "Este campo é obrigatorio.",
                    minlength: "Caracteres insuficientes."
                },
                email: {
                    required: "Este campo é obrigatorio.",
                    email: "Digite um email válido."
                },
                telefone: {
                    required: "Este campo é obrigatorio.",
                    minlength: "Numeros insuficientes para a formação de um número."
                }
            },

            invalidHandler: function(event, validator) {
                //
            },

            errorPlacement: function(label, element) { // render error placement for each input type   
                console.log(label);
                $('<p class="text-danger"></p>').insertAfter(element).append(label)
                var parent = $(element).parent().parent('.form-group');
                parent.removeClass('has-success').addClass('has-error');
            },

            highlight: function(element) { // hightlight error inputs
                var parent = $(element).parent().parent('.form-group');
                parent.removeClass('has-success').addClass('has-error');
            },

            unhighlight: function(element) { // revert the change done by hightlight

            },

            success: function(label, element) {
                var parent = $(element).parent().parent('.form-group');
                parent.removeClass('has-error').addClass('has-success');
            },

            submitHandler: function(form) {
                form.submit();
            }
        });

        $('#pedidos_validate').validate({
            focusInvalid: false,
            ignore: "",
            rules: {
                produto: {
                    required: true
                },
                cliente: {
                    required: true
                }

            },

            messages: {
                produto: {
                    required: "Este campo é obrigatorio."
                },
                cliente: {
                    required: "Este campo é obrigatorio."
                }
            },

            invalidHandler: function(event, validator) {
                //
            },

            errorPlacement: function(label, element) { // render error placement for each input type   
                console.log(label);
                $('<p class="text-danger"></p>').insertAfter(element).append(label)
                var parent = $(element).parent().parent('.form-group');
                parent.removeClass('has-success').addClass('has-error');
            },

            highlight: function(element) { // hightlight error inputs
                var parent = $(element).parent().parent('.form-group');
                parent.removeClass('has-success').addClass('has-error');
            },

            unhighlight: function(element) { // revert the change done by hightlight

            },

            success: function(label, element) {
                var parent = $(element).parent().parent('.form-group');
                parent.removeClass('has-error').addClass('has-success');
            },

            submitHandler: function(form) {
                form.submit();
            }
        });
        $('#cdr_validate').validate({
            focusInvalid: false,
            ignore: "",
            rules: {
                formfield1: {
                    minlength: 2,
                    required: true
                },
                formfield2: {
                    required: false,
                    minlength: 2
                },
                formfield3: {
                    required: false,
                    minlength: 2
                },
                formfield4: {
                    minlength: 2,
                    required: false
                }
            },

            invalidHandler: function(event, validator) {
                //display error alert on form submit    
            },

            errorPlacement: function(label, element) { // render error placement for each input type   
                console.log(label);
                $('<span class="error"></span>').insertAfter(element).append(label)
                var parent = $(element).parent().parent('.form-group');
                parent.removeClass('has-success').addClass('has-error');
            },

            highlight: function(element) { // hightlight error inputs
                var parent = $(element).parent().parent('.form-group');
                parent.removeClass('has-success').addClass('has-error');
            },

            unhighlight: function(element) { // revert the change done by hightlight

            },

            success: function(label, element) {
                var parent = $(element).parent().parent('.form-group');
                parent.removeClass('has-error').addClass('has-success');
            },

            submitHandler: function(form) {
                form.submit();
            }
        });


        $('#icon_validate').validate({
            errorElement: 'span',
            errorClass: 'error',
            focusInvalid: false,
            ignore: "",
            rules: {
                formfield1: {
                    minlength: 2,
                    required: true
                },
                formfield2: {
                    required: true,
                    email: true
                },
                formfield3: {
                    required: true,
                    url: true
                }
            },

            invalidHandler: function(event, validator) {
                //display error alert on form submit    
            },

            errorPlacement: function(error, element) { // render error placement for each input type
                var icon = $(element).parent().parent('.form-group').find('i');
                var parent = $(element).parent().parent('.form-group');
                icon.removeClass('fa fa-check').addClass('fa fa-times');
                parent.removeClass('has-success').addClass('has-error');
            },

            highlight: function(element) { // hightlight error inputs
                var parent = $(element).parent().parent('.form-group');
                parent.removeClass('has-success').addClass('has-error');
            },

            unhighlight: function(element) { // revert the change done by hightlight

            },

            success: function(label, element) {
                var icon = $(element).parent().parent('.form-group').find('i');
                var parent = $(element).parent().parent('.form-group');
                icon.removeClass("fa fa-times").addClass('fa fa-check');
                parent.removeClass('has-error').addClass('has-success');
            },

            submitHandler: function(form) {

            }
        });


        $('#general_validate').validate({
            focusInvalid: false,
            ignore: "",
            rules: {
                formfield1: {
                    required: true
                },
                formfield2: {
                    required: true,
                    email: true
                },
                formfield3: {
                    required: true,
                    url: true
                },
                formfield4: {
                    required: true,
                    creditcardtypes: true
                },
                formfield5: {
                    number: true,
                    required: true,
                },
                formfield6: {
                    minlength: 3,
                    required: true,
                },
                formfield7: {
                    maxlength: 5,
                    required: true,
                },
                formfield8: {
                    maxlength: 5,
                    required: true,
                },
                formfield9: {
                    maxlength: 5,
                    required: true,
                    equalTo: "#formfield8"
                },
                formfield10: {
                    required: true,
                },
                formfield11: {
                    required: true,
                    alphanumeric: true,
                },

            },

            invalidHandler: function(event, validator) {
                //display error alert on form submit    
            },

            errorPlacement: function(label, element) { // render error placement for each input type   
                console.log(label);
                $('<span class="error"></span>').insertAfter(element).append(label)
                var parent = $(element).parent().parent('.form-group');
                parent.removeClass('has-success').addClass('has-error');
            },

            highlight: function(element) { // hightlight error inputs
                var parent = $(element).parent().parent('.form-group');
                parent.removeClass('has-success').addClass('has-error');
            },

            unhighlight: function(element) { // revert the change done by hightlight

            },

            success: function(label, element) {
                var parent = $(element).parent().parent('.form-group');
                parent.removeClass('has-error').addClass('has-success');
            },

            submitHandler: function(form) {

            }
        });








        //Form Wizard Validations
        var $validator = $("#commentForm").validate({
            rules: {
                txtFullName: {
                    required: true,
                    minlength: 3
                },
                txtEmail: {
                    required: true,
                    email: true,
                },
                txtPhone: {
                    number: true,
                    required: true,
                }
            },
            errorPlacement: function(label, element) {
                $('<span class="arrow"></span>').insertBefore(element);
                $('<span class="error"></span>').insertAfter(element).append(label)
            }
        });


    }



    if ($.isFunction($.fn.bootstrapWizard)) {

        $('#pills').bootstrapWizard({
            'tabClass': 'nav nav-pills',
            'debug': false,
            onShow: function(tab, navigation, index) {
                console.log('onShow');
            },
            onNext: function(tab, navigation, index) {
                console.log('onNext');
                if ($.isFunction($.fn.validate)) {
                    var $valid = $("#commentForm").valid();
                    if (!$valid) {
                        $validator.focusInvalid();
                        return false;
                    } else {
                        $('#pills').find('.form-wizard').children('li').eq(index - 1).addClass('complete');
                        $('#pills').find('.form-wizard').children('li').eq(index - 1).find('.step').html('<i class="fa fa-check"></i>');
                    }
                }
            },
            onPrevious: function(tab, navigation, index) {
                console.log('onPrevious');
            },
            onLast: function(tab, navigation, index) {
                console.log('onLast');
            },
            onTabClick: function(tab, navigation, index) {
                console.log('onTabClick');
                //alert('on tab click disabled');
            },
            onTabShow: function(tab, navigation, index) {
                console.log('onTabShow');
                var $total = navigation.find('li').length;
                var $current = index + 1;
                var $percent = ($current / $total) * 100;
                $('#pills .progress-bar').css({
                    width: $percent + '%'
                });
            }
        });

        $('#pills .finish').click(function() {
            alert('Finished!, Starting over!');
            $('#pills').find("a[href*='tab1']").trigger('click');
        });







    }




});
