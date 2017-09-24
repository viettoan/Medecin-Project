<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="js/dropzone/dropzone.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</head>
<body>
   <div class="container">


     <!-- HTML heavily inspired by http://blueimp.github.io/jQuery-File-Upload/ -->
    <form action="upload" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <input id='file' type="file" name='file'>
      <button type='submit' id="submit">ok</button>
      <p id="status"></p>
    </form>



      <br>
    <video  controls='controls'>
      <source src="http://sanchoi.net/video/rememberthenam.mp4">
    </video>

</div>
{{-- <script src='js/dropzone/dropzone.min.js' ></script> --}}
<script>

  $(document).ready(function() {
    $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $("input[name='_token']").val()
           }
    });
    $('form').submit(function(e) {
      e.preventDefault();
      $('#status').text("Uploading...")
      var dataform = new FormData();
      var _token = $("input[name='_token']").val();
      if($("#file")[0].files.length>0)
       {
         dataform.append("image",$("#file")[0].files[0]);
       }
      // console.log(dataform)
       $.ajax({
         type: 'POST',
         url: '/upload',
         data: dataform,
         enctype: 'multipart/form-data',
         contentType: false,
         processData: false,
         success: function(response)
         {
             console.log(response)
             $('#status').text("Upload thành công")
         }
     })


    })
  })
</script>
</body>
</html>
