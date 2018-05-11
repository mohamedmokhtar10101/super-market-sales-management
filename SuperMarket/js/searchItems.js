var SellQuantity = document.getElementById("quantity");
var message = document.getElementById("message");
var itemTable = document.getElementById("itemTable");
var dataRow = document.getElementById("itemData");
if(dataRow)
    dataRow = dataRow.children;
    function itemInfo(id) {
         message.innerHTML="";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                
                 if(xmlhttp.responseText!="")
            {
                 var arr = xmlhttp.responseText.split(",");
                  SellQuantity.setAttribute("max",arr[5]);
                  
               SellQuantity.setAttribute("value",arr[5]);
             
               var j = 0;
               for(var i = 0; i < 7; i++)
               {
                   if(i == 3)
                       continue;
                    dataRow[j++].innerHTML = arr[i];
               }  
               dataRow[j].children[0].src = arr[i];
               itemTable.style.display ="block";
            }
            else
                itemTable.style.display ="none";
              
                  
            }
        }
         
        xmlhttp.open("POST", "controllers/getItemInfo.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

        xmlhttp.send("id="+id);
    
}
