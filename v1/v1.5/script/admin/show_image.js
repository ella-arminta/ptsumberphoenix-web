
const uploads = document.querySelectorAll('.upload-image');

for (let upload of uploads) {
    upload.addEventListener('change', (e) => {
        let item = e.target
        let parent = item.parentNode
        let image_parent = parent.nextElementSibling
        let image = image_parent.querySelector('#image_output')
        
        image.src = URL.createObjectURL(e.target.files[0])
        image.onload = () => {
            URL.revokeObjectURL(image.src)
        }
    })
}
