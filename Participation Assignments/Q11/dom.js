let num = 0;

function EvenOrOdd() {
  if (num % 2 === 0) {
    return "Even";
  } else return "Odd";
}

const button = document.getElementById("button");

button.onclick = () => {
  let line = "";

  const ordered_list = document.getElementById("list");
  const text_input = document.getElementById("text-input");

  num++;
  console.log(num);
  alert(EvenOrOdd());
  line = "<li/>" + text_input.value;
  console.log(line);
  ordered_list.innerHTML += line;
  text_input.value = "";
};
