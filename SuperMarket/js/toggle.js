function toggle(x) 
{
    x.classList.toggle("change");
}
$(document).ready(function(){

    $(".toggle").click(function(){
    $("#navMenu").slideToggle("slow");
  });

  $("#toggledMenu").click(function(){
    $("#toggledMenu .subMenu").slideToggle("slow");});
$("#toggledMenu2").click(function(){
    $("#toggledMenu2 .subMenu").slideToggle("slow");});
});