function getCombo(selectObject, id) {
  var value = selectObject.value;
  window.location.href = "pending-orders.php?status=" + value + "&id=" + id;
}

function getComboPrepare(selectObject, id) {
  var value = selectObject.value;
  window.location.href = "preparing-orders.php?status=" + value + "&id=" + id;
}

function getComboReady(selectObject, id) {
  var value = selectObject.value;
  window.location.href = "ready-orders.php?status=" + value + "&id=" + id;
}