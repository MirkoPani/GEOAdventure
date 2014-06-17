$(document).ready(function () {
    $("#avatar").imagepicker({
        hide_select: true
    });
var $container = $('.image_picker_selector');
    // initialize
    $container.imagesLoaded(function () {
        $container.masonry({
            columnWidth: 30,
            itemSelector: '.thumbnail'
        });
    });
});


function CheckPassword()
{

 var a=document.getElementById("pass").value;
 var b=document.getElementById("confirmpass").value;
  if(!(a==b))
  {
    alert("Attenzione! Le password non corrispondono!");
    return false;
  }
  return true;
    
    
}