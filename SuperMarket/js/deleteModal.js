var modal = document.getElementById('displayer');
    var modalImg = document.getElementById("displayerContent");
    var captionText = document.getElementById("displayerCaption");
    var disItemsWrapper = document.getElementById("disItemsWrapper");
    var confirmModal = document.getElementById("confirmDeleteDisplayer");
    var confirmYes = document.getElementById("confirmYes");
    var confirmNo = document.getElementById("confirmNO");

if(document.getElementsByClassName("close")[0]){
var span = document.getElementsByClassName("close")[0];
span.onclick = function() { 
 modal.style.display = "none";
};
}
if(document.getElementsByClassName("close")[1]){
var span2 = document.getElementsByClassName("close")[1];
span2.onclick = function() { 
 confirmModal.style.display = "none";
};
}
if(confirmModal){
confirmModal.onclick = function() { 
    confirmModal.style.display = "none";
};
}
       document.onkeyup=function(e) {
     if (e.keyCode == 27) { // escape key maps to keycode `27`
       modal.style.display = "none";
       confirmModal.style.display="none";
    } };
    function displayConfirmModal(event,page)
    {
     confirmModal.style.display = "block";
    confirmYes.href = "?page=controllers/"+page+"&action=delete&id="+event.currentTarget.getAttribute('data-id')+"&confirm=Yes";


    }
    if(confirmNo){
    confirmNo.onclick = function() { 
    confirmModal.style.display = "none";
};
    }
  