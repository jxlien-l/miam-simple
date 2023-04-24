require('js/index');
require('services/index');
require('views/index');


function require(filename) {
  $.getScript(filename + '.js');
}

function navigate(view) {
  $("#navigate").load("views/" + view + ".html")
}

function getPage() {
  let url = window.location.href;

}

$(document).ready(function() {
  getPage();
  navigate();
});