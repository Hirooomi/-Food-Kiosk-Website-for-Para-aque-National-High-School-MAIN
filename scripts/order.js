function plus() {
  var quantity = parseInt(document.getElementById("quantity").value);
  var prc = parseInt(document.getElementById("prc").value);
  document.getElementById("quantity").stepUp();
  document.getElementById("total").innerHTML = "PHP " + ((quantity+1)*prc).toString();
}

function minus() {
  var quantity = parseInt(document.getElementById("quantity").value);
  var prc = parseInt(document.getElementById("prc").value);
  document.getElementById("quantity").stepDown();
  if ((quantity-1) != 0) {
    document.getElementById("total").innerHTML = "PHP " + ((quantity-1)*prc).toString();
  }
}

function cartplus(id, subtotal, prc, qty) {
  var quantity = parseInt(document.getElementById(id).value);
  var price = parseInt(document.getElementById(prc).value);
  var total = parseInt(document.getElementById("total").innerHTML);
  document.getElementById(id).stepUp();
  document.getElementById(qty).innerHTML = (quantity+1).toString();

  document.getElementById(subtotal).innerHTML = "PHP " + (quantity+1)*price.toString();
  document.getElementById("total").innerHTML = (total+price).toString();
}

function cartminus(id, subtotal, prc, qty) {
  var quantity = parseInt(document.getElementById(id).value);
  var price = parseInt(document.getElementById(prc).value);
  var total = parseInt(document.getElementById("total").innerHTML);
  document.getElementById(id).stepDown();

  if ((quantity-1) != 0) {
    document.getElementById(qty).innerHTML = (quantity-1).toString();
    document.getElementById(subtotal).innerHTML = "PHP " + ((quantity-1)*prc).toString();
    document.getElementById(subtotal).innerHTML = "PHP " + (quantity-1)*price.toString();
    document.getElementById("total").innerHTML = (total-price).toString();
  }
}
