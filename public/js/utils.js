
var Profile = {
    check: function (id) {
        if ($.trim($("#" + id)[0].value) == '') {
            $("#" + id)[0].focus();
            $("#" + id + "_alert").show();

            return false;
        }
        ;

        return true;
    },
    validate: function () {
        if (SignUp.check("name") == false) {
            return false;
        }
        if (SignUp.check("email") == false) {
            return false;
        }
        $("#profileForm")[0].submit();
    }
};

var SignUp = {
    check: function (id) {
        if ($.trim($("#" + id)[0].value) == '') {
            $("#" + id)[0].focus();
            $("#" + id + "_alert").show();

            return false;
        }
        ;

        return true;
    },
    validate: function () {
        if (SignUp.check("name") == false) {
            return false;
        }
        if (SignUp.check("username") == false) {
            return false;
        }
        if (SignUp.check("email") == false) {
            return false;
        }
        if (SignUp.check("password") == false) {
            return false;
        }
        if ($("#password")[0].value != $("#repeatPassword")[0].value) {
            $("#repeatPassword")[0].focus();
            $("#repeatPassword_alert").show();

            return false;
        }
        $("#registerForm")[0].submit();
    }
}

$(document).ready(function () {
    $("div.profile .alert").hide();
    $("#registerForm").validate(
    {
    // Rules for form validation
    rules:
    {
    numeroId:
    {
    required: true
    },
    name:
    {
    required: true
    },
      email:
    {
    required: true,
      email: true
    },
      username:
    {
    required: true
    },
      password:
    {
      required: true,
      minlength: 8,
      maxlength: 20
    },
      repeatPassword:
    {
      required: true,
      equalto: '#password'
    }
    },
      // Messages for form validation
      messages:
    {
    numeroId:
    {
    required: 'Ingrese su numero de identificacion'
    },
    name:
    {
    required: 'Ingrese su nombre'
    },
      email:
    {
    required: 'Ingrese su direccion de correo electronico',
      email: 'Ingrese una direccion de correo electronico valida'
    },
      username:
    {
    required: 'Ingrese su identificacion de usuario'
    },
      password:
    {
    required: 'Ingrese una palabra secreta como clave',
    minlength: 'Su clave debe ser de al menos 8 caracteres',
    maxlength: 'Su clave no puede tener mas de 20 caracteres'
    },
      repeatPassword:
    {
    required: 'Ingrese nuevamente su clave',
    equalto: 'No coincide con su clave'
    }
    },
      // Ajax form submition
      submitHandler: function(form)
      {
      $(form).ajaxSubmit(
      {
      beforeSend: function()
      {
      },
        uploadProgress: function(event, position, total, percentComplete)
        {
        $("#registerForm .progress").text(percentComplete + '%');
        },
        success: function()
        {
        $("#registerForm").addClass('submited');
          $('#registerForm button[type="submit"]').removeClass('button-uploading').attr('disabled', false);
        }
      });
      },
      // Do not change code below
      errorPlacement: function(error, element)
      {
      error.insertAfter(element.parent());
      }
    });
    $("#developersForm").validate(
    {
    // Rules for form validation
    rules:
    {
    fullname:
    {
    required: true
    },
      email:
    {
    required: true,
      email: true
    },
      dateenrolled:
    {
    required: true
    },
      address:
    {
      required: true
    },
      telephone:
    {
      required: true
    }
    },
      // Messages for form validation
      messages:
    {
    fullname:
    {
    required: 'Please enter the developers full name'
    },
      email:
    {
    required: 'Please enter your email address',
      email: 'Please enter a VALID email address'
    },
      dateenrolled:
    {
    required: 'Please enter a valid date'
    },
      address:
    {
    required: 'Please enter the developer\'s address'
    },
      telephone:
    {
    required: 'Please enter the developer\'s telephone'
    }
    },
      // Ajax form submition
      submitHandler: function(form)
      {
      $(form).ajaxSubmit(
      {
      beforeSend: function()
      {
      },
        uploadProgress: function(event, position, total, percentComplete)
        {
        $("#developersForm .progress").text(percentComplete + '%');
        },
        success: function()
        {
        $("#developersForm").addClass('submited');
          $('#developersForm button[type="submit"]').removeClass('button-uploading').attr('disabled', false);
        }
      });
      },
      // Do not change code below
      errorPlacement: function(error, element)
      {
      error.insertAfter(element.parent());
      }
    });
    $("#routenewForm").validate(
    {
    // Rules for form validation
    rules:
    {
    numeroId:
    {
    required: true
    },
    name:
    {
    required: true
    },
      email:
    {
    required: true,
      email: true
    },
      description:
    {
    required: true
    },
      phone:
    {
      required: true,
      minlength: 7,
      maxlength: 10
    },
      tipoId:
    {
      required: true,
    },
      address:
    {
      required: true,
    },
      customField1:
    {
      required: true,
    }
    },
      // Messages for form validation
      messages:
    {
    numeroId:
    {
    required: 'Ingrese su numero de identificacion'
    },
    address:
    {
    required: 'Ingrese una direccion de referencia'
    },
    customField1:
    {
    required: 'Ingrese una aclaracion del dato'
    },
    name:
    {
    required: 'Ingrese un nombre, descripcion, u observacion'
    },
      email:
    {
    required: 'Ingrese su direccion de correo electronico',
      email: 'Ingrese una direccion de correo electronico valida'
    },
      description:
    {
    required: 'Ingrese en forma mas completa nombre, descripcion, u observacion'
    },
      phone:
    {
    required: 'Ingrese un numero de telefono valido',
    minlength: 'Su numero de telefono debe ser de al menos 7 caracteres',
    maxlength: 'Su numero de telefono no puede tener mas de 10 caracteres'
    },
      tipoId:
    {
    required: 'Ingrese el tipo de identificacion'
    }
    },
      // Ajax form submition
      submitHandler: function(form)
      {
      $(form).ajaxSubmit(
      {
      beforeSend: function()
      {
      },
        uploadProgress: function(event, position, total, percentComplete)
        {
        $("#routenewForm .progress").text(percentComplete + '%');
        },
        success: function()
        {
        $("#routenewForm").addClass('submited');
          $('#routenewForm button[type="submit"]').removeClass('button-uploading').attr('disabled', false);
        }
      });
      },
      // Do not change code below
      errorPlacement: function(error, element)
      {
      error.insertAfter(element.parent());
      }
    });    
    $("#drivernewForm").validate(
    {
    // Rules for form validation
    rules:
    {
    numeroId:
    {
    required: true
    },
    name:
    {
    required: true
    },
      email:
    {
    required: true,
      email: true
    },
      description:
    {
    required: true
    },
      phone:
    {
      required: true,
      minlength: 7,
      maxlength: 10
    },
      tipoId:
    {
      required: true,
    },
      address:
    {
      required: true,
    },
      customField1:
    {
      required: true,
    }
    },
      // Messages for form validation
      messages:
    {
    numeroId:
    {
    required: 'Ingrese su numero de identificacion'
    },
    address:
    {
    required: 'Ingrese una direccion de referencia'
    },
    customField1:
    {
    required: 'Ingrese una aclaracion del dato'
    },
    name:
    {
    required: 'Ingrese un nombre, descripcion, u observacion'
    },
      email:
    {
    required: 'Ingrese su direccion de correo electronico',
      email: 'Ingrese una direccion de correo electronico valida'
    },
      description:
    {
    required: 'Ingrese en forma mas completa nombre, descripcion, u observacion'
    },
      phone:
    {
    required: 'Ingrese un numero de telefono valido',
    minlength: 'Su numero de telefono debe ser de al menos 7 caracteres',
    maxlength: 'Su numero de telefono no puede tener mas de 10 caracteres'
    },
      tipoId:
    {
    required: 'Ingrese el tipo de identificacion'
    }
    },
      // Ajax form submition
      submitHandler: function(form)
      {
      $(form).ajaxSubmit(
      {
      beforeSend: function()
      {
      },
        uploadProgress: function(event, position, total, percentComplete)
        {
        $("#drivernewForm .progress").text(percentComplete + '%');
        },
        success: function()
        {
        $("#drivernewForm").addClass('submited');
          $('#drivernewForm button[type="submit"]').removeClass('button-uploading').attr('disabled', false);
        }
      });
      },
      // Do not change code below
      errorPlacement: function(error, element)
      {
      error.insertAfter(element.parent());
      }
    });    
    });

