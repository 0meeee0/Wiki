let search_input = document.getElementById("search");

let wikis = document.querySelectorAll(".wikis");

search_input.addEventListener("input", function () {
  let myRequest = new XMLHttpRequest();
  myRequest.open("GET", "css/ajax.php?search=" + search_input.value, true);
  myRequest.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      if (this.responseText.trim() !== "") {
        let unique = JSON.parse(this.responseText);
        wikis.forEach(function (wiki) {
          if (!unique.includes(Number(wiki.id))) {
            wiki.style.display = "none";
          } else {
            wiki.style.display = "block";
          }
        });
      } else {
        wikis.forEach(function (wiki) {
          wiki.style.display = "block";
        });
      }
    }
};
myRequest.send();
});
