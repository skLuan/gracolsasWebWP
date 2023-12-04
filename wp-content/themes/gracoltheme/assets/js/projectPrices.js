function gsPrices() {
  let btns = document.querySelectorAll(".gs_price_button");
  let finalPrice = document.querySelector("#gs_priceSelector");

  function btnsclean() {
    btns.forEach((btn) => {
      if (
        !btn.classList.contains("!border-[3px]", "!text-orangeG", "!border-orangeG")
      )
        return;

      btn.classList.remove("!border-[3px]", "!text-orangeG", "!border-orangeG");
    });
  }

  btns.forEach((btn, i) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();
      btnsclean();
      btn.classList.add("!border-[3px]", "!text-orangeG", "!border-orangeG");

      finalPrice.textContent = "$ " + btn.value;
      if (i === 2) finalPrice.textContent = "€ " + btn.value;
    });
  });
}

gsPrices();
