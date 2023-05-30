function gsPrices() {
  let btns = document.querySelectorAll(".gs_price_button");
  let finalPrice = document.querySelector("#gs_priceSelector");

  function btnsclean() {
    btns.forEach((btn) => {
      if (
        !btn.classList.contains("bg-orangeG", "text-white", "!border-orangeG")
      )
        return;

      btn.classList.remove("bg-orangeG", "text-white", "!border-orangeG");
    });
  }

  btns.forEach((btn, i) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();
      btnsclean();
      btn.classList.add("bg-orangeG", "text-white", "!border-orangeG");

      finalPrice.textContent = "$ " + btn.value;
      if (i === 2) finalPrice.textContent = "€ " + btn.value;
    });
  });
}

gsPrices();
