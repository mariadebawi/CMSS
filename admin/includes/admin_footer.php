    <!-- jQuery -->

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- google charts -->
   <!-- https://ckeditor.com/ckeditor-5/download/ -->
    <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
    <script>
     
     /**********************  check all chechbox  **********************/

$(document).ready(function(){
    
    var div_box = "<div id='load-screen'><div id='loading'></div></div>";
     $("body").prepend(div_box);
      $('#load-screen').delay(700).fadeOut('slow', function(){
       $(this).remove();
    });

 


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
  ClassicEditor
  .create( document.querySelector('#body'))
  //#body is the id of textaerea
  .catch( error => {
      console.error( error );
  } );



}) ;











    </script>
</body>