// Accepts a url and a callback function to run.  
function requestCrossDomain( site, callback ) {  
      
    // If no url was passed, exit.  
    if ( !site ) {  
        alert('No site was passed.');  
        return false;  
    }  
    console.log("From the function: "+site)  
    // Take the provided url, and add it to a YQL query. Make sure you encode it!  
    var yql = 'http://query.yahooapis.com/v1/public/yql?q=' + encodeURIComponent('select * from html where url="' + site + '"') + '&format=json&callback=?';  
    console.log("from the yql: " + yql);  
    // Request that YSQL string, and run a callback function.  
    // Pass a defined function to prevent cache-busting.  
    $.getJSON( yql, cbFunc );  
      
    function cbFunc(data) {  
    
        console.log(data);
        
        if ( typeof callback === 'function') {  
            callback(data);  
        }  
    
    }  
}  