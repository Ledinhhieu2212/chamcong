function showNotification() {
    var notification = document.getElementById("form-user-delete");
    var bg_dark = document.querySelector('.body-delete');
    bg_dark.style.display = "block";
    notification.style.display = "block";
  }

  function onFileSelected(event) {
    var selectedFile = event.target.files[0];
    var reader = new FileReader();

    var imgtag = document.getElementById("myimage");
    imgtag.title = selectedFile.name;

    reader.onload = function(event) {
      imgtag.src = event.target.result;
    };

    reader.readAsDataURL(selectedFile);
  }
