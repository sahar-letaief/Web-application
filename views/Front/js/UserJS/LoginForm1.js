var x = document.getElementById("login")
var y = document.getElementById("register")
var z = document.getElementById("btn")
const Login = false;




function register() {
    x.style.left = "-480px";
    y.style.left = "50px";
    z.style.left = "110px";
}
function login() {
    x.style.left = "50px";
    y.style.left = "450px";
    z.style.left = "0px";
}
document.getElementsByClassName("LoginForm")[0].style.visibility = "hidden"

function CloseLoginForm() {
    document.getElementsByClassName("LoginForm")[0].style.visibility = "hidden"

}

function OpenLoginForm() {

    document.getElementsByClassName("LoginForm")[0].style.visibility = "visible"
}


function LoginTest(Login) {
    if (Login === 1) {

        document.getElementById("Loginbtn").style.visibility = "hidden";
        const link = document.getElementById("profilLink");
        link.href = "./Vue/profil.php"
        //window.location.href = "Location: http://firstpage/Projet/profil.php"
    }
    else {
        OpenLoginWindow();
    }

}


//LoginWindow
function OpenLoginWindow() {
    document.getElementsByClassName("Loginwindow")[0].style.visibility = "visible"

    const Loginwind = document.getElementsByClassName("Loginwindow")[0];

    Loginwind.addEventListener("mouseleave", e => { CloseLoginWindow() })

}
function CloseLoginWindow() {
    document.getElementsByClassName("Loginwindow")[0].style.visibility = "hidden"



}
