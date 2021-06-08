let img = document.getElementsByTagName("img");
for (var i = 0; i < img.length; i++) {
  img[i].addEventListener("click", ajax);
}
// function getId(e) {
//   alert(e.target.id);
// }

function ajax(element) {
  let id = element.target.id;
  const x = new XMLHttpRequest();
  x.onreadystatechange = function () {
    if (this.status === 200 && this.readyState === 4) {
      //alert("test");
      //alert(this.responseText);
      //   if (this.responseText === "1") {
      //     // if successful
      //     window.location = "display.php?file=" + id;
      //   }
      window.location = "display.php?file=" + id;
    }
  };
  x.open("GET", "display.php?file=" + id, true);
  x.send();
}

// function submitId(x) {
//   let id = x.target.id;

//   // form to use post to redirect user
//   const form = document.createElement("form");
//   form.method = "post";
//   form.action = "<?php echo $_SERVER['PHP_SELF']; ?>";

//   // add data to a hidden element
//   const data = document.createElement("input");
//   data.type = "hidden";
//   data.value = id;
//   data.name = "id";
//   form.appendChild(data);

//   // add to body and submit
//   const b = document.getElementsByTagName("body")[0];
//   b.appendChild(form);
//   form.submit();
// }

// document.getElementById("red").addEventListener("click", () => {
//   redirect("red");
// });

// document.getElementById("green").addEventListener("click", () => {
//   redirect("green");
// });
