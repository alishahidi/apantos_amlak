const changeCss = () => {
  var bodyHeader = document.getElementById("body-header");
  var header = document.getElementById("header");
  var min = Math.ceil(4);
  var max = Math.floor(40);
  this.scrollY > 50 ? bodyHeader.className = "body-header body-header-fix-bg" : bodyHeader.className = "body-header";
  var randomShadowNumber = (Math.random() * (max - min + 1)) + min;
  header.style.boxShadow = `0 4px ${randomShadowNumber}px 0px rgba(70, 90, 100, 0.3)`
}

window.addEventListener("scroll", changeCss, false);

function getOffset(el) {
  const rect = el.getBoundingClientRect();
  return {
    left: rect.left + window.scrollX,
    top: rect.top + window.scrollY
  };
}


const gradiant = (event) => {
  var w = event.offsetWidth;
  var pct = 100 * (+window.event.clientX) / w;
  var bg = "linear-gradient(" + pct + "deg,rgba(34, 38, 41, 0.19),rgba(234, 231, 220, 0.74))";
  event.style.backgroundImage = bg;
}

const removeGradiant = (event) => {
  event.style.backgroundImage = "none";
}

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 4000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})