

    id="mytable"
    function myFunction() {
    var input, filter, table, tr, td, i,j, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("mytable");
    tr = table.getElementsByTagName("tr");
//   alert(td.length);
    for (i = 0; i < tr.length; i++) {
    td= tr[i].getElementsByTagName("td")[1];
    if (td) {
    txtValue = td.textContent || td.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
    tr[i].style.display = "";
} else {
    tr[i].style.display = "none";
}
}

}

}


    id="mytable1"
    function myFunction1() {
    var input, filter, table, tr, td, i,j, txtValue;
    input = document.getElementById("myInput1");
    filter = input.value.toUpperCase();
    table = document.getElementById("mytable1");
    tr = table.getElementsByTagName("tr");
//   alert(td.length);
    for (i = 0; i < tr.length; i++) {
    td= tr[i].getElementsByTagName("td")[1];
    if (td) {
    txtValue = td.textContent || td.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
    tr[i].style.display = "";
} else {
    tr[i].style.display = "none";
}
}

}

}


    id="mytable2"
    function myFunction2() {
    var input, filter, table, tr, td, i,j, txtValue;
    input = document.getElementById("myInput2");
    filter = input.value.toUpperCase();
    table = document.getElementById("mytable2");
    tr = table.getElementsByTagName("tr");
//   alert(td.length);
    for (i = 0; i < tr.length; i++) {
    td= tr[i].getElementsByTagName("td")[1];
    if (td) {
    txtValue = td.textContent || td.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
    tr[i].style.display = "";
} else {
    tr[i].style.display = "none";
}
}

}

}



