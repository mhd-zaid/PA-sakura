var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
var textarea = document.getElementById("input-area");

btn.onclick = function () {
  modal.style.display = "block";
};

var modalEdit = document.getElementById("modalEdit");
var bloc_de_texte = document.getElementById("bt");
bloc_de_texte.onclick = function () {
  modalEdit.style.display = "block";
  textarea.value = "";
  var new_output = document.createElement("p");
  var div = document.getElementById("content");
  div.appendChild(new_output);
};
span.onclick = function () {
  modalEdit.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
  if (event.target == modalEdit) {
    modalEdit.style.display = "none";
  }
};

var yes = document.getElementById("Yes");
var no = document.getElementById("No");
no.onclick = function () {
  modal.style.display = "none";
};

yes.onclick = function () {
  location.replace("article");
};

var button_save = document.getElementById("save-text");

button_save.onclick = function () {
  modalEdit.style.display = "none";
  var output = div.children.item(div.children.length - 1);
  output.innerHTML = textarea.value;
  textarea.value = "";
  var bold = document.getElementById("bold");
  var italic = document.getElementById("italic");
  var underline = document.getElementById("underline");
  bold.classList.remove("active");
  italic.classList.remove("active");
  underline.classList.remove("active");
};

var div = document.getElementById("content");

function changeFontStyle(e) {
  var output = div.children.item(div.children.length - 1);

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
  modalEdit.style.display = "block";
  textarea.value = e.target.innerHTML;

  modif.addEventListener("click", () => {
    e.target.innerHTML = textarea.value;
    textarea.value = "";
    e = "";
  });
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
