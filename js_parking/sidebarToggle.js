// sidebarToggle.js
const sidebar = document.getElementById("sidebar");
const toggleBtn = document.getElementById("toggle-sidebar-btn");

function updateLayout() {
  if (sidebar.classList.contains("closed")) {
    toggleBtn.classList.remove("open");
    document.querySelector(".main-content").style.marginLeft = "0";
  } else {
    toggleBtn.classList.add("open");
    document.querySelector(".main-content").style.marginLeft = "260px";
  }
}

toggleBtn.addEventListener("click", () => {
  sidebar.classList.toggle("closed");
  updateLayout();
});

// Inicialización según ancho
window.addEventListener("load", updateLayout);
window.addEventListener("resize", updateLayout);
