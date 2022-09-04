//client side library - no api key here
//use endpointInit and pass the url where your endpoint.php is configured
let endpoint;
function endpointInit(endpointURL){
    endpoint = endpointURL;
}
function ewdRequest(mode, document, multi, cell, data){
    let xhttp = new XMLHttpRequest();
    let url = endpoint + "?mode=" + mode + "&document=" + document + "&multi=" + multi + "&cell=" + cell + "&data=" + data;
    xhttp.open("GET", url);
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log("Request response:" + this.responseText);
            return this.responseText;
        }
        else{
            console.log("Request failed.");
            return "Request failed";
        }
    }
}