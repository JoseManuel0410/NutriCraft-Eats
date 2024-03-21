function myFunction() {
    var x = document.getElementById("NavBar");
    if (x.className === "nav") {
      x.className += " responsive";
    } else {
      x.className = "nav";
    }
  }