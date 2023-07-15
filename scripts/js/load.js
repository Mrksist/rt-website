let elements = {
    footer: document.getElementById("footer"),
    elements: footer.getElementsByClassName("footer-element"),
    content:  document.getElementById("content"),
    navbar_mini: document.getElementById("navbar-mini-opened"),
    navbar: document.getElementById("navbar"),
    navbar_elements: navbar.getElementsByTagName("div"),
    md_images: document.getElementsByClassName("md")
}

let length = 0;
let width = 0;
let height = 0;

let navbar_elements_widths = 0;
for(let i = 0; i < elements.elements.length; i++){
    if(length < elements.elements.item(i).getElementsByTagName("a").length)
    length = elements.elements.item(i).getElementsByTagName("a").length;

    if(width < elements.elements.item(i).offsetWidth)
        width = elements.elements.item(i).offsetWidth;
    if(height < elements.elements.item(i).offsetHeight)
        height = elements.elements.item(i).offsetHeight;
}
for(let ii = 0; ii < elements.navbar_elements.length; ii++){
    if(elements.navbar_elements.item(ii).id === "navbar-mini") continue;
    if(elements.navbar_elements.item(ii).id === "navbar-full") continue;
    navbar_elements_widths += elements.navbar_elements.item(ii).offsetWidth;
}
elements.footer.style.height = length*(elements.elements.item(0).getElementsByTagName("a").item(0).offsetHeight + elements.elements.item(0).getElementsByTagName("br").item(0).offsetHeight) + "px";
elements.footer.style.paddingTop = footer.style.paddingBottom =  "1em";
elements.navbar.style.height = document.getElementById("navbar-logo").offsetHeight + "px";
document.addEventListener("DOMContentLoaded", function(event){
    function onresizeandload(){
        elements.footer.style.height = height*Math.floor(elements.elements.length/Math.floor(window.innerWidth/width)) + "px";
        if(Math.floor(elements.elements.length/Math.floor(window.innerWidth/width)) == 0)
            elements.footer.style.height = height + "px";
        elements.content.style.paddingBottom = "0px";
        elements.content.style.paddingBottom = window.innerHeight - elements.content.offsetHeight - elements.navbar.offsetHeight + "px";

        if(window.innerWidth <= navbar_elements_widths+document.getElementById("jsv").offsetWidth){
            document.getElementById("navbar-full").style.display = "none";
            document.getElementById("navbar-mini").style.display = "block";
        }
        else{
            document.getElementById("navbar-full").style.display = "block";
            document.getElementById("navbar-mini").style.display = "none";
            elements.navbar_mini.style.display = "none";
        }
        let s;
        for(let i = 0; i < elements.md_images.length; i++){
            if(elements.md_images.item(i).tagName == "IMG"){
                s = elements.md_images.item(i);
                s.style.marginRight = (document.getElementsByClassName("article-content").item(0).offsetWidth - s.offsetWidth)/2 - 25 + "px";
                s.style.marginLeft = (document.getElementsByClassName("article-content").item(0).offsetWidth - s.offsetWidth)/2 - 25 + "px";
            }
        }
    }
    window.onload = window.onresize = onresizeandload;
});
elements.navbar_mini.style.display = "none";
document.getElementById("language").onclick = function(){
    console.log(12);
}
document.getElementById("open-menu").onclick = function(){
    if(elements.navbar_mini.style.display === "none")
        elements.navbar_mini.style.display = "block";
    else
        elements.navbar_mini.style.display = "none";
}