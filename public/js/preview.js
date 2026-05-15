function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('image-preview');
        if (output) {
            output.src = reader.result;
            const container = document.getElementById('image-preview-container');
            if (container) {
                container.classList.remove('hidden');
            }
        }
    };
    if (event.target.files && event.target.files[0]) {
        reader.readAsDataURL(event.target.files[0]);
    }
}
