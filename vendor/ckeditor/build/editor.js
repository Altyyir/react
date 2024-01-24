import { SimpleUploadAdapter } from '@ckeditor/ckeditor5-upload';

ClassicEditor
    .create( document.querySelector( '#editor' ), {
        ckfinder:
        {
            uploadUrl: 'ckfileupload.php'
        }
    } )
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error( error );
    });

        // ClassicEditor
        //     .create( document.querySelector( '#editor' ),{
        //         ckfinder:
        //         {
        //             uploadUrl: 'ckfileupload.php'
        //         }
        //     } )
            // .then(editor => {
            //     console.log(editor);
            // })
            // .catch( error => {
            //     console.error( error );
            // });
   
   
        // ClassicEditor
        //     .create( document.querySelector( '#editor1' ) )
        //     .catch( error => {
        //         console.error( error );
        //     } );

        // ClassicEditor
        //     .create( document.querySelector( '#editor2' ) )
        //     .catch( error => {
        //         console.error( error );
        //     } );

        // ClassicEditor
        //     .create( document.querySelector( '#editor3' ) )
        //     .catch( error => {
        //         console.error( error );
        //     } );

        // ClassicEditor
        //     .create( document.querySelector( '#editor4' ) )
        //     .catch( error => {
        //         console.error( error );
        //     } );

        // ClassicEditor
        //     .create( document.querySelector( '#editor5' ) )
        //     .catch( error => {
        //         console.error( error );
        //     } );
 
        // ClassicEditor
        //     .create( document.querySelector( '#editor6' ) )
        //     .catch( error => {
        //         console.error( error );
        //     } );
