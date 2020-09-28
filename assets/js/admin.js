window.addEventListener("load",function(){
    var tabs = document.querySelectorAll("ul.nav-tabs > li");
    
    for (var i = 0; i < tabs.length; i++) {
        tabs[i].addEventListener("click",switchTab);
    }

    function switchTab(event)
    {
        event.preventDefault();
        document.querySelector("ul.nav-tabs > li.active").classList.remove("active");
        document.querySelector("div.tab-content > div.tab-pane.active").classList.remove("active");

        var clickTabed = event.currentTarget;
        var anchor = event.target;
        var activePaneID = anchor.getAttribute("href");
        clickTabed.classList.add("active");
        document.querySelector(activePaneID).classList.add("active");

    }
});