var system = require('system');
var fs = require('fs');
var url = system.args[1];
var page = require('webpage').create();
page.settings.userAgent = 'Chrome/37.0.2062.120 Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Safari/537.36';
 page.viewportSize = { width: 1920, height: 1920 };
page.onAlert = function(msg) {
 console.log(msg);
};
page.open('http://www.shippingexplorer.net/ru/ships', function(status) {
 if ( status === "success" ) {
 page.injectJs('/jquery.js');
 
 html = page.evaluate(function() {
          return $('html').html();
      });
 var file = fs.open('1.txt', "w");
    file.write(html + '\n');
    file.close();
  
 
 var point = page.evaluate(function () {

 var element = document.querySelector('li.next > a');

    
 var rect = element.getBoundingClientRect();
 return {
 x: rect.left + Math.floor(rect.width / 2),
 y: rect.top + (rect.height / 2)
 };
 });
 

 page.sendEvent('click', point.x, point.y);
 
 window.setTimeout(function () {
    html2 = page.content;
 
     var file2 = fs.open('2.txt', "w");
    file2.write(html2 + '\n');
    file2.close();
    phantom.exit();
}, 5000);





 }
});