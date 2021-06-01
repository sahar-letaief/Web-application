
if (document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready() {
    
    // to enable the quanity button to work and update quantity of an item

    var quantityInputs =document.getElementsByClassName('quantity')
    for (var i=0 ; i < quantityInputs.length ; i++) {
        var input = quantityInputs[i]
        input.addEventListener('change',quantityChanged)
    }
    

} // close the ready function

function quantityChanged(event){
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
    }
    updateCartTotal()
}

function updateCartTotal() {
    /*var cartItemContainer = document.getElementsByClassName('cart-list')[0]
    var cartRows = cartItemContainer.getElementsByClassName('itemsspecial');
    console.log(cartRows)
    var total = 0
    console.log(cartRows.length)

    /*for (var i=0 ; i < cartRows.length ; i++){
        var cartRow = cartRows[i]
        console.log(cartRow)
        var priceElement = cartRow.getElementsByClassName('productprice')[0]
        //var quantityElement = cartRow.getElementsByClassName('quantity')[0]
        console.log(priceElement)
        //var price = parseFloat(priceElement.inneHTML.replace('$',''))
        //var quantity = quantityElement.value
        //total = total + price * quantity
    }*/

    var data_info = [];

    var rows =document.getElementsByTagName("tbody")[0].rows;
    var total = 0 ;
    var subtotal = 0;
    for(var i=0;i<rows.length;i++){
    var td = rows[i].getElementsByTagName("td");
    var price = parseFloat(td[3].innerText.replace('$',''));
    var quantity = parseFloat(td[4].getElementsByClassName('quantityy')[0].value);
    //console.log(td[4].getElementsByClassName('quantityy').val())
    total = price * quantity + total;
    //total = Math.round(total * 100) / 100
    td[5].innerText = total + '$';
    //console.log(td[5].innerText)
    data_info.push(quantity);
    data_info.push(total);
    subtotal+=total;
    total = 0 ;
    }

    var rows =document.getElementsByTagName("tbody")[1].rows;
    for(var i=0;i<rows.length;i++){
    var td = rows[i].getElementsByTagName("td");
    var price = parseFloat(td[3].innerText.replace('$',''));
    var quantity = parseFloat(td[4].getElementsByClassName('quantityy')[0].value);
    //console.log(td[4].getElementsByClassName('quantityy').val())
    total = price * quantity + total;
    //total = Math.round(total * 100) / 100
    td[5].innerText = total + '$';
    //console.log(td[5].innerText)
    data_info.push(quantity);
    data_info.push(total);
    subtotal+=total;
    total = 0 ;
    }

    var rows =document.getElementsByTagName("tbody")[2].rows;
    for(var i=0;i<rows.length;i++){
    var td = rows[i].getElementsByTagName("td");
    var price = parseFloat(td[3].innerText.replace('$',''));
    var quantity = parseFloat(td[4].getElementsByClassName('quantityy')[0].value);
    //console.log(td[4].getElementsByClassName('quantityy').val())
    total = price * quantity + total;
    //total = Math.round(total * 100) / 100
    td[5].innerText = total + '$';
    //console.log(td[5].innerText)
    data_info.push(quantity);
    data_info.push(total);
    subtotal+=total;
    total = 0 ;
    }


    data_info.push(subtotal);
    var x = $('#totall').text();
    //console.log(x)
    subtotal += " $" 
    $('#totall').text(subtotal);
    
    subtotal=0;

     console.log(data_info);

    $.ajax({
        url:"update_cart.php",
        method: "post",
        data: { data_info : JSON.stringify(data_info) },
        success: function(res){
            console.log(res);
        }

    })

    //document.getElementsByClassName('producttotal')[0].innerText = '$' + total
}

