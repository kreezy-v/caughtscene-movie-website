let nav = document.querySelector(".mob-nav");
var delay = (function () {
  var timer = 0;
  return function (callback, ms) {
    clearTimeout(timer);
    timer = setTimeout(callback, ms);
  };
})();
nav.querySelectorAll("li a:last-child").forEach((a, i) => {
  a.onclick = (e) => {
    let nav_indicator = nav.querySelector(".mob-nav-indicator");
    let tv_nav = nav.querySelectorAll(".tv-drop");
    let mov_nav = nav.querySelectorAll(".movies-drop");

    nav.querySelectorAll("li a").forEach((el) => {
      el.classList.remove("mob-nav-item-active");
    });

    a.classList.add("mob-nav-item-active");

    nav_indicator.style.left = `calc(${i * 70 + 40}px - 25px)`;
    if (a.classList.contains("movies-nav") || a.classList.contains("tv-nav")) {
      if (a.classList.contains("movies-nav")) {
        nav_indicator.style.top = "-150px";
        nav_indicator.style.height = "200px";
        nav_indicator.style.borderRadius = "20%";
        tv_nav.forEach((el) => {
          el.style.display = "none";
        });
        mov_nav.forEach((el) => {
          el.style.display = "block";
        });
        document.querySelector(".tv-nav").classList.remove("close-sub");
      } else if (a.classList.contains("tv-nav")) {
        nav_indicator.style.top = "-150px";
        nav_indicator.style.height = "200px";
        nav_indicator.style.borderRadius = "20%";
        tv_nav.forEach((el) => {
          el.style.display = "block";
        });
        mov_nav.forEach((el) => {
          el.style.display = "none";
        });
        document.querySelector(".movies-nav").classList.remove("close-sub");
      }
      if (a.classList.contains("close-sub")) {
        nav_indicator.style.top = "-35px";
        nav_indicator.style.height = "90px";
        nav_indicator.style.borderRadius = "50%";
        tv_nav.forEach((el) => {
          el.style.display = "none";
        });
        mov_nav.forEach((el) => {
          el.style.display = "none";
        });
        a.classList.remove("close-sub");
      } else a.classList.add("close-sub");
    } else {
      nav_indicator.style.top = "-35px";
      nav_indicator.style.height = "90px";
      nav_indicator.style.borderRadius = "50%";
      tv_nav.forEach((el) => {
        el.style.display = "none";
      });
      mov_nav.forEach((el) => {
        el.style.display = "none";
      });
      document.querySelector(".movies-nav").classList.remove("close-sub");
      document.querySelector(".tv-nav").classList.remove("close-sub");
      if (a.classList.contains("home")) {
        delay(function () {
          window.location.href = "/home";
        }, 250);
      } else if (a.classList.contains("faq")) {
        delay(function () {
          window.location.href = "/faq";
        }, 250);
      } else if (a.classList.contains("contact")) {
        delay(function () {
          // window.location.href = "/contact";
          toastr.warning("CONTACT NOT YET AVAILABLE!");
        }, 250);
      }
    }
  };
});
let themeToggle = document.getElementById("theme-toggle");
let themeToggleMob = document.getElementById("theme-toggleMob");
function initTheme() {
  null !== localStorage.getItem("data-theme") &&
  "dark" === localStorage.getItem("data-theme")
    ? (document.body.setAttribute("data-theme", "dark"),
      themeToggle.classList.replace("fa-moon", "fa-sun"),
      themeToggleMob.classList.replace("fa-moon", "fa-sun"))
    : (document.body.removeAttribute("data-theme"),
      themeToggle.classList.replace("fa-sun", "fa-moon"),
      themeToggleMob.classList.replace("fa-sun", "fa-moon"));
}
function resetTheme() {
  document.body.hasAttribute("data-theme")
    ? (themeToggle.classList.replace("fa-sun", "fa-moon"),
      themeToggleMob.classList.replace("fa-sun", "fa-moon"),
      (themeToggle.style.transform = "rotateZ(-360deg)"),
      (themeToggle.style.transition = "all 0.5s ease"),
      (themeToggleMob.style.transform = "rotateZ(-360deg)"),
      (themeToggleMob.style.transition = "all 0.5s ease"),
      document.body.removeAttribute("data-theme"),
      localStorage.removeItem("data-theme"))
    : (themeToggle.classList.replace("fa-moon", "fa-sun"),
      themeToggleMob.classList.replace("fa-moon", "fa-sun"),
      (themeToggle.style.transform = "rotateZ(0deg)"),
      (themeToggle.style.transition = "all 0.5s ease"),
      (themeToggleMob.style.transform = "rotateZ(0deg)"),
      (themeToggleMob.style.transition = "all 0.5s ease"),
      document.body.setAttribute("data-theme", "dark"),
      localStorage.setItem("data-theme", "dark"));
}
initTheme(),
  themeToggle.addEventListener("click", () => {
    resetTheme();
  }),
  themeToggleMob.addEventListener("click", () => {
    resetTheme();
  });
document.addEventListener("DOMContentLoaded", function () {
  // make it as accordion for smaller screens
  if (window.innerWidth > 992) {
    document
      .querySelectorAll(".navbar .nav-item")
      .forEach(function (everyitem) {
        everyitem.addEventListener("mouseover", function (e) {
          let el_link = this.querySelector("a[data-bs-toggle]");

          if (el_link != null) {
            let nextEl = el_link.nextElementSibling;
            el_link.classList.add("show");
            nextEl.classList.add("show");
          }
        });
        everyitem.addEventListener("mouseleave", function (e) {
          let el_link = this.querySelector("a[data-bs-toggle]");

          if (el_link != null) {
            let nextEl = el_link.nextElementSibling;
            el_link.classList.remove("show");
            nextEl.classList.remove("show");
          }
        });
      });
  }
  // end if innerWidth
});
// DOMContentLoaded  end
$(".toggle-password").click(function () {
  $(this).toggleClass("fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
$(".toggle-Regpassword").click(function () {
  $(this).toggleClass("fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
$(".toggle-confirm").click(function () {
  $(this).toggleClass("fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
$("#Regpassword-field, #confirm-field").on("keyup", function () {
  if ($("#Regpassword-field").val() == "" || $(" #confirm-field").val() == "") {
    $("#not-match").css("display", "none");
  } else {
    $("#not-match").css("display", "block");
    if ($("#Regpassword-field").val() == $(" #confirm-field").val()) {
      $("#not-match")
        .html("Password Matched.")
        .removeClass("alert-danger")
        .addClass("alert-success");
      $("#signup-btn").prop("disabled", false);
    } else {
      $("#not-match")
        .html("Password does not Match.")
        .removeClass("alert-success")
        .addClass("alert-danger");
      $("#signup-btn").prop("disabled", true);
    }
  }
});
$(".login-form").submit(function (event) {
  var recaptcha = $("#g-recaptcha-response").val();
  if (recaptcha === "") {
    event.preventDefault();
    toastr.warning("Verify that you are not a robot");
  }
});

$(".signup-form").submit(function (event) {
  var recaptcha = $("#g-recaptcha-response-1").val();
  if (recaptcha === "") {
    event.preventDefault();
    toastr.warning("Verify that you are not a robot");
  }
});
function watchList() {
  toastr.error("You need to Login First!");
  $("#loginModal").modal("show");
}
