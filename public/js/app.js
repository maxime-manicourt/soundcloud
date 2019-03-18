$(document).pjax('[data-pjax] a, a[data-pjax]', '#pjax-container')
$(document).pjax('[data-pjax-toggle] a, a[data-pjax-toggle]', '#pjax-container', {push : false});

$(document).ready (function(){
  $('#pjax-container').on('click', 'a.track', function(e) {
      e.preventDefault();
      var f = $(this).attr('data-file');
      console.log(f);

      var audio = $('#audio');
      audio.attr('src', f);
      audio[0].load();
      audio[0].play();
  });

  $('#search').submit(function(e){
      
        e.preventDefault();
        if(true) 
            $.pjax({url: "/recherche/"+e.target.elements[0].value, container: '#pjax-container'})
        else 
            window.location.href = "/recherche/"+e.target.elements[0].value;

  })
});
