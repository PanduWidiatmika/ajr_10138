function asetFunction() {
  var temp = document.getElementById("aset").value;
  document.getElementById("mulaikontrak").disabled = true;
  document.getElementById("selesaikontrak").disabled = true;
  document.getElementById("id_pemilik").setAttribute("disabled", "disabled");
  if (temp == "Mitra") {
    document.getElementById("mulaikontrak").disabled = false;
    document.getElementById("selesaikontrak").disabled = false;
    document.getElementById("id_pemilik").removeAttribute("disabled");
  }
}
