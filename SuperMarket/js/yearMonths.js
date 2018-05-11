function getYearMonths(year) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                
            
           document.getElementById("salesMonth").innerHTML= xmlhttp.responseText;
    
        }
    }
         
        xmlhttp.open("POST", "controllers/getYearMonths_c.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("id="+year);
    
    }