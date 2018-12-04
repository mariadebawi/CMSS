<footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2018</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>




    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- google charts -->
   <!-- https://ckeditor.com/ckeditor-5/download/ -->
    <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
    <script>
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