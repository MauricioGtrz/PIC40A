let num = 0;

function EvenOrOdd() {
  if (num % 2 === 0) {
    return num - 1;
  } else return;
}

const button = document.getElementById("button");

button.onclick = () => {
  let line = "";

  const ordered_list = document.getElementById("list");
  const text_input = document.getElementById("text-input");

  num++;
  line = "<li/>" + text_input.value;
  ordered_list.innerHTML += line;
  text_input.value = "";

  document
    .getElementsByTagName("li")
    [EvenOrOdd()].setAttribute("class", "even");
};
