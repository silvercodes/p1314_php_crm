
const btnCreateWorker = document.getElementById('btn_create_worker');
const mdlElem = document.querySelector('#mdl_create_worker');


function btnCreateWorkerHandler() {

    const modal = bootstrap.Modal.getInstance(mdlElem) ?? new bootstrap.Modal(mdlElem);
    modal.show();



}



btnCreateWorker.addEventListener('click', btnCreateWorkerHandler);



