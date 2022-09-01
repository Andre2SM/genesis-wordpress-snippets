jQuery(document).on('ready', function (){

    var target_url = translate_object.target_url;

    jQuery('.google-translate').on( 'change', function(){
        var language = jQuery(this).val();
        window.open('https://translate.google.com/translate?hl=en&sl=en&tl='+ language +'&u='+target_url+'', '_blank');
    } );
} );