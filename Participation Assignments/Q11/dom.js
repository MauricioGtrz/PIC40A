let num = 0;

function EvenOrOdd() {
  if (num % 2 === 0) {
    return "Even";
  } else return "Odd";
}

const button = document.getElementById("button");

button.onclick = () => {
  let line = "<li/>";

  const ordered_list = document.getElementById("list");
  const new_list_item = (ordered_list.innerHTML += line);

  num++;
  console.log(num);
  alert(EvenOrOdd());
  document.getElementById("text-input").value = "";
  ordered_list.appendChild(new_list_item);
};
