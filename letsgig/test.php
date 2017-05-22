<?php
    if (isset($_GET['var_PHP_data'])) {
      echo $_GET['var_PHP_data'];
    } else {
    ?>
    <!DOCTYPE html>
    <html>
      <head>
      </head>
      <body>
<script>
            $(document).ready(function() {
                $('#sub').click(function() {
                    var var_data = "Hello World";
                    $.ajax({
                        url: 'test.php',
                        type: 'GET',
                         data: { var_PHP_data: var_data },
                         success: function(data) {
                             // do something;
                            $('#result').html(data)
                         }
                     });
                 });
             });
</script>
        <input type="submit" value="Submit" id="sub"/>
        <div id="result">
      </body>
    </html>
    <?php } ?>