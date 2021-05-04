alert("This is a JavaScript calculator");

document.getElementById("compute").addEventListener("click", function () {
  let first_value = document.getElementById("first-value").value;
  let second_value = document.getElementById("second-value").value;

  function set_result(x) {
    document.getElementById("result").innerHTML = x;
  }
  result = "no";
  let add = document.getElementById("add");
  let subtract = document.getElementById("subtract");
  let multiply = document.getElementById("multiply");
  let divide = document.getElementById("divide");

  if (add.checked === true) {
    set_result(first_value * 1 + second_value * 1);
  } else if (subtract.checked === true) {
    set_result(first_value * 1 - second_value * 1);
  } else if (multiply.checked === true) {
    set_result(first_value * 1 * (second_value * 1));
  } else if (divide.checked === true) {
    set_result((first_value * 1) / (second_value * 1));
  } else {
    alert("Something went terribly wrong!");
  }
});
