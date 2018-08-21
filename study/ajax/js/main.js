
function getXmlHttp(){
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }else{
        //IE6, IE5浏览器
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xmlhttp;
}

function showHint(str){

    if(str.length == 0){
        document.getElementById("txtHint").innerHTML="";
        return;
    }

    xmlhttp = getXmlHttp();

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
        }
    }

    xmlhttp.open("GET", "ajax.php?name=" + str, true);
    xmlhttp.send();
}

function showSites(str){
    if(str == ""){
        document.getElementById("txtWeb").innerHTML="";
        return;
    }

    xmlhttp = getXmlHttp();

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("txtWeb").innerHTML = xmlhttp.responseText;
        }
    }

    xmlhttp.open("GET", "mysql_ajax.php?name=" + str, true);
    xmlhttp.send();

}
