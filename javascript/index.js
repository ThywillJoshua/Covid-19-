document.getElementById("physicallyImpaired").checked = false;

document.getElementById("physicallyImpaired").onclick = function () {
  $(".address-input").toggleClass("hide");
};
