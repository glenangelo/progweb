document.getElementsByTagName("form")[0].addEventListener('submit',function(e){
    
    const activity_name = document.getElementsByName("activity_name")[0];
    const activity_date = document.getElementsByName("activity_date")[0];
    const activity_level = document.getElementsByName("activity_level")[0];
    const activity_timebegin = document.getElementsByName("activity_timebegin")[0];
    const activity_timeend = document.getElementsByName("activity_timeend")[0];
    const activity_location = document.getElementsByName("activity_location")[0];

    activity_name.removeAttribute("class");
    activity_date.removeAttribute("class");
    activity_level.removeAttribute("class");
    activity_timebegin.removeAttribute("class");
    activity_timeend.removeAttribute("class");
    activity_location.removeAttribute("class");

    var message = document.getElementById("errorMessage");
    message.innerHTML = "";
    
    if (activity_name.value == "") {
        message.innerHTML += "- Name masih kosong<br>";
        nama.setAttribute("class", "warningBox");
    }

    if (activity_date.value.trim() == "") {
        message.innerHTML += "- Tanggal masih kosong<br>";
        birthDate.setAttribute("class", "warningBox");
    }

    if (activity_level.value.trim() == "") {
        message.innerHTML += "- Level masih kosong<br>";
        email.setAttribute("class", "warningBox"); 
    }

    if (activity_timebegin.value.trim() == "") {
        message.innerHTML += "- Waktu mulai masih kosong<br>";
        password.setAttribute("class", "warningBox"); 
    }

    if (activity_timeend.value.trim() == "") {
        message.innerHTML += "- Waktu berakhir masih kosong<br>";
        email.setAttribute("class", "warningBox"); 
    }

    if (activity_location.value.trim() == "") {
        message.innerHTML += "- Lokasi masih kosong<br>";
        password.setAttribute("class", "warningBox"); 
    }

    if (message.innerHTML !== ""){
        message.removeAttribute("hidden");
        e.preventDefault();
    }

})
