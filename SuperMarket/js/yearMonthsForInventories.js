function getYearMonthsForInventories(year) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                
            
           document.getElementById("inventoriesMonth").innerHTML= xmlhttp.responseText;
    
        }
    }
         
        xmlhttp.open("POST", "controllers/getYearMonthsForInventories_c.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("id="+year);
    
    }