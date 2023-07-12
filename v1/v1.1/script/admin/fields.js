
const add_field = document.querySelector('.add-field');
const container = document.querySelector('.home-panel .container-fluid .form-fields')
add_field.addEventListener('click', () => {
    console.log(container)
    container.innerHTML += `
    <form method="POST" action="../../../php/business_fields.php" enctype="multipart/form-data">
        <div class="field">
            <div class="mb-3">
                <label for="field_title" class="form-label">Field Title</label>
                <input name="title" type="text" class="form-control" id="field_title" required>
            </div>
            <div class="mb-3">
                <label for="field_image" class="form-label">Field Image</label>
                <input name="image" type="file" accept="image/*" class="form-control" id="field_image" required>
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            <hr>
        </div>
    </form>
    `
})