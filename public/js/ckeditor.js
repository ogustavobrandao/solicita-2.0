$el1 = document.getElementsByClassName('editor-ckeditor1');
$el2 = document.getElementsByClassName('editor-ckeditor2');
if ($el1.length > 0) ClassicEditor.create( document.querySelector( '.editor-ckeditor1' ));
if ($el2.length > 0) ClassicEditor.create( document.querySelector( '.editor-ckeditor2' ));
