require('./bootstrap');

require('alpinejs');


var Turbolinks = require("turbolinks")
document.addEventListener("livewire:load", function(event) {
    turbolinks.start();
});