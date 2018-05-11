if (document.getElementById("itemsTable")) {
    var itemsTable = document.getElementById("itemsTable").querySelectorAll("tbody tr");
    var itemsFooter = document.getElementById("itemsTable").querySelectorAll("tfoot tr");
}
function filter(event, count, indexes1, indexes2, trs, footer)
{
    
    var total = [];
    for (var j = 0; j < count; j++)
        total[j] = 0;
    for (var i = 0; i < trs.length; i++)
    {
        trs[i].style.display = "table-row";
    }
    var q = event.currentTarget.value;
    q = q.toLowerCase();
    for (var i = 0; i < trs.length; i++)
    {
       if(trs[i].children.length == 0)
           continue;
        name = trs[i].children[0].innerHTML;
        name = name.toLowerCase();
        len = name.length;
        pos = name.search(q.substr(0, len));
        if (pos == -1)
        {

            trs[i].style.display = "none";
        } else
        {

            incrementTotal(total, indexes1, trs, i);
        }


    }
    setTotal(total, indexes2, footer);


}
function setTotal(total, indexes, footer)
{

    footer[0].children[0].innerHTML = "Total " + total[0];
    for (var i = 1; i < indexes.length; i++)
    {

        footer[0].children[indexes[i]].innerHTML = total[i];
    }
}
function incrementTotal(total, indexes, trs, i)
{
    total[0]++;
    for (var j = 0; j < indexes.length; j++)
    {

        total[j + 1] += Number(trs[i].children[indexes[j]].innerHTML);
    }
}