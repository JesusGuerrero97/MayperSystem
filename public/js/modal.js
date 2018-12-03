// Get the modal
var modal = document.getElementById('myModal');
var modalAdd= document.getElementById('ModAdd');

// Get the button that opens the modal
var div = document.getElementById("mynotification");
var add = document.getElementById('add');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var spanadd = document.getElementsByClassName("closeadd")[0];

div.addEventListener('click', function(){
  modal.style.display = "block";
});

add.addEventListener('click',function(){
  modalAdd.style.display= "block";
});

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

spanadd.onclick = function()
{
  modalAdd.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

window.onclick = function(event)
{
  if(event.target == modalAdd)
  {
    modalAdd.style.display = "none";
  }
}
