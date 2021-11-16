<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Laravel Image Upload</title>
    
</head>

<body>

    <div class="container mt-5">
        <h3 class="text-center mb-5">Image Upload in Laravel</h3>
      <form action="upload" method="post" enctype="multipart/form-data">
      @csrf
      <input type="file" name="doc[]" id="doc" multiple >
      <input type="text" name="name" id="na"  >
      <input type="submit" name="submit" value="save" id="submit">
      </form>
      <b id="sus"> </b>
      <script>
      $(document).ready(function()
      {
          $('#submit').click(function(){

          
        var img=$('#doc').val();
        var na=$('#na').val();
        $.ajax({
            type:'post',
            url:'/upload',
            data:
            {
                image:img,
                name:na
            },
            success:function(result)
            {
                $('#sus').html(result);
            }

        });
    });
      });
   
      
      </script>
    </div>
  
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(function() {
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#images').on('change', function() {
            multiImgPreview(this, 'div.imgPreview');
        });
        });    
    </script>
</body>
</html>