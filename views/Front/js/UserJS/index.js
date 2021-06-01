function LoginTest(Login) {
    if (Login === 1) {
        document.getElementById("Login").style.visibility = "hidden";
        document.getElementById("Userdropdown").style.visibility = "visible";
        const link = document.getElementById("profilLink");
        //window.location.href = "Location: http://firstpage/Projet/profil.php"
    }
    else {
        document.getElementById("Login").style.visibility = "visible";
        document.getElementById("Userdropdown").style.visibility = "hidden";
    }

}


