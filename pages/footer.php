
    <script src="js/jquery-ui-1.9.2.datepicker.min.js"></script>
    <script src="js/jquery.reject.js"></script>
    <script src="js/utils.js"></script>

   
    
  <script>
    
 

$(document).ready(function(){
    $(".city").mousedown(function(){
        _this=this;
        $.post("include/city.php",
        function(data,status){
            $(_this).html(data);
        });
    });


    // Write on keyup event of keyword input element
    $("#search").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#table tbody tr"), function() {
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
               $(this).hide();
            else
               $(this).show();            
        });
    });
    

  $( function() {

    $("#md").click(function(){
    $('#myModal').modal('show');
    });


    $(".datepicker").datepicker({
      changeMonth: true,
      changeYear: true
    });

  });


  $('[data-toggle="popover"]').hover(function(){
    $(this).popover("toggle");
    $(this).mouseleave(function(){
      $(this).popover("hide");
    })
  })

// jquery end

});

</script>
</body>
<footer>
  <p class="text-center Copyright">Copyright&copy; <a href="https://www.facebook.com/prof.rakib">Rakib Hossain</a></p>
</footer>
</html>