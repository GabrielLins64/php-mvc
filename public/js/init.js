const fileInput = document.getElementById("fileInput");
const fileLabel = document.getElementById("file-label");

fileInput.addEventListener("change", function () {
  console.log("Got in here");
  fileLabel.innerHTML = fileInput.files[0].name || "Insira uma imagem";
});
