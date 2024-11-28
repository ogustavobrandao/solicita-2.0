ClassicEditor.create(document.querySelector('.editor-ckeditor1'))
    .then(editor => {
        editor.model.document.on('change:data', () => {
            editor.updateSourceElement();
        });
    })
    .catch(error => console.error('Erro ao inicializar o CKEditor:', error));
