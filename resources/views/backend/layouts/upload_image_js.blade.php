<script>
    const textPromptUpload = document.getElementById('textPromptUpload')
    const previewUpload = document.getElementById("previewUpload")
    const imageInputUpload = document.getElementById('imageInputUpload')
    const clearUpload = document.getElementById('clearUpload')
    let imageIsModified = false

    if(window.location.href.includes('edit')){
        const dataImage = previewUpload.getAttribute('data-image')
        if(dataImage){
            previewUpload.src = dataImage
            textPromptUpload.classList.add('d-none')
            previewUpload.classList.remove('d-none')
            previewUpload.classList.add('d-block')
            clearUpload.classList.remove('d-none')
        }
    }

    function showPreview(event) {
        if (event.target.files.length > 0) {
            // Validate Size
            const fileSize = Math.round((event.target.files[0].size / 1024))
            if (fileSize >= 5120) {
                imageInputUpload.value = ''
                return showSwalAlert('error', 'File too big, please select a file less than 5MB')
            }

            // Validate extension
            const fileName = event.target.files[0].name
            const extension = fileName.substr(fileName.lastIndexOf("."))
            const allowedExtensionsRegx = /(\.jpg|\.jpeg|\.png|\.gif|\.webp)$/i;
            const isAllowed = allowedExtensionsRegx.test(extension)
            console.log(isAllowed);
            if(!isAllowed){
                imageInputUpload.value = ''
                return showSwalAlert('error', 'Invalid file type, please upload .jpg, .jpeg, .png, .gif, .webp file')
            }

            let src = URL.createObjectURL(event.target.files[0])
            previewUpload.src = src
            previewUpload.classList.add('d-block')
            textPromptUpload.classList.add('d-none')
            clearUpload.classList.remove('d-none')
            imageIsModified = true
        }
    }

    function clearFileUpload() {
        previewUpload.src = ''
        previewUpload.classList.remove('d-block')
        previewUpload.classList.add('d-none')
        textPromptUpload.classList.remove('d-none')
        clearUpload.classList.add('d-none')
        imageInputUpload.value = ''
        imageIsModified = true
    }

    function handleUpload(el) {
        imageInputUpload.click()
    }
</script>
