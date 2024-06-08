
const btnCreateWorker = document.getElementById('btn_create_worker');
const mdlElem = document.querySelector('#mdl_create_worker');
const btnModalSave = mdlElem.querySelector('#btn_save_worker');
const statusOnImg = 'img/green_led.png';
const statusOffImg = 'img/red_led.png';


async function fetchCreateWorkerAsync(data) {
    return await fetch('/api/workers', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    });
}
async function fetchGetWorker(id) {
    return await fetch(`api/workers/${id}`, {
        method: 'GET',
        headers: {
            'Accept': 'application/json'
        }
    });
}



function addTableRow(data) {
    const tbody = document.querySelector('#tbl_body_workers');
    const tr = tbody.querySelector('tr');

    const row = tr.cloneNode(true);
    const tds = row.querySelectorAll('td');

    tds[0].textContent = data.first_name;
    tds[1].textContent = data.last_name;
    tds[2].textContent = data.phone;
    tds[3].querySelector('img').setAttribute('src', data.status ? statusOnImg : statusOffImg);
    tds[4].textContent = data.salary;

    tbody.appendChild(row);
}




function showModal(worker) {
    const mode = worker ? 'update' : 'create';
    mdlElem.dataset.mode = mode;

    const modal = bootstrap.Modal.getInstance(mdlElem) ?? new bootstrap.Modal(mdlElem);

    if (mode === 'update') {
        mdlElem.querySelector('#first_name').value = worker.first_name ?? "";
        mdlElem.querySelector('#last_name').value = worker.last_name ?? "";
        mdlElem.querySelector('#phone').value = worker.phone ?? "";
        mdlElem.querySelector('#salary').value = worker.salary ?? "";
        mdlElem.querySelector('#status').checked = worker.status;
    }

    modal.show();
}
function hideModal() {
    const modal = bootstrap.Modal.getInstance(mdlElem);

    mdlElem.querySelectorAll('input').forEach(i => {
        if (i.type === 'checkbox')
            i.checked = false;
        else
            i.value = '';
    });

    modal.hide();
}
function showToast(delay = 2000) {
    const toast = new bootstrap.Toast(document.querySelector('#created_toast'), {
        delay: delay
    });

    toast.show();
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
            addTableRow(data);
            hideModal();
            showToast();
        }
    }
}

btnCreateWorker.addEventListener('click', btnCreateWorkerHandler);
btnModalSave.addEventListener('click', btnModalSaveWorkerHandler);
document.querySelector('#tbl_body_workers').addEventListener('click', async e => {
    if (e.target.tagName === 'BUTTON' || e.target.parentElement.tagName === 'BUTTON') {
        const tr = e.target.closest('tr');
        const workerId = tr.dataset.workerId;

        const button = e.target.tagName === 'BUTTON' ? e.target : e.target.parentElement;
        const action = button.dataset.action;

        try {
            switch (action) {
                case 'edit':
                    let response = await fetchGetWorker(workerId);
                    const worker = await response.json();
                    showModal(worker);
                    break;

                case 'delete':

                    break;
            }
        } catch (ex) {

        }


    }
});




