require('./bootstrap');
function audio(audio , name) {
   return document.getElementById('audio').innerHTML = audio + name ;
   //'<h3>' + name + '</h3>' + '<audio controls autoplay> <source src=' + audio + '> </audio> '
}