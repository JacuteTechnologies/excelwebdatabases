//client side library - no api key here
//use endpointInit and pass the url where your endpoint.php is configured
let endpoint;
function endpointInit(endpointURL){
    endpoint = endpointURL;
}
<<<<<<< HEAD
// ugly frickin ass js code screw you James
// james literally from 1700's fr
function ewdRequest(mode, document, multi, cell, data) {
    let req = new XMLHttpRequest();
=======
// ugly ass js code ew so 1700 wth is this ew yucky desGUSTANG

function ewdRequest(mode, document, multi, cell, data){
    let xhttp = new XMLHttpRequest();
    let url = endpoint + "?mode=" + mode + "&document=" + document + "&multi=" + multi + "&cell=" + cell + "&data=" + data;
    xhttp.open("GET", url);
    xhttp.onreadystatechange = function(){
    const req = new XMLHttpRequest();
>>>>>>> 6658e4083df295d35523e89c6a281908c924e794
    let url = endpoint + "?mode=" + mode + "&document=" + document + "&multi=" + multi + "&cell=" + cell + "&data=" + data;
    req.open("GET", url);
    req.onreadystatechange = function () {
        const req = new XMLHttpRequest();
        let url = endpoint + "?mode=" + mode + "&document=" + document + "&multi=" + multi + "&cell=" + cell + "&data=" + data;
        req.open("GET", url);
        req.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                console.log("Request response:" + this.responseText);
                return this.responseText;
            } else {
                console.log("Request failed.");
                return "Request failed";
            }
        }
    }
}