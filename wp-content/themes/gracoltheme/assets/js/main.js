function main() {
  let buttons = document.querySelectorAll(".gs_galerie_buton");
  let slidesContainers = document.querySelectorAll(".gs_slide");

  function btnClasses() {
    buttons.forEach((btn) => {
      if (
        !btn.classList.contains(
          "!bg-orangeG",
          "!text-whiteG",
          "!border-orangeG"
        )
      )
        return;
      btn.classList.remove("!bg-orangeG", "!text-whiteG", "!border-orangeG");
    });
  }

  const animateCSS = (element, animation, prefix = "animate__") => {
    // We create a Promise and return it
    new Promise((resolve, reject) => {
      const animationName = `${prefix}${animation}`;
      const node = document.querySelector(element);

      node.classList.add(`${prefix}animated`, animationName);

      // When the animation ends, we clean the classes and resolve the Promise
      function handleAnimationEnd(event) {
        event.stopPropagation();
        node.classList.remove(`${prefix}animated`, animationName);
        resolve("Animation ended");
      }

      node.addEventListener("animationend", handleAnimationEnd, { once: true });
    });
  };

  buttons.forEach((button, i) => {
    button.addEventListener("click", () => {
      btnClasses();
      button.classList.add("!bg-orangeG", "!text-whiteG", "!border-orangeG");
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
