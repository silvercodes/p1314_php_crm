
const btnCreateWorker = document.getElementById('btn_create_worker');
const mdlElem = document.querySelector('#mdl_create_worker');
const btnModalSave = mdlElem.querySelector('#btn_save_worker');


async function fetchCreateWorkerAsync(data) {
    return await fetch('/api/workers', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    });
}



function showModal(worker) {
    const mode = worker ? 'update' : 'create';
    mdlElem.dataset.mode = mode;

    const modal = bootstrap.Modal.getInstance(mdlElem) ?? new bootstrap.Modal(mdlElem);


    modal.show();
}
function btnCreateWorkerHandler() {
    showModal();
}
async function btnModalSaveWorkerHandler() {
    const modalMode = mdlElem.dataset.mode;

    const data = {};
    mdlElem.querySelectorAll('input').forEach(i => {
        data[i.name] = i.type === 'checkbox' ? i.checked : i.value;
    });

    console.log(data);

    if (modalMode === 'create') {
        const response = await fetchCreateWorkerAsync(data);

        if (response.status === 201) {

        }
    }



}

btnCreateWorker.addEventListener('click', btnCreateWorkerHandler);
btnModalSave.addEventListener('click', btnModalSaveWorkerHandler);




fetch('/api/workers', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
.then(res => {
    //
    //

}).then(res => {

});