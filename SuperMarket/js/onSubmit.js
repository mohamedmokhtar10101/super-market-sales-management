var myForm1 = document.getElementById("makeOrder");
var myForm2 = document.getElementById("makeInventoryCheck");
var myForm;
if (myForm1)
    myForm = myForm1;
else if (myForm2)
    myForm = myForm2;

if (myForm)
    myForm.addEventListener("submit", onSubmit);

function onSubmit()
{
    for (var pair of data.entries())
    {
        if(pair[1] == 0 && myForm1)
            continue;
        var item = document.createElement("input");
        item.setAttribute("type", "hidden");
        item.setAttribute("name", pair[0]);
        item.setAttribute("value", pair[1]);
        myForm.appendChild(item);
    }
}