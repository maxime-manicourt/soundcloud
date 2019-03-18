
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#main'
});

$(document).ready (function(){
    $('#main').on('click', 'a.track', function(e) {
        e.preventDefault();
        var f = ($this).attr('data-file');
        console.log(f);

        var audio = $('#audio');
        audio.attr('src', f);
        audio[0].load();
        audio[0].play();
    });
});

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
