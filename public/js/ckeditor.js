function initializeCKEditor(selector) {
    const element = document.querySelector(selector);
    if (element) { // Verifica se o elemento existe na página
        ClassicEditor.create(element)
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    editor.updateSourceElement();
                });
            })
            .catch(error => console.error(`Erro ao inicializar o CKEditor em ${selector}:`, error));
    }
}

// Inicializar apenas os editores presentes na página
['.editor-ckeditor1', '.editor-ckeditor2'].forEach(initializeCKEditor);
