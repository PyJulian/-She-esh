// This code is so based for the 3ds support I gotta use var 😎

// Replace all images with the placeholder, idk why I made this nor am I removing it
var img = document.querySelectorAll('img');
for (var idx = 0; idx < img.length; idx++) {
	img[idx].onerror = function() {this.src = 'db/icons/placeholder.png';};
};

// Darkmode easypeasy lemon whatever
var body = document.body;
function dark() {
	var dark = (body.id == 'dark')
	document.cookie = (dark ? 'dark=0;' : 'dark=1;') + ' expires=Fri, 31 Dec 9999 23:59:59 GMT';
	body.id = dark ? '' : 'dark';

}; if (document.cookie.indexOf('dark=1') != -1) {dark()}; // Why was localStorage not a thing? cookies are bullshit
