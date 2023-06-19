function validateForm() {
    var activityName = document.forms["add_activity"]["activity_name"].value;
    var activityDate = document.forms["add_activity"]["activity_date"].value;
    var activityTimeBegin = document.forms["add_activity"]["activity_timebegin"].value;
    var activityTimeEnd = document.forms["add_activity"]["activity_timeend"].value;
    var activityLocation = document.forms["add_activity"]["activity_location"].value;
    var uploadFile = document.forms["add_activity"]["upload"].value;

    // Validate activity_name field
    if (activityName === "") {
      displayErrorMessage("Nama Kegiatan harus diisi.");
      return false;
    }

    // Validate activity_date field
    if (activityDate === "") {
      displayErrorMessage("Tanggal Kegiatan harus diisi.");
      return false;
    }

    // Validate activity_timebegin field
    if (activityTimeBegin === "") {
      displayErrorMessage("Waktu Mulai harus diisi.");
      return false;
    }

    // Validate activity_timeend field
    if (activityTimeEnd === "") {
      displayErrorMessage("Waktu Berakhir harus diisi.");
      return false;
    }

    // Validate activity_location field
    if (activityLocation === "") {
      displayErrorMessage("Lokasi Kegiatan harus diisi.");
      return false;
    }

    // Validate upload field
    if (uploadFile === "") {
      displayErrorMessage("Gambar Kegiatan harus dipilih.");
      return false;
    }

    return true; // Form is valid
  }

  function displayErrorMessage(message) {
    var errorMessage = document.getElementById("errorMessage");
    errorMessage.innerText = message;
    errorMessage.hidden = false;
  }