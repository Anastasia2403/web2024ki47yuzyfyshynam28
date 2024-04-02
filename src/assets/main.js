function loadDoc() {
  let xhttp = new XMLHttpRequest();

  // Define the function to handle the response
  xhttp.onreadystatechange = function () {
    if (this.readyState === 4) {
      document.getElementById("demo").innerHTML = this.responseText;
    }
  };

  // Send the request
  xhttp.open("GET", "../src/api/get_content.php", true);
  xhttp.send();
}
