var SellQuantity = document.getElementById("quantity");
var message = document.getElementById("message");
var inventory = document.getElementById("inventoryItems");
var totalI = document.getElementById("totalItems");
var totalQ = document.getElementById("totalQuantity");
var totalP = document.getElementById("totalPrice");
if (inventory)
    var rows = inventory.children;
//var totalItems = 0;
//var totalQuantity = 0;
//var totalPrice = 0;
//var data = new FormData();
function addItemToInventory(id) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            if (xmlhttp.responseText != "")
            {
                var arr = xmlhttp.responseText.split(",");

                var quantity = parseInt(SellQuantity.value);
                if (quantity < 0)
                {
                    message.innerHTML = "<span class='error'> invalid quantity</span>";

                } else {
                    if (data.has(id) && parseFloat(data.get(id)) != 0)
                    {
                        data.set(id, parseFloat(data.get(id)) + parseFloat(quantity));
                        for (var i = 0; i < rows.length; i++)
                        {
                            var id2 = rows[i].children[0].innerHTML;
                            if (id == id2)
                                rows[i].children[1].innerHTML = data.get(id);


                        }
                    } else
                    {
                        var tr = document.createElement("tr");

                        var td = document.createElement("td");
                        tr.appendChild(td);
                        td.innerHTML = id;
                        td = document.createElement("td");
                        tr.appendChild(td);
                        td.innerHTML = quantity;
                        td = document.createElement("td");
                        td.appendChild(createLinkForInventory(id));
                        tr.appendChild(td);
                        inventory.appendChild(tr);
                        if (!data.has(id))
                            data.append(id, quantity);
                        else
                            data.set(id, quantity);

                        totalItems++;
                    }


                    totalQuantity += quantity;
                    totalI.innerHTML = "Total " + totalItems + " items";
                    totalQ.innerHTML = totalQuantity;




                }


            } else
            {
                message.innerHTML = "<span class='error'> this item doesn't exist</span>"
            }
        }

    }

    xmlhttp.open("POST", "controllers/getItemInfo.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id=" + id);

}
function createLinkForInventory(id)
{
    var img = document.createElement("img");
    img.setAttribute("src", "delete.png");
    var link = document.createElement("a");
    link.setAttribute("id", "deleteAction");
    link.setAttribute("class", "action");
    link.setAttribute("title", "delete this item");
    link.setAttribute("style", "cursor:pointer");
    link.setAttribute("data-id", id);
    link.setAttribute("onclick", "delete_row_fromInventory(this)");
    link.appendChild(img);
    return link;

}
function delete_row_fromInventory(e)
{
    var tr = e.parentNode.parentNode.children;
    var quantity = tr[1].innerHTML;
    var id = tr[0].innerHTML;

    if (data.has(id))
        //   data.set(id, 0);
        data.delete(id);
    totalItems--;
    totalQuantity -= parseFloat(quantity);
    totalI.innerHTML = "Total " + totalItems + " items";
    totalQ.innerHTML = totalQuantity;
    e.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode);
}