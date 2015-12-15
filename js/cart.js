/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var arrayProduct =getCookie('Products')
$(document).ready(function () {
    insertNumberCart();
})

//                arrayProduct = []
//            document.cookie = 'key = ' + JSON.stringify(arrayProduct);

function addCookie(id) {
    
    console.log(arrayProduct);
    if (arrayProduct == "") {
        arrayProduct = [];
        document.cookie = 'Products = ' + JSON.stringify(arrayProduct);
    }
    if ($.inArray(id, arrayProduct) == -1) {
        console.log(arrayProduct.push(id));
        document.cookie = 'Products = ' + JSON.stringify(arrayProduct);
        insertNumberCart();
    }

}
function insertNumberCart() {
    arrayProduct = getCookie('Products');
    arrayProduct = JSON.parse(arrayProduct);
    $("#cart span").text(arrayProduct.length);

}

function removeCookie(id) {
    var index = arrayProduct.indexOf(id);
    if (index > -1) {
        arrayProduct.splice(index, 1);
        document.cookie = 'Products = ' + JSON.stringify(arrayProduct);
        location.reload();
    }
    console.log(arrayProduct);
}

//            console.log();
//            console.log(document.cookie);
//            console.log(document.cookie.key);

//                        console.log(getCookie('Products'));

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ')
            c = c.substring(1);
        if (c.indexOf(name) == 0)
            return c.substring(name.length, c.length);
    }
    return "";
}

