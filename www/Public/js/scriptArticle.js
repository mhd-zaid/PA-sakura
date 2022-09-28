var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
var textarea = document.getElementById("input-area");

btn.onclick = function () {
  modal.style.display = "block";
};
var color = document.getElementById("color");
var modalEdit = document.getElementById("modalEdit");
var bloc_de_texte = document.getElementById("bt");
bloc_de_texte.onclick = function () {
  modalEdit.style.display = "block";
  button_save.style.display = "block";
  modif.style.display = "none";
  textarea.value = "";
  var new_output = document.createElement("p");
  var div = document.getElementById("content");
  div.appendChild(new_output);
};
span.onclick = function () {
  modalEdit.style.display = "none";
};

window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
  if (event.target == modalEdit) {
    modalEdit.style.display = "none";
    var el = document.getElementById("current-output");
    bold.classList.remove("active");
    italic.classList.remove("active");
    underline.classList.remove("active");
    console.log("hello");
    el.removeAttribute("id");
  }
};

var bold = document.getElementById("bold");
var italic = document.getElementById("italic");
var underline = document.getElementById("underline");
var button_save = document.getElementById("save-text");

button_save.onclick = function () {
  modalEdit.style.display = "none";
  var output = div.children.item(div.children.length - 1);
  output.innerHTML = textarea.value;
  output.style.color = color.value;
  textarea.value = "";

  bold.classList.remove("active");
  italic.classList.remove("active");
  underline.classList.remove("active");
};

var div = document.getElementById("content");

function changeFontStyle(e) {
  if (button_save.style.display == "block") {
    var output = div.children.item(div.children.length - 1);
  }
  if (modifier.style.display == "block") {
    var output = document.getElementById("current-output");
  }

  if (e.target.id === "bold") {
    e.target.classList.toggle("active");
    output.classList.toggle("bold");
  }
  if (e.target.id === "italic") {
    e.target.classList.toggle("active");
    output.classList.toggle("italic");
  }
  if (e.target.id === "underline") {
    e.target.classList.toggle("active");
    output.classList.toggle("underline");
  }
}
var modif = document.getElementById("modifier");

function clicked(e) {
  if (e.target.tagName == "P") {
    if (e.target.classList.contains("bold")) {
      bold.classList.add("active");
    }
    if (e.target.classList.contains("italic")) {
      italic.classList.add("active");
    }
    if (e.target.classList.contains("underline")) {
      underline.classList.add("active");
    }
    modalEdit.style.display = "block";
    button_save.style.display = "none";
    modif.style.display = "block";
    modalEdit.style.display = "block";
    textarea.value = e.target.innerHTML;
    e.target.setAttribute("id", "current-output");
    modif.addEventListener("click", () => {
      bold.classList.remove("active");
      italic.classList.remove("active");
      underline.classList.remove("active");

      if (e.target.hasAttribute("id")) {
        e.target.innerHTML = textarea.value;
        textarea.value = "";
        modalEdit.style.display = "none";
        modif.style.display = "none";
        e.target.removeAttribute("id");
      }
    });
  }
}
div.addEventListener("click", clicked);
const btnAction = document.querySelector(".choix-police");
btnAction.addEventListener("click", changeFontStyle);

let json = [
  {
    filename: "image1.jpg",
  },
  {
    filename: "image2.jpg",
  },
  {
    filename: "image3.jpg",
  },
  {
    filename: "image4.jpg",
  },
  {
    filename: "image5.jpg",
  },
  {
    filename: "image6.jpg",
  },
];
var add_img = document.getElementById("bt-img");
function randomImage() {
  let randomImages = json[Math.floor(Math.random() * json.length)];
  let img = document.createElement("img");
  img.setAttribute("src", `../../Public/img/${randomImages.filename}`);
  img.setAttribute("width", "100");
  img.setAttribute("height", "70px");
  div.appendChild(img);
}

add_img.addEventListener("click", randomImage);

$("#save_out").on("click", () => {
  location.replace("article");
});

$("#No").on("click", () => {
  modal.style.display = "none";
});
$("#Yes").on("click", () => {
  location.replace("article");
});

$("#click").on("click", () => {
  location.replace("article-edit");
  console.log("salut");
});
