(function() {
  var open_btn = document.querySelector(".main-nav__toggle");
  var menu = document.querySelector(".nav-list");
  var close = document.querySelector(".main-nav__toggle--close");

  open_btn.addEventListener("click", function(event) {
    event.preventDefault();
    if (menu.classList.contain("nav-list--close") {
        menu.classList.add("nav-list--close");
  } else {
    !menu.classList.add("nav-list--close");
    open_btn.classList.add("main-nav__toggle--close");
  }
});

close.addEventListener("click", function(event) {
  event.preventDefault();
  menu.classList.remove("nav-list--close");
  open_btn.classList.remove("main-nav__toggle--close");
});
})();
