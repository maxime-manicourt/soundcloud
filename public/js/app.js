$(document).ready(function(){
    $('a.chanson').on('click', (function(e){
        e.preventDefault();
        var f = $(this).attr('data-file');

        var audio = $('#audio');
        audio.attr('src', f);
        audio[0].load();
        audio[0].play();
    })
)})