if (window.innerWidth < 768) {
  [].slice
    .call(document.querySelectorAll("[data-bss-disabled-mobile]"))
    .forEach(function (elem) {
      elem.classList.remove("animated");
      elem.removeAttribute("data-bss-hover-animate");
      elem.removeAttribute("data-aos");
      elem.removeAttribute("data-bss-parallax-bg");
      elem.removeAttribute("data-bss-scroll-zoom");
    });
}

document.addEventListener(
  "DOMContentLoaded",
  function () {
    if ("AOS" in window) {
      AOS.init();
    }
  },
  false
);

(function () {
  "use strict";
  const forms = document.querySelectorAll(".needs-validation");

  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add("was-validated");
      },
      false
    );
  });
})();
