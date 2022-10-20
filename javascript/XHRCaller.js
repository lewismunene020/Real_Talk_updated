function  XHRCaller(data, route , callBack=null , method="POST"){
    let  xhr = new  XMLHttpRequest();
    xhr.open(method , route ,true);
    xhr.onload = function(){
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                if(callBack !== null){
                    callBack(xhr.responseText)
                }
            }
        }
    }
    xhr.send(data);
}


export{XHRCaller}