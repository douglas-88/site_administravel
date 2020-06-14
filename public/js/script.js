var editorTextarea;
ClassicEditor
    .create(document.querySelector( '#content' ))
    .then( editor => {
        editorTextarea = editor;
    } )
    .catch( error => {
        console.error( error );
    } );

$.validator.setDefaults({
    errorClass: "text-danger",
    errorElement: "small",

    highlight:function(element){
        $(element).addClass("is-invalid");
        let nameEl = $(element).attr("name");
        $("#"+nameEl+"Help").addClass("d-none");
    },
    unhighlight:function(element){
        $(element).removeClass("is-invalid").addClass("is-valid");
        let nameEl = $(element).attr("name");
        $("#"+nameEl+"Help").removeClass("d-none");
    },
    errorPlacement: function(error, element) {
        element.closest(".form-group").append(error);
    },
    onclick: true
});

$.validator.addMethod("ck_editor",function(){
    var content_length = editorTextarea.getData().trim().length;
    return content_length > 0;
},"Favor inserir um conteúdo para a página.");

$.validator.addMethod(
    "regex",
    function(value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
    },
"Favor verifique o valor informado.<br>Sua URL deve conter apenas palavras em letras minúsculas e separadas com hífen" +
", desta forma por exemplo:<strong> titulo-da-minha-pagina</strong>"
);

$.validator.addMethod('filesize', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param)

}, 'O tamanho máximo do arquivo permitido é de 200KB');



$("#form_page_edit, #form_page_create").validate({

    ignore:[],
    rules:{
        title:{
            required:true,
            minlength:6,
            maxlength:255
        },
        url:{
            required:true,
            minlength:6,
            maxlength:255,
            regex:"^[a-z]+(?:-[a-z]+)*$"
        },
        content:{
            ck_editor:true
        }
    }
});


$("#form_user_create").validate({
    rules:{
        name:{
            required:true,
            minlength:3,
            maxlength:255,
        },
        email:{
            required:true,
            email:true
        },
        password: {
            required: true,
            minlength: 6,
            maxlength: 12
        },
        avatar:{
            accept: "image/jpeg,image/jpg,image/png",
            filesize:200000 /* = 1kb */
        }
    }
});

var avatarPreview = function(event) {
    var output = document.getElementById('avatar_preview');
    output.src = URL.createObjectURL(event.target.files[0]);

};