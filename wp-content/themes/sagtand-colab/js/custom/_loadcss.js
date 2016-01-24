// append css dynamically to head
var head = document.getElementsByTagName('head')[0];
var element = document.createElement('link');
element.rel = 'stylesheet';
element.type = 'text/css';
element.href = templateUrl + '/css/app.css';

//here's the magic
element.media = 'non-existant-media';
head.appendChild(element, head.firstChild);
setTimeout(function () {
    element.media = 'all';
});