
let updates_btn = document.querySelectorAll('.update');
let ajax = new XMLHttpRequest();

for (let update of updates_btn) {
    update.addEventListener('click', (e) => {
        el = e.target
        el_id = el.classList[3]

        let title = el.parentNode.querySelector('#field_title').value
        let image = el.parentNode.querySelector('#field_image')
        let form_data = new FormData

        if (title == '') {
            alert('Please input title')
            return
        }

        ajax.open("POST", "../../../php/update_business_fields.php", true)
        // ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
            
        form_data.append('image', image.files[0])
        form_data.append('title', title)
        form_data.append('business_fields_id', el_id)
        ajax.send(form_data)

        ajax.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
            }
        }
    })
}