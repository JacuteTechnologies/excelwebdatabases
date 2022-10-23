//client side library - no api key here
//use endpointInit and pass the url where your endpoint.php is configured
let endpoint;
function endpointInit(endpointURL) {
    endpoint = endpointURL;
}
function ewdRequest(mode, document, multi, cell, row, column, data){
    let xhttp = new XMLHttpRequest();
    let rc = false;
    let c = false;
    if(typeof row !== 'undefined' && typeof row !== 'int' && typeof column !== 'int' && typeof column !== 'undefined'){
        rc = true;
    }
    if(typeof cell !== 'undefined' && typeof cell !== 'int'){
        c = true;
    }
    if(rc && c){
        console.error("Error 9111: Both cell & row/column are set. The library is unable to determine whether the request is namedEWD or cellEWD. []");
        return "Error 9111: Both cell & row/column are set. The library is unable to determine whether the request is namedEWD or cellEWD. []";
    }
    else if(c || rc){
        if(typeof mode !== 'undefined'){
            if(mode == "r"){
                if(typeof document !== 'undefined'){
                    if(c && multi){
                        let url = endpoint + "?document=" + document + "&mode=" + mode + "&multi=" + multi + "&cell=" + cell;
                    }
                    else{
                        console.error("Error 9116: Multi not specified. [boolean]");
                        return "Error 9116: Multi not specified. [boolean]";
                    }
                    if(rc){
                        let url = endpoint + "?document=" + document + "&mode=" + mode + "&row=" + row + "&column=" + column;
                    }
                    xhttp.open("GET", url);
                    xhttp.onreadystatechange = function(){
                        if(this.readyState == 4 && this.status == 200){
                            return this.responseText;
                        }
                        else{
                            console.error("Error 9117: Request failed: Server responded with " + this.status);
                            return "Error 9117: Request failed: Server responded with " + this.status;
                        }
                    }
                    xhttp.send();
                }
                else{
                    console.error("Error 9115: Document not specified. [name.xlsx]");
                    return "Error 9115: Document not specified. [name.xlsx]";
                }
            }
            else if(mode == "w"){
                if(typeof document !== 'undefined'){
                    if(typeof data !== 'undefined'){
                        if(c && multi){
                            let url = endpoint + "?document=" + document + "&mode=" + mode + "&multi=" + multi + "&cell=" + cell + "&data=" + data;
                        }
                        else{
                            console.error("Error 9116: Multi not specified. [boolean]");
                            return "Error 9116: Multi not specified. [boolean]";
                        }
                        if(rc){
                            let url = endpoint + "?document=" + document + "&mode=" + mode + "&row=" + row + "&column=" + column + "&data=" + data;
                        }
                        xhttp.open("GET", url);
                        xhttp.onreadystatechange = function(){
                            if(this.readyState == 4 && this.status == 200){
                                return this.responseText;
                            }
                            else{
                                console.error("Error 9117: Request failed: Server responded with " + this.status);
                                return "Error 9117: Request failed: Server responded with " + this.status;
                            }
                        }
                        xhttp.send();
                    }
                    else{
                        console.error("Error 9118: Data for write request not specified.");
                        return "Error 9118: Data for write request not specified.";
                    }
                }
                else{
                    console.error("Error 9115: Document not specified. [name.xlsx]");
                    return "Error 9115: Document not specified. [name.xlsx]";
                }
            }
            else{
                console.error("Error 9114: Mode is invalid. Mode must be [r/w].");
                return "Error 9114: Mode is invalid. Mode must be [r/w].";
            }
        }
        else{
            console.error("Error 9113: Mode is not set. Mode is required. [r/w]");
            return "Error 9113: Mode is not set. Mode is required. [r/w]";
        }
    }
    else{
        console.error("Error 9112: Neither cell nor row/column are set. Cell or row/column is required. [cell/names]");
        return "Error 9112: Neither cell nor row/column are set. Cell or row/column is required. [cell/names]";
    }
}