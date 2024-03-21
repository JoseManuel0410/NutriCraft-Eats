function myFunction() {
    var x = document.getElementById("NavBar");
    if (x.className === "nav") {
      x.className += " responsive";
    } else {
      x.className = "nav";
    }
  }
  
  const dropzoneBox = document.querySelector(".dropzone-box");
  const inputFiles = document.querySelectorAll(".dropzone-area input[type='file']");
  const inputElement = inputFiles[0];
  const dropZoneElement = inputElement.closest(".dropzone-area");
  
  inputElement.addEventListener("change", (e) => {
    if (inputElement.files.length) {
      updateDropzoneFileList(dropZoneElement, inputElement.files[0]);
    }
  });
  
  dropZoneElement.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropZoneElement.classList.add("dropzone--over");
  });
  
  ["dragleave", "dragend"].forEach((type) => {
    dropZoneElement.addEventListener(type, (e) => {
      dropZoneElement.classList.remove("dropzone--over");
    });
  });
  
  dropZoneElement.addEventListener("drop", (e) => {
    e.preventDefault();
    if (e.dataTransfer.files.length) {
      inputElement.files = e.dataTransfer.files;
      updateDropzoneFileList(dropZoneElement, e.dataTransfer.files[0]);
    }
    dropZoneElement.classList.remove("dropzone--over");
  });
  
  const updateDropzoneFileList = (dropZoneElement, file) => {
    let dropZoneFileMessage = dropZoneElement.querySelector(".message");
    dropZoneFileMessage.innerHTML = `
      ${file.name}, ${file.size} bytes
    `;
  };
  
  dropzoneBox.addEventListener("reset", (e) => {
    let dropZoneFileMessage = dropZoneElement.querySelector(".message");
    dropZoneFileMessage.innerHTML = 'No File Selected';
  });
  
  dropzoneBox.addEventListener("submit", (e) => {
    e.preventDefault();
    const myField = document.getElementById("upload-file");
    console.log(myField.files[0]);
  });