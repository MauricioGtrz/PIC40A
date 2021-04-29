let num = 0;

function EvenOrOdd() {
  if (num % 2 === 0) {
    return "Even";
  } else return "Odd";
}

document.getElementById("button").onclick = () => {
  num++;
  console.log(num);
  alert(EvenOrOdd());
  document.getElementById("text-input").value = "";
  document.getElementById("list").appendChild(document.createElement("li"));
};
