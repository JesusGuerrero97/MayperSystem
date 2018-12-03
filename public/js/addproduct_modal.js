// Get the modal
var modalAdd= document.getElementById('ModAdd');

// Get the button that opens the modal
var add = document.getElementById('add');

// Get the <span> element that closes the modal
var spanadd = document.getElementsByClassName("closeadd")[0];

add.addEventListener('click',function(){
  modalAdd.style.display= "block";
});

// When the user clicks on <span> (x), close the modal
spanadd.onclick = function()
{
  modalAdd.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event)
{
  if(event.target == modalAdd)
  {
    modalAdd.style.display = "none";
  }
}
