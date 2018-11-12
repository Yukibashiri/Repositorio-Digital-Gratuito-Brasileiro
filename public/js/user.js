

var form = $(".validation-wizard").show();

$(".validation-wizard").steps({
    headerTag: "h6",
    bodyTag: "section",
    transitionEffect: "fade",
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: {
        finish: "Cadastrar"
    },

    onStepChanging: function (event, currentIndex, newIndex)
    {
        // Allways allow previous action even if the current form is not valid!
        if (currentIndex > newIndex)
        {
            return true;
        }
        // Forbid next action on "Warning" step if the user is to young

        // Needed in some cases if the user went back (clean up)
        if (currentIndex < newIndex)
        {
            // To remove error styles
            form.find(".body:eq(" + newIndex + ") label.error").remove();
            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
        }
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
    },

    onFinishing: function (event, currentIndex) {
        return form.validate().settings.ignore = ":disabled", form.valid()
    },
    onFinished: function (event, currentIndex) {
        form.submit();
        swal("Cadastro realizado!", "O cadastro foi realizado com sucesso!");
    }
}), $(".validation-wizard").validate({
    ignore: "input[type=hidden]",
    errorClass: "text-danger",
    successClass: "text-success",
    highlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    },
    unhighlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    },
    errorPlacement: function (error, element) {
        error.insertAfter(element)
    },
    rules: {
        email: {
            email: !0,required: true, email: true
        },
        password: {
            required: true, minlength: 6
        },
        confirmpassword: {
            equalTo: "#password"
        },
        name: { required: true, number: false, minlength: 1 },
        nickname: { required: true, number: false, minlength: 1 },
        login: { required: true, minlength: 4 },
        lastname: { required: true, number: false, minlength: 1 }
    },
    messages: {
        name: "Informe um nome",
        login: "Informe um usuário válido",
        lastname: "Informe um sobrenome",
        email: "Informe um e-mail",
        nickname: "Informe como quer ser chamado pelo sistema",
        password: "Deve conter no minimo 6 digitos",
        confirmpassword: "Deve ser igual a senha digitada"
    }
})
// onStepChanging: function (event, currentIndex, newIndex) {
//     return currentIndex > newIndex || (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
// },
