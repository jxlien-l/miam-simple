require('services/index');

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
  $('#sb_generate_week').click(function(){
    var test = callAjax({'number': $('input[name="nb_menus"]').val()}, 'GenerateWeek', true);
    $('body').append(Object.toString(test));
  })
});

function callAjax(data, apiMethod, isPost) {
  var result;
  var type = isPost ? 'post' : 'get';
  $.ajax({
    dataType: 'json',
    type: type,
    async: false,
    data: data,
    url: 'api/' + apiMethod + '.php',
    success: function(data) {
      result = data;
    },
    error: function(e) {
      result = e;
    }
  });
  return result;
}
