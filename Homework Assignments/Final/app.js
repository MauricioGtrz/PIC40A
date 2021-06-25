/**This function sets an ajax call and validates that the inputed file exists on the server and 
downloads it if it exists. Otherwise it throws an error.
@param string file the file the user entered
*/
function transform(file) {
  const x = new XMLHttpRequest();
  x.onreadystatechange = function () {
    if (this.status === 200 && this.readyState === 4) {
      if (this.responseText === "1") {
        // if successful
        window.location = "download.php?file=" + file;
      }
    }
  };
  x.open("GET", "check_file.php?file=" + file, true);
  x.send();
}
