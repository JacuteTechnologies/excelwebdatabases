//client side library - no api key here
//use endpointInit and pass the url where your endpoint.php is configured
let endpoint;
function endpointInit(endpointURL){
    endpoint = endpointURL;
}
// ugly ass js code ew so 1700 wth is this ew yucky desGUSTANG

function ewdRequest(mode, document, multi, cell, data){
<<<<<<< HEAD
    let xhttp = new XMLHttpRequest();
    let url = endpoint + "?mode=" + mode + "&document=" + document + "&multi=" + multi + "&cell=" + cell + "&data=" + data;
    xhttp.open("GET", url);
    xhttp.onreadystatechange = function(){
=======
    const req = new XMLHttpRequest();
    let url = endpoint + "?mode=" + mode + "&document=" + document + "&multi=" + multi + "&cell=" + cell + "&data=" + data;
    req.open("GET", url);
    req.onreadystatechange = function() {
>>>>>>> e4d822da447a222e26760258e719f718fa311fdf
        if(this.readyState == 4 && this.status == 200){
            console.log("Request response:" + this.responseText);
            return this.responseText;
        }
        else {
            console.log("Request failed.");
            return "Request failed";
        }
    }
}