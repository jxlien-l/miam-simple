function bind(props) {
  return function (tok, i) { return (i % 2) ? props[tok] : tok; };
}

function render(component, data) {
  var componentHtml = getComponent(component);
  if (data != null) {
    var itemTemplate = component.split(/\${(.+?)\}/g);
    componentHtml = data.map(function (item) {
      return itemTemplate.map(bind(item)).join('');
    })
  }
}

function getComponent(component) {
  return getHtmlContent("components/" + component + ".html");
}

function getHtmlContent(url) {
 return $.ajax({
  type: "GET",
  url: url,
  dataType: "html",
  async: false
 }).responseText;
}

function insert(html, target, method){
  switch (method) {
    case "append":
      $(target).append(html);
      break;
    case "prepend":
      $(target).prepend(html);
      break;
    default:
      $(target).prepend(html);
  }
}