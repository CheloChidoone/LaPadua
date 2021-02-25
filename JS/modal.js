// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

$(".imgFilter").click(function(){
    var imagenactual = $(this).children().children();
    modal.style.display = "block";
    modalImg.src = imagenactual.attr("src");
    captionText.innerHTML = imagenactual.attr("alt");
});

// Get the <span> element that closes the modal 
var span = document.getElementsByClassName("close")[0];

var backmodal = document.getElementById("backmodal");

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}

backmodal.onclick = function() { 
  modal.style.display = "none";
}