const search = document.getElementById("search-toggle");
const back = document.getElementById("back");
const targetDiv = document.getElementById("bar-div");
const targetStyle = getComputedStyle(targetDiv);
const targetDisplay = targetStyle.getPropertyValue("display");

back.onclick = function () {
  if (targetDisplay === "flex") {
    targetDiv.classList.remove("showSearchBar");
  }
};

search.onclick = function () {
  if (targetDisplay === "flex") {
    targetDiv.classList.add("showSearchBar");
  }
};

let nav = document.querySelector(".nav");
let close = document.querySelector(".close");
let navbar = document.querySelector(".showNavbar");

nav.onclick = function () {
  nav.classList.add("hide");
  navbar.classList.add("show");
  close.classList.remove("hide");
};

close.onclick = function () {
  close.classList.add("hide");
  navbar.classList.remove("show");
  nav.classList.remove("hide");
};


function clockTick() {
  var currentTime = new Date(),
      month = currentTime.getMonth() + 1,
      day = currentTime.getDate(),
      year = currentTime.getFullYear(),
      hours = (currentTime.getHours() + 24) % 12 || 12,
      minutes = currentTime.getMinutes(),
      seconds = currentTime.getSeconds(),
      text = (month + "/" + day + "/" + year + ' ' + hours + ':' + minutes + ':' + seconds);
  // here we get the element with the id of "date" and change the content to the text variable we made above
  document.getElementById('ct7').innerHTML = text;
}

// here we run the clockTick function every 1000ms (1 second)
setInterval(clockTick, 1000);