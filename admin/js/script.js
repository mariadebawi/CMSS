
$(window).on('load', function () {
    alert("stop555555") ;
    // div_box = "<div id='load-screen'><div id='loading'></div></div>";

/*  $("body").prepend(div_box);
    $('#load-screen').delay(700).fadeOut(600, function(){
       $(this).remove();
    });*/
}) ;

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


    /*********************** Loading *******************************/

 }) ;
 


 

/****************** ckeditor ******************** */

$(document).ready(function(){
    //https://ckeditor.com/docs/ckeditor5/latest/builds/guides/quick-start.html
/*  ClassicEditor
  .create( document.querySelector('#body'))
  //#body is the id of textaerea
  .catch( error => {
      console.error( error );
  } );*/


  //alert("stop555555") ;

}) ;




