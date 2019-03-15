$(document).ready (function(){
  $('#main').on('click', 'a.track', function(e) {
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
      window.location.href = "/recherche/"+e.target.elements[0].value;
  })
});
