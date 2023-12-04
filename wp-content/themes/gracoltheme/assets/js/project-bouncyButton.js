const animateCSS = (element, animation, prefix = "animate__") =>
  // We create a Promise and return it
  new Promise((resolve, reject) => {
    const animationName = `${prefix}${animation}`;
    const node = document.querySelector(element);

    node.classList.add(`${prefix}animated`, animationName);
    console.log("init of function");

    // When the animation ends, we clean the classes and resolve the Promise
    function handleAnimationEnd(event) {
      event.stopPropagation();
      node.classList.remove(`${prefix}animated`, animationName);
      console.log("handle animation end");
      resolve(
        setInterval(() => {
          if (node.classList.contains(animationName) ||
            node.classList.contains(`${prefix}animated`)) {
            node.classList.remove(`${prefix}animated`, animationName);
          } else {
            node.classList.add(`${prefix}animated`, animationName);
          }
        }, 1500)
      );
    }

    node.addEventListener("animationend", handleAnimationEnd, { once: true });
  });

animateCSS(".btn-bounty", "headShake");
