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
  const text_input = document.getElementById("text-input");

  num++;
  console.log(num);
  alert(EvenOrOdd());
  line = text_input.value + "<li/>";
  console.log(line);
  new_list_item;
  text_input.value = "";
};
