let btnInteractive = (queryBtn, queryContainer)=>{

    let btn = document.querySelector(queryBtn);
    let container =document.querySelector(queryContainer);

    btn.addEventListener('click', ()=> {
        container.classList.toggle('hidden');
    });
}

btnInteractive("#btn_quejas", "#form_quejasreclamos_container");
btnInteractive("#btn_garantia", "#form_postventa_container");
btnInteractive("#btn_pagos", "#container_pagos");