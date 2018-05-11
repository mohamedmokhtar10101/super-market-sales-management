var data = new FormData();
var totalItems = 0;
var totalQuantity = 0;
var totalPrice = 0;
function addToData(id, quantity,tPrice)
{
    totalItems++;
    totalQuantity += quantity;
    totalPrice += tPrice;
    data.append(id,quantity);

}