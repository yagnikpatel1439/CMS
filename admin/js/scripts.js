$(document).ready(function(){
    
    // CKEDITOR

    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );

    // REST



    
});


