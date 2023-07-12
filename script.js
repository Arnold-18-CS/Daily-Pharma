  // JavaScript code for handling the overlay
  function toggleOverlay() {
    var overlay = document.getElementById("overlay");
    var overlayContent = document.getElementById("overlay-content");

    if (overlay.style.width === "100%") {
      overlay.style.width = "0";
      overlayContent.style.display = "none";
    } else {
      overlay.style.width = "100%";
      overlayContent.style.display = "block";
    }
  }

  // Function to handle window resize event
  function handleResize() {
    var overlay = document.getElementById("overlay");
    var overlayContent = document.getElementById("overlay-content");

    if (window.innerWidth > 900) {
      overlay.style.width = "0";
      overlayContent.style.display = "none";
    }
  }

  // Call the handleResize function initially and on window resize
  handleResize();
  window.addEventListener("resize", handleResize);