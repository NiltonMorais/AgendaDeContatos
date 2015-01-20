/**
 * efeito alert para dar um fadein e fadeout na mensagem
 */
$(function () {
    // pegar elemente com corpo da mensagem
    var corpo_alert = $("#alert-message");
 
    // verificar se o elemente esta presente na pagina
    if (corpo_alert.length)
        // gerar efeito para o elemento encontrado na pagina
        corpo_alert.fadeOut().fadeIn().fadeOut().fadeIn();
});


/**
 * mask input
 */
$(function (){
    // mascara para telefone: (xx) xxxx-xxxxx
    $("input#inputTelefonePrincipal, input#inputTelefoneSecundario").mask("(99) 9999-9999?9");
    
    // mascara para captcha com 4 caracteres apenas alfabéticos: xxxx
    $("input#inputCaptcha").mask("aaaa");
});




/**
 * plugin typeahead // busca do ajax bootstrap
 */
$(function (){
    $('input.typeahead').typeahead({
        ajax: { 
            url: '/contatos/search',    // url do serviço AJAX
            triggerLength: 2,           // mínimo de caracteres
            displayField: 'nome',       // campo do JSON utilizado de retorno
        }
    });
});
