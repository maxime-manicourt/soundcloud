$(document).pjax('[data-pjax] a, a[data-pjax]', '#pjax-container')
$(document).pjax('[data-pjax-toggle] a, a[data-pjax-toggle]', '#pjax-container', {push : false});

$(document).on('submit', 'form[data-pjax]', function(event) {
    $.pjax.submit(event, '#pjax-container')
});

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
        if($.support.pjax) 
            $.pjax({url: "/recherche/"+e.target.elements[0].value, container: '#pjax-container'})
        else 
            window.location.href = "/recherche/"+e.target.elements[0].value;

  });

  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }

});
