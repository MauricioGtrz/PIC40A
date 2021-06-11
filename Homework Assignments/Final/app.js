function transform(file) {
  const x = new XMLHttpRequest();
  x.onreadystatechange = function () {
    if (this.status === 200 && this.readyState === 4) {
      alert(file);
      window.location = "convert.php?file=" + file;
    }
  };
  x.open("GET", "convert.php?file=" + file, true);
  x.send();
}
