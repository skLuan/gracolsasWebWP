function lineatiempo() {
  let lineaControl = () => {
    let buttons = document.querySelectorAll(".gs_linea_buton");
    let slidesContainers = document.querySelectorAll(".gs_slide");
    let firstSlide = slidesContainers[0];
    let firstBtn = buttons[0];
    function btnClasses() {
      buttons.forEach((btn) => {
        if (
          !btn.classList.contains(
            "!border-[3px]",
            "!text-orangeG",
            "!border-orangeG"
          )
        )
          return;
        btn.classList.remove(
          "!border-[3px]",
          "!text-orangeG",
          "!border-orangeG"
        );
      });
    }
    function hideGaleries() {
      slidesContainers.forEach((slide) => {
        try {
          slide.classList.add("-translate-y-80", "hidden");
          //   slideSelect.classList.replace("bottom-full", "bottom-[unset]");
        } catch (error) {}
      });
    }
    buttons.forEach((button, i) => {
      button.addEventListener("click", () => {
        btnClasses();
        button.classList.add(
          "!border-[3px]",
          "!text-orangeG",
          "!border-orangeG"
        );
        hideGaleries();
        let slideSelect = slidesContainers[i];
        slideSelect.classList.remove("hidden", "-translate-y-80");
      });
    });
    // console.log(firstSlide);
    btnClasses();
    hideGaleries();
    firstSlide.classList.remove("hidden", "-translate-y-80");
    firstBtn.classList.add("!border-[3px]", "!text-orangeG", "!border-orangeG");
  };
  lineaControl();
}

lineatiempo();
