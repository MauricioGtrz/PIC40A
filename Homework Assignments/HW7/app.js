let img = document.getElementsByTagName("img");
for (var i = 0; i < img.length; i++) {
  //add event listener to each img tag
  img[i].addEventListener("click", ajax);
}

//make ajax call to get file name and allow php photo download
function ajax(element) {
  let id = element.target.id;
  const x = new XMLHttpRequest();
  x.onreadystatechange = function () {
    if (this.status === 200 && this.readyState === 4) {
      window.location = "display.php?file=" + id;
    }
  };
  x.open("GET", "display.php?file=" + id, true);
  x.send();
}
