let stats_data = document.querySelectorAll('.statistic-data')

for (let stat of stats_data) {
    stat.addEventListener('click', (e) => {
        let tmp = e.target
        let elt = tmp.children[0]
        
        let title = elt.children[2].innerHTML
        let content = elt.children[3].innerHTML
        let modal = document.querySelector('.modal-content')

        modal.innerHTML = `
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">`+title+`</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            `+content+`
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        `
    })
}