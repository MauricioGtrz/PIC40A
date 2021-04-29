let num = 0;

document.getElementById("button").onclick = () => {
  num++;
  alert(num);
  document.getElementById("text-input").value = "";
};
