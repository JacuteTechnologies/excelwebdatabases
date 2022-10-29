let endpoint;
function initializeEndpoint(url){
    endpoint = url;
    console.log("[EWDv2.js]: Endpoint successfully initalized.");
}
function ewdRequest(document, mode, isMulti, cellParameterOne, cellParameterTwo, data){
    let xhttp = new XMLHttpRequest();
    let target = url + "?document=" + document + "&mode=" + mode + "&isMulti=" + isMulti;
    if(cellParameterTwo == 0){
        //request is cellEWD
        target = target + "&cell=" + cellParameterOne;
    }
    else{
        //request is namedEWD
        target = target + "&row=" + cellParameterOne + "&column=" + cellParameterTwo;
    }
    if(mode == "w"){
        target = target + "&data=" + data;
    }
    xhttp.open("GET", target);
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            return this.responseText;
        }
    }
    xhttp.send();
}