function xhrobject(settings){
    var __url = "/fitbi/static/text/content.txt";
    if(settings.url){
        __url = settings.url;
    }
    var __method = "GET";
    if(settings.method){
        __method = settings.method;
    }
    var __async = true;
    if(settings.async){
        __async = settings.async;
    }
    var __cacheControl = null;
    if(settings.cacheControl){
        __cacheControl = settings.cacheControl;
    }
    var __fetchKey = null;
    if(settings.fetch){
        __fetchKey = settings.fetch;
    }
    var __text = null;
    var __html = null;
     this.sendrequest = function(){
        var xhr = createXHR();
        
        xhr.onreadystatechange = function(){
            if(xhr.readyState==4&&xhr.status==200){
                __text = xhr.response;
                __html = (__text)?__text:"<p>The server did not return a response</p>";
                sethtml(__html);
            }
        }
        xhr.open(__method,__url+'/'+__fetchKey,__async);
        xhr.setRequestHeader("Cache-Control",__cacheControl);
        xhr.send(null);
    }
    function sethtml(__html){
        $(document).ready(function(){
            $("#workarea").html(__html);
        });
    }
}

function createXHR(){
    var xhr = null;
    xhr = new XMLHttpRequest();
    if(xhr){
        return xhr;
    }
    else{
        alert("failed to create xhr");
    }
}

function replaceContent(fetchKey){
    settings={
        "url":"fill_Work_area",
        "method":"GET",
        "async":true,
        "cacheControl":"no-cache",
        "fetch":fetchKey
    };
    XMLHttp = new xhrobject(settings);
    XMLHttp.sendrequest();
    reset_badge("for"+fetchKey);
}

function reset_badge(badge_reset_key){
    document.getElementById(badge_reset_key).innerHTML = "";
}

function fetch(){
    $.ajax({
        url:"retrieve_new_item_counts",
        type:"GET",
        dataType:"text"
    }).done(function(msg){
        $('#forarticles').text(msg);
    });
}
$(document).ready(function(){
    fetch(); //fetches the number of new changes in the articles, users, media and comments tables
});