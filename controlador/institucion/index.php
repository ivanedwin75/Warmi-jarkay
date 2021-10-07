<!doctype html>
   <html>
    <head lang="en">
       <meta charset="utf-8">
       <title>Ajax File Upload with jQuery and PHP</title>
       <link rel="stylesheet" href="style.css" type="text/css" />
       <script type="text/javascript" src="js/script.js"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   </head>
   <body>
      <div class="container">
         <div class="row">
            <div class="col-md-8">
            <hr> 
            <form id="form" action="cargar2.php" method="post">
               <div class="form-group">
                  <label for="name">NAME</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required />
               </div>
               <div class="form-group">
                  <label for="email">EMAIL</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required />
               </div>
               <input enctype="multipart/form-data" id="uploadImage" type="file" accept="image/*" name="image" />
               <div id="preview"><img src="filed.png" /></div><br>
               <input class="btn btn-success" type="submit" value="Upload">
            </form>
            <div id="err"></div>
            <hr>
            </div>
         </div>
      </div>
   
      <script>
      $(document).ready(function (e) {
         $("#form").on('submit',(function(e) {
            e.preventDefault();
            var  formdata = new FormData(this);
            for (let [key, value] of formdata) {
               console.log(`${key}: ${value}`)
            }
            $.ajax({
               url: "cargar2.php",
               type: "POST",
               data:  formdata,
               contentType: false,
               cache: false,
               processData:false,
               
               beforeSend : function() {
                  //$("#preview").fadeOut();
                  $("#err").fadeOut();
               },

               success: function(data){
                  if(data=='invalid'){
                     // invalid file format.
                     $("#err").html("Invalid File !").fadeIn();
                     alert("Hola");
                  }
                  else{
                     // view uploaded file.
                     $("#preview").html(data).fadeIn();
                     $("#form")[0].reset(); 
                  }
               },
               error: function(e){
                  $("#err").html(e).fadeIn();
               }          
            });
         }));
      });
   </script>
   
   
   </body>
   
</html>

<?php        
        
        echo sys_get_temp_dir();
        /*
        echo exec('whoami');
        echo get_current_user();
        */
        echo php_ini_loaded_file();
?>
