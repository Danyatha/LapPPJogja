document.addEventListener('DOMContentLoaded', () => {
    const dropZone = document.getElementById('drop-zone');
    const fileInput = document.getElementById('file-input');
    const fileList = document.getElementById('file-list');
    const fileListContainer = document.getElementById('file-list-container');
    const fileCount = document.getElementById('file-count');
    const uploadForm = document.getElementById('upload-form'); // Pastikan form punya ID ini!


    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    function highlight(e) {
        dropZone.classList.add('active');
        dropZone.querySelector('.drop-zone-text p').textContent = 'Drop files here';
    }

    function unhighlight(e) {
        dropZone.classList.remove('active');
        dropZone.querySelector('.drop-zone-text p').textContent = 'Drag & drop files here';
    }

    function handleDrop(e) {
        preventDefaults(e);
        unhighlight(e);
        fileInput.files = e.dataTransfer.files; // LANGSUNG update fileInput.files
        updateFileList(); // Update tampilan
        triggerChangeEvent(); // PENTING: Picu event 'change'
    }

    function handleFileInput(e) {
        updateFileList(); //Perbarui tampilan daftar file
    }


    function removeFile(index) {
        const dt = new DataTransfer();
        const { files } = fileInput;

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            if (index !== i) dt.items.add(file); // Tambahkan semua KECUALI yang dihapus
        }

        fileInput.files = dt.files; // Update fileInput.files
        updateFileList();
        triggerChangeEvent();
    }

    function updateFileList() {
        fileList.innerHTML = ''; // Kosongkan daftar
        fileCount.textContent = fileInput.files.length; // Update jumlah file

        if (fileInput.files.length > 0) {
            fileListContainer.classList.remove('hidden');
        } else {
            fileListContainer.classList.add('hidden');
        }

        Array.from(fileInput.files).forEach((file, index) => { // Iterasi langsung dari fileInput.files
            const fileItem = document.createElement('li');
            fileItem.className = 'file-item';
            const fileSize = (file.size / 1024).toFixed(1);

            fileItem.innerHTML = `
                <div class="file-info">
                    <span class="file-name">${file.name}</span>
                    <span class="file-size">(${fileSize} KB)</span>
                </div>
                <button type="button" class="remove-button" data-index="${index}">
                    <svg class="remove-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            `;
            fileList.appendChild(fileItem);

            // Event listener untuk tombol hapus (gunakan event delegation)
            fileItem.querySelector('.remove-button').addEventListener('click', (e) => {
                e.preventDefault();
                const indexToRemove = parseInt(e.currentTarget.dataset.index);
                removeFile(indexToRemove);
            });
        });
    }


    // Fungsi untuk memicu event 'change' secara manual
    function triggerChangeEvent() {
        const event = new Event('change', { bubbles: true });
        fileInput.dispatchEvent(event);
    }


    // Event listeners (drag and drop)
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, preventDefaults, false);
    });
    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, highlight, false);
    });
    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, unhighlight, false);
    });
    dropZone.addEventListener('drop', handleDrop, false);

    // Event listener (file input)
    fileInput.addEventListener('change', handleFileInput, false);

    // Inisialisasi tampilan awal
    updateFileList();
});