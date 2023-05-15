$(document).ready(function () {
  $(".gallerys1").magnificPopup({
    type: "image",
    delegate: "a",
    gallery: {
      enabled: true,
    },
  });
});
$(document).ready(function () {
  $(".gallerys2").magnificPopup({
    type: "image",
    delegate: "a",
    gallery: {
      enabled: true,
    },
  });
});
$(document).ready(function () {
  $(".gallerys3").magnificPopup({
    type: "image",
    delegate: "a",
    gallery: {
      enabled: true,
    },
  });
});
$(document).ready(function () {
  $(".gallerys4").magnificPopup({
    type: "image",
    delegate: "a",
    gallery: {
      enabled: true,
    },
  });
});
$(document).ready(function () {
  $(".gallerys5").magnificPopup({
    type: "image",
    delegate: "a",
    gallery: {
      enabled: true,
    },
  });
});

$(document).ready(function () {
  $(".gallerysbank").magnificPopup({
    type: "image",
    delegate: "a",
    gallery: {
      enabled: true,
    },
  });
});

$(document).ready(function () {
  $(".galleryscoverpic").magnificPopup({
    type: "image",
    delegate: "a",
    gallery: {
      enabled: true,
    },
  });
});

// JS to check all check boxes
const checkAll = document.querySelector("#checkAll");
const checkboxes = document.querySelectorAll(".checkbox");

checkAll.addEventListener("change", function () {
  checkboxes.forEach(function (checkbox) {
    checkbox.checked = checkAll.checked;
  });
});

//JS to show/hide manager details
function toggleDiv() {
  var div = document.getElementById("myDiv");
  var button = document.getElementsByTagName("button")[0];
  if (div.style.display === "none") {
    div.style.display = "block";
    button.innerHTML = "Yes";
  } else {
    div.style.display = "none";
    button.innerHTML = "No";
  }
}
