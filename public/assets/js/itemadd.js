/*!

 =========================================================
 * Bootstrap Wizard - v1.1.1
 =========================================================
 
 * Product Page: https://www.creative-tim.com/product/bootstrap-wizard
 * Copyright 2017 Creative Tim (http://www.creative-tim.com)
 * Licensed under MIT (https://github.com/creativetimofficial/bootstrap-wizard/blob/master/LICENSE.md)
 
 =========================================================
 
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 */

// Get Shit Done Kit Bootstrap Wizard Functions

searchVisible = 0;
transparent = true;

$(document).ready(function(){

    /*  Activate the tooltips      */
    $('[rel="tooltip"]').tooltip();
    $('.wizard-container').show();
    // Code for the Validator
    var $validator = $('.wizard-card form').validate({
        rules: {
            colecao_id: { required: true },
            curso_id: { required: true },
            "roles[]": { required: true },
            "tags[]": { required: true },
            "authors[]": { required: true },
            item_file: { required: true, file: true },
            resumo: { required: true, number: false, minlength: 50 },
            title: { required: true, number: false, minlength: 2 },
        },
        messages: {
            colecao_id: "Informe o tipo de trabalho",
            curso_id: "Informe a área",
            "roles[]": "Informe o papel da pessoa",
            "tags[]": "Informe algumsa palavras-chaves",
            "authors[]": "Informe o nome dos participantes",
            file: "Anesxe o arquivo do seu trabalho",
            title: "Informe o titulo do trabalho",
            resumo: "Cole aqui o resumo do seu trabalho",
            item_file: "Insira o arquivo do seu trabalho"
        }
	});

    // Wizard Initialization
  	$('.wizard-card').bootstrapWizard({
        'tabClass': 'nav nav-pills',
        'nextSelector': '.btn-next',
        'previousSelector': '.btn-previous',

        onNext: function(tab, navigation, index) {
        	var $valid = $('.wizard-card form').valid();
        	if(!$valid) {
        		$validator.focusInvalid();
        		return false;
        	}
        },

        onInit : function(tab, navigation, index){

          //check number of tabs and fill the entire row
          var $total = navigation.find('li').length;
          $width = 100/$total;
          var $wizard = navigation.closest('.wizard-card');

          $display_width = $(document).width();

          if($display_width < 600 && $total > 3){
              $width = 50;
          }

           navigation.find('li').css('width',$width + '%');
           $first_li = navigation.find('li:first-child a').html();
           $moving_div = $('<div class="moving-tab">' + $first_li + '</div>');
           $('.wizard-card .wizard-navigation').append($moving_div);
           refreshAnimation($wizard, index);
           $('.moving-tab').css('transition','transform 0s');
       },

        onTabClick : function(tab, navigation, index){

            var $valid = $('.wizard-card form').valid();

            if(!$valid){
                return false;
            } else {
                return true;
            }
        },

        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;

            var $wizard = navigation.closest('.wizard-card');

            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $($wizard).find('.btn-next').hide();
                $($wizard).find('.btn-finish').show();
            } else {
                $($wizard).find('.btn-next').show();
                $($wizard).find('.btn-finish').hide();
            }

            button_text = navigation.find('li:nth-child(' + $current + ') a').html();

            setTimeout(function(){
                $('.moving-tab').text(button_text);
            }, 150);

            var checkbox = $('.footer-checkbox');

            if( !index == 0 ){
                $(checkbox).css({
                    'opacity':'0',
                    'visibility':'hidden',
                    'position':'absolute'
                });
            } else {
                $(checkbox).css({
                    'opacity':'1',
                    'visibility':'visible'
                });
            }

            refreshAnimation($wizard, index);
        }
  	});


    // Prepare the preview for profile picture
    $("#wizard-picture").change(function(){
        readURL(this);
    });

    $('[data-toggle="wizard-radio"]').click(function(){
        wizard = $(this).closest('.wizard-card');
        wizard.find('[data-toggle="wizard-radio"]').removeClass('active');
        $(this).addClass('active');
        $(wizard).find('[type="radio"]').removeAttr('checked');
        $(this).find('[type="radio"]').attr('checked','true');
    });

    $('[data-toggle="wizard-checkbox"]').click(function(){
        if( $(this).hasClass('active')){
            $(this).removeClass('active');
            $(this).find('[type="checkbox"]').removeAttr('checked');
        } else {
            $(this).addClass('active');
            $(this).find('[type="checkbox"]').attr('checked','true');
        }
    });

    $('.set-full-height').css('height', 'auto');

});



 //Function to show image before upload

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(window).resize(function(){
    $('.wizard-card').each(function(){
        $wizard = $(this);
        index = $wizard.bootstrapWizard('currentIndex');
        refreshAnimation($wizard, index);

        $('.moving-tab').css({
            'transition': 'transform 0s'
        });
    });
});

function refreshAnimation($wizard, index){
    total_steps = $wizard.find('li').length;
    move_distance = $wizard.width() / total_steps;
    step_width = move_distance;
    move_distance *= index;

    $wizard.find('.moving-tab').css('width', step_width);
    $('.moving-tab').css({
        'transform':'translate3d(' + move_distance + 'px, 0, 0)',
        'transition': 'all 0.3s ease-out'

    });
}

function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		clearTimeout(timeout);
		timeout = setTimeout(function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		}, wait);
		if (immediate && !timeout) func.apply(context, args);
	};
};

function addBotao(){
    var max_fields      = 6;
    var wrapper         = $(".autores");
    var add_button      = $(".adicionar");

    var x = 2;
    $(add_button).click(function(e){
        e.preventDefault();
        if(x < max_fields){
            x++;
            $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="delete">Delete</a></div>'); //add input bo
            //$(wrapper).append('<div class="col-sm-9"> <div class="form-group"> <label>Nome Completo <small>(obrigatório)</small></label> <input name="authors[]" type="text" class="form-control" placeholder="João Silva..."> </div> </div> <div class="col-sm-3"> <div class="form-group"> <label for="papel_id" class="control-label">Papel</label> <select id="papel_id" name="roles[]" class="form-control" > <option value="" selected="selected">Selecione</option> @foreach($papeis as $row) <option value="{{ $row[\'id\'] }}" @if (isset($item->papel_id) && $row[\'id\'] == $item->papel_id) selected="selected" @endif>{{ $row[\'nome\'] }}</option> @endforeach </select> </div> </div>'); //add input box
        }
        else
        {
            alert('You Reached the limits')
        }
    });

    $(wrapper).on("click",".delete", function(e){
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })


};
    function loadColecoes(curso) {
        ajax({
            url: url('get_unidades_grupo'),
            type: 'get',
            data: {
                id: grupo.val()
            },
            success: function(response) {
                $('#report-unidade').empty();
                $('#report-unidade').append('<option value="0">Todas</option>');
                for (var i = 0; i < response.data.length; i++) {
                    $('#report-unidade').append('<option value=' + response.data[i].id + '>' + response.data[i].nome + '</option>')
                }
            }
        })
    };

    function loadDisciplinas(curso) {
        ajax({
            url: url('get_unidades_grupo'),
            type: 'get',
            data: {
                id: grupo.val()
            },
            success: function(response) {
                $('#report-unidade').empty();
                $('#report-unidade').append('<option value="0">Todas</option>');
                for (var i = 0; i < response.data.length; i++) {
                    $('#report-unidade').append('<option value=' + response.data[i].id + '>' + response.data[i].nome + '</option>')
                }
            }
        })
    };