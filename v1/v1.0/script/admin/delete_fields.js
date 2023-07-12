
let deletes_btn = document.querySelectorAll('.delete')
// let ajax = new XMLHttpRequest()

for (let del of deletes_btn) {
    del.addEventListener('click', (e) => {
        el = e.target
        el_id = el.classList[3]

        swal({
            title: "Confirmation",
            icon: "warning",
            text: "Are you sure you want to delete this fields ?",
            buttons: {
                cancel: true,
                confirm: true
            }
        }).then((isConfirm) => {
            if (isConfirm) {
                let target_field = document.querySelector('#field_' + el_id)
                target_field.parentNode.removeChild(target_field)   
            
                ajax.open("POST", "../../../php/delete_fields.php", true)
                ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
                ajax.send("business_fields_id=" + el_id)

                ajax.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        alert(this.responseText);
                    }
                }
            }
        })
    })
}