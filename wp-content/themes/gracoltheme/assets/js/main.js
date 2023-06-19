function main() {
  let galeryControl = () => {
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
        button.classList.add(
          "!border-[3px]",
          "!text-orangeG",
          "!border-orangeG"
        );
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
  };

  // ---------------------------------Search method
  function searchProductsHome() {
    let projectUbication = document.querySelectorAll(".btn-ubicacion");
    let loopContainer = document.getElementById("_loopHomeP");

    loopContainer == null
      ? (loopContainer = document.getElementById("_loopVenta"))
      : "";

    let ubicaciones = [];

    projectUbication.forEach((ubi) => {
      ubicaciones.push(ubi.value);
      ubi.addEventListener("change", (e) => btnClicked(e));
    });

    let type = [];
    let projecType = document.querySelectorAll(".btn-type");

    function cleaning(array) {
      array.forEach((btn) => {
        btn.previousElementSibling.classList.remove(
          "text-orangeG",
          "font-futuraBold"
        );
      });
    }
    projecType.forEach((tpe) => {
      type.push(tpe.value);
      tpe.addEventListener("change", (e) => btnClicked(e));
    });

    function btnClicked(e) {
      let formContainer = document.getElementById("searchPForm");
      let searchUbi;
      let searchType;
      if (e.target.getAttribute("name") == "searchUbicacionMini") {
        formContainer = document.getElementById("searchUbiOnly");
        loopContainer = document.getElementById("_loopHomeS");
        searchUbi = formContainer.searchUbicacionMini.value;
        searchType = 'all';
      } else {
        searchType = formContainer.searchUbicacion.value;
        searchUbi = formContainer.searchUbicacion.value;
      }
      
      jQuery.ajax({
        url: gsLoopQuerys.ajaxUrl,
        method: "POST",
        data: {
          action: "gsLoopSearch",
          searchUbicacion: searchUbi,
          searchType: searchType,
          sendUrl: window.location.pathname,
        },
        beforeSend: function () {
          if (
            e.target.getAttribute("name") == "searchUbicacion" ||
            e.target.getAttribute("name") == "searchUbicacionMini"
          ) {
            cleaning(projectUbication);
          } else {
            cleaning(projecType);
          }
          loopContainer.innerHTML = "<h2 class='text-center'>Cargando</h2>";
        },
        success: function (data) {
          procededData = Object.entries(data).map((entry) => entry[1]);

          loopContainer.innerHTML = "";
          procededData.forEach((div) => {
            const tempElement = document.createElement("div");
            tempElement.innerHTML = div;
            loopContainer.append(tempElement.firstChild);
          });
        },
        error: function (error) {
          console.error(error);
        },
      });
      e.target.previousElementSibling.classList.add(
        "text-orangeG",
        "font-futuraBold"
      );
      // console.log(e.target);
    }
  }

  galeryControl();
  searchProductsHome();
}

main();
