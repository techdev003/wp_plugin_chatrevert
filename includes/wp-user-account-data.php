<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>

            $.ajax({
                  url: "https://api.aiharness.io/api/register",
                  type: 'POST',
                  dataType:'json',
                  data: {'email': "<?php echo $email;?>"}
                  }).done(function(response){
                        if(response.result=='Success'){
                              console.log(response.data);
                              }
                  
                  }).fail(function(jqXHR, textStatus, errorThrown){
                        alert('FAILED! ERROR: ' + errorThrown);
                  });

</script>