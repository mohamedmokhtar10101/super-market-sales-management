var SellQuantity = document.getElementById("quantity");
var message = document.getElementById("message");
var order = document.getElementById("orderItems");
var totalI = document.getElementById("totalItems");
var totalQ = document.getElementById("totalQuantity");
var totalP = document.getElementById("totalPrice");
if (order)
    var rows = order.children;
//var totalItems = 0;
//var totalQuantity = 0;
//var totalPrice = 0;
//var data = new FormData();
function addItem(id) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            if (xmlhttp.responseText != "")
            {
                var arr = xmlhttp.responseText.split(",");

                var quantity = parseInt(SellQuantity.value);
                if (quantity <= 0)
                {
                    message.innerHTML = "<span class='error'> invalid quantity</span>";

                } else if (parseFloat(quantity) > parseFloat(arr[5]))
                {
                    message.innerHTML = "<span class='error'>the quantity is big</span>";
                } else if (data.has(id) && (parseFloat(data.get(id)) + parseFloat(quantity)) > parseFloat(arr[5]))
                {
                    message.innerHTML = "<span class='error'>the quantity is big</span>";
                } else if (data.has(id) && parseFloat(data.get(id)) != 0 && (parseFloat(data.get(id)) + parseFloat(quantity)) <= parseFloat(arr[5]))
                {
                    data.set(id, parseFloat(data.get(id)) + parseFloat(quantity));
                    for (var i = 0; i < rows.length; i++)
                    {
                        var id2 = rows[i].children[0].innerHTML;
                        if (id == id2)
                        {

                            rows[i].children[3].innerHTML = data.get(id);
                            rows[i].children[6].innerHTML = (parseFloat(arr[4]) - parseFloat(arr[6]) * parseFloat(arr[4]) / 100) * (parseFloat(data.get(id)));
                            totalQuantity += quantity;
                            totalPrice += (parseFloat(arr[4]) - parseFloat(arr[6]) * parseFloat(arr[4]) / 100) * quantity;
                            totalP.innerHTML = totalPrice;
                            totalQ.innerHTML = totalQuantity;
                        }
                    }
                } else
                {

                    totalItems++;
                    totalQuantity += quantity;

                    var tr = document.createElement("tr");
 
                    for (var i = 0; i < 5; i++)
                    {
                        var td = document.createElement("td");
                        tr.appendChild(td);
                        if (i == 3 || i == 5)
                        {
                            if (i == 3)
                                td.innerHTML = quantity;
                            continue;
                        }


                        td.innerHTML = arr[i];


                    }
                    var td = document.createElement("td");
                    tr.appendChild(td);
                    td.innerHTML = arr[6];
                    td = document.createElement("td");
                    tr.appendChild(td);
                    td.innerHTML = (parseFloat(arr[4]) - parseFloat(arr[6]) * parseFloat(arr[4]) / 100) * quantity;
                    totalPrice += parseFloat(td.innerHTML);
                    td = document.createElement("td");
                    var img = document.createElement("img");
                    img.setAttribute("id", "itemImageT");
                    img.setAttribute("src", arr[7]);
                    td.appendChild(img);
                    tr.appendChild(td);
                    td = document.createElement("td");
                    td.appendChild(createLink(id));
                    tr.appendChild(td);

                    order.appendChild(tr);
                    totalI.innerHTML = "Total " + totalItems + " items";
                    ;
                    totalP.innerHTML = totalPrice;
                    totalQ.innerHTML = totalQuantity;
                    if (!data.has(id))
                        data.append(id, quantity);
                    else
                        data.set(id, quantity);

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
function createLink(id)
{
    var img = document.createElement("img");
    img.setAttribute("src", "delete.png");
    var link = document.createElement("a");
    link.setAttribute("id", "deleteAction");
    link.setAttribute("class", "action");
    link.setAttribute("title", "delete this item");
    link.setAttribute("style", "cursor:pointer");
    link.setAttribute("data-id", id);
    link.setAttribute("onclick", "delete_row(this)");
    link.appendChild(img);
    return link;

}
function delete_row(e)
{
    var tr = e.parentNode.parentNode.children;
    var quantity = tr[3].innerHTML;
    var price = tr[6].innerHTML;
    var id = tr[0].innerHTML;

    if (data.has(id))
      //  data.set(id, 0);
          data.delete(id);
    totalItems--;
    totalQuantity -= parseFloat(quantity);
    totalPrice -= parseFloat(price);
    totalI.innerHTML = "Total " + totalItems + " items";
    ;
    totalP.innerHTML = totalPrice;
    totalQ.innerHTML = totalQuantity;
    e.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode);
}