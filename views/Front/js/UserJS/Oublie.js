
document.getElementById("codebtn").disabled = true;
document.getElementById("subbtn").disabled = true;
document.getElementsByClassName("form-box")[0].style.visibility = 'hidden';

function EmailSent(codeE) {
    const code = document.getElementById("Code").value;

    console.log(codeE + "........." + code);

    if (codeE == code) {
        console.log(codeE + "........." + code);


        document.getElementById("codebtn").disabled = false;
        document.getElementById("ERR").innerHTML = "";
    }
    else {
        document.getElementById("ERR").style.color = 'red';
        document.getElementById("ERR").innerHTML = "Code Incorrect";
    }

}

function Confirm() {
    document.getElementsByClassName("Oublie")[0].style.visibility = 'hidden';

    document.getElementsByClassName("codeVerif")[0].style.visibility = 'hidden';
    document.getElementsByClassName("form-box")[0].style.visibility = 'visible';
}

function formValid() {
    const newpass = document.getElementById("Newpass").value;
    const confpass = document.getElementById("Conpass").value;
    if (newpass === confpass) {
        document.getElementById("subbtn").disabled = false;
        //confpass.style.borderColor = 'green';
        document.getElementById("ConpassERR").innerHTML = "";

    }
    else {
        confpass.style.borderColor = 'red';
        document.getElementById("ConpassERR").innerHTML = "Incorrect";

    }

}

function SubmitEmail() {
    alert("Verifier votre boite mail");

}