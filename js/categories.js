// Create a new iframe with new data when given a search param
function setTable(selection){
    var iFrameContainer = document.getElementById('iframe-container');
    //if (!document.getElementById("newWindowCheckBox").checked) iFrameContainer.innerHTML = "<iframe class='holds-the-iframe' src='result?search=" + selection.toUpperCase() + "' width='100%' frameborder='0' style='margin-top:50px;' onload='resizeIframe(this)'></iframe>"
    //else window.open("http://fallout4search.bradenmckewen.com?search=" + selection);
    window.open("http://fallout4search.bradenmckewen.com?search=" + selection, "_self");
}