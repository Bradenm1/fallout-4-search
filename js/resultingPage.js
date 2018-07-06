// Resize the iframe to fit its content for the height
function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
}

// Script for hiding and showing info when page is loading
document.getElementsByClassName('wait-text')[0].style.display = 'none';
document.getElementsByClassName('show-hide-table')[0].style.display = 'block';
if (window.top == window) { // Is the main window
    document.getElementsByClassName('table-top')[0].setAttribute('id', 'single-search-table');
    document.getElementsByClassName('header-for-main')[0].style.display = 'block';
    document.getElementsByClassName('home-button')[0].style.display = 'block';
} else { // Is in an Iframe
    document.getElementsByClassName('footer')[0].style.display = 'none';
}