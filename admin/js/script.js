


/**********************  check all chechbox  **********************/

$(document).ready(function(){
    $('#selectAllBox').click(function(){
     if(this.checked){
         $('.checkBoxes').each(function(){
            this.checked = true ;
         });
     }
     else {
         $('.checkBoxes').each(function(){
             this.checked = false ;
          });
     }
    }) ;
 }) ;
 


 

/****************** ckeditor ******************** */

$(document).ready(function(){
    //https://ckeditor.com/docs/ckeditor5/latest/builds/guides/quick-start.html
  ClassicEditor
  .create( document.querySelector('#body'))
  //#body is the id of textaerea
  .catch( error => {
      console.error( error );
  } );
}) ;




