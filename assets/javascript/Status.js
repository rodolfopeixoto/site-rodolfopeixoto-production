class Status {
    checkSistem(){
       let xhr       = new XMLHttpRequest();
       let idStatus  = document.querySelector("#status");
       let url       = "http://rogpe.me/";

       xhr.open("GET",url),true;
       xhr.setRequestHeader( 'Access-Control-Allow-Origin', '*');
       xhr.send();

console.log("Status code " + xhr.status);

       if(xhr.status === 200){
         console.log('Sucesso');
       }
    }
}