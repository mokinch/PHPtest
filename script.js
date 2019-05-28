function disable() {
  var butt = document.getElementsByTagName("BUTTON")[0];
  var dis = document.createAttribute("disabled");
  butt.setAttributeNode(dis);
}


function check(){
  
var h = document.getElementById("inputHeight");
var w = document.getElementById("inputWidth");
var r = document.getElementById("inputRad");
var maxRad = Math.min(+h.value, +w.value) / 2;

if(+r.value >= maxRad) {
  alert("Введите радиус меньше половины высоты/ширины");
  disable();
    } else document.getElementsByTagName("BUTTON")[0].removeAttribute("disabled");
  }

