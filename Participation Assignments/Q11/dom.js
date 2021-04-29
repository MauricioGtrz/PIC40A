let num = 0; //number keeps track how many times the button has been pressed

// Keeps track of whether the current button click was odd or even
function EvenOrOdd() {
  if (num % 2 === 0) {
    return num - 1;
  } else return;
}

const button = document.getElementById("button"); //selects button with its ID

// onclick event controls the list that is displayed
button.onclick = () => {
  let line = ""; //set the like variable to empty

  const ordered_list = document.getElementById("list"); //selects ordered list with its ID
  const text_input = document.getElementById("text-input"); //selects the text input by its ID

  num++; //adds +1 to the variable for each onclick event
  line = "<li/>" + text_input.value; //sets the line equal to a new list item with the text input inline
  ordered_list.innerHTML += line; //adds new list item to the ordered list
  text_input.value = ""; //clears the input text

  //add styling to every even entry in the ordered list
  document
    .getElementsByTagName("li")
    [EvenOrOdd()].setAttribute("class", "even");
};
