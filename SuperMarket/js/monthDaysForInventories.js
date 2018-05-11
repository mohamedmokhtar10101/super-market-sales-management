
function getMonthDaysForInventories(month) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {


            document.getElementById("inventoriesDay").innerHTML = xmlhttp.responseText;

        }
    }

    xmlhttp.open("POST", "controllers/getMonthDaysForInventories_c.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("m=" + month + "&y=" + document.getElementById("inventoriesYear").value);

}