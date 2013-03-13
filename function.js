
/**
 * Getting param from the url
 */
function getRequest(val)
{  
    val = val.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");  
    var rgx = "[\\?&]"+val+"=([^&#]*)";  
    var regex = new RegExp( rgx );  
    var results = regex.exec(window.location.href);
    if(results == null)
        return "";  
    else    
        return results[1];
}

/**
 * Getting Request form the url
 */
function getUri()
{
    return getRequest("act");
}
