const oldm = false;
const conf = false;


document.getElementsByClassName("LoginForm")[0].style.visibility = 'hidden'
document.getElementsByClassName("Delete")[0].style.visibility = 'hidden'
document.getElementById("subbtn").disabled = false;
document.getElementById("DeleteForm").disabled = false;


function OpenUpdateWidow() {
    document.getElementsByClassName("LoginForm")[0].style.visibility = 'visible'
}
function CloseUpdateWidow() {
    document.getElementsByClassName("LoginForm")[0].style.visibility = 'hidden'
}

function OpenDeleteWidow() {
    document.getElementsByClassName("Delete")[0].style.visibility = 'visible'
}
function CloseDelteWidow() {
    document.getElementsByClassName("Delete")[0].style.visibility = 'hidden'
}

// Update Functions

function OldpassTest(pass, oldm) {
    const mtp = document.getElementById("oldpass").value;
    // const pass = document.getElementById("oldmtpfield").value;
    console.log(pass + "....." + mtp)
    if (pass === mtp) {

        document.getElementById("oldpass").style.borderColor = 'green';
        document.getElementById("oldpassERR").innerHTML = "";
        oldm = true;
        document.getElementById("subbtn").disabled = false;
        document.getElementById("subbtn").style.cursor = "pointer";

    }
    else {
        document.getElementById("oldpass").style.borderColor = 'red';
        document.getElementById("oldpassERR").style.color = 'red';
        document.getElementById("oldpassERR").innerHTML = "mot de pass incorrect";
        oldm = false;

        document.getElementById("subbtn").disabled = true;
        document.getElementById("subbtn").style.cursor = "";


    }

    console.log(oldm)


}
function NewpassTest() {

}
function ConfpassTest(conf) {

    const Nmtp = document.getElementById("Newpass").value;
    const Conmtp = document.getElementById("Conpass").value;
    if (Nmtp === Conmtp) {
        document.getElementById("Conpass").style.borderColor = 'green';
        document.getElementById("ConpassERR").innerHTML = "";
        conf = true;
        document.getElementById("subbtn").disabled = false;
        document.getElementById("subbtn").style.cursor = "pointer";


    }
    else {
        document.getElementById("Conpass").style.borderColor = 'red';
        document.getElementById("ConpassERR").style.color = 'red';
        document.getElementById("ConpassERR").innerHTML = "mot de pass incorrect";
        conf = false;
        document.getElementById("subbtn").disabled = true;
        document.getElementById("subbtn").style.cursor = "";


    }

    console.log(conf)

}
/*function FormValidTest() {

    const Nmtp = document.getElementById("Newpass").value;
    if ((conf === true) && (oldm === true)) {
        alert("Mot de passe a ete Modifie");
    }
    else {

        alert("Mot de passe n'est valider");

    }
}*/

//Delete Functions

function DeleteOldpassTest(pass, oldm) {
    const mtp = document.getElementById("Deleteoldpass").value;
    // const pass = document.getElementById("oldmtpfield").value;
    console.log(pass + "....." + mtp)
    if (pass === mtp) {

        document.getElementById("Deleteoldpass").style.borderColor = 'green';
        document.getElementById("DelteoldpassERR").innerHTML = "";
        oldm = true;
        document.getElementById("DeleteForm").disabled = false;

    }
    else {
        document.getElementById("Deleteoldpass").style.borderColor = 'red';
        document.getElementById("DelteoldpassERR").style.color = 'red';
        document.getElementById("DelteoldpassERR").innerHTML = "mot de pass incorrect";
        oldm = false;

        document.getElementById("DeleteForm").disabled = true;

    }

    console.log(oldm)


}