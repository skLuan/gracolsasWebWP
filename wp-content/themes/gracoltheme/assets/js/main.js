function main() {
  let buttons = document.querySelectorAll(".gs_galerie_buton");
  let slidesContainers = document.querySelectorAll(".gs_slide");

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

  buttons.forEach((button, i) => {
    button.addEventListener("click", () => {
      btnClasses();
      button.classList.add("!border-[3px]", "!text-orangeG", "!border-orangeG");
      if (i < 3) {
        try {
          for (let index = 0; index < 3; index++) {
            const element = slidesContainers[index];
            element.classList.add("-translate-y-80", "hidden");
          }
          slideSelect = slidesContainers[i];
          slideSelect.classList.remove("hidden", "-translate-y-80");
          //   slideSelect.classList.replace("bottom-full", "bottom-[unset]");
        } catch (error) {}
      }
    });
  });
}

main();
