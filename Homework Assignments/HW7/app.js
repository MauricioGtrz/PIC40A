//This will be used to control the pages on the site
let img = document.getElementsByClassName("img");

for (var i = 0; i < img.length; i++) {
  img[i].addEventListener("click", function () {
    alert("img click event listener worked!");
  });
}
