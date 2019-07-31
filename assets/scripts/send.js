$(function() {

  $(".send__btn").click(function() {
      var name    = $("#user").val();
      console.log(name);
      var msg = $("#comment").val();
      console.log(msg);
      $.ajax({
          type: "POST",
          url: "./assets/scripts/dbConnect.php",
          data: {
            name:name, msg:msg
          },
          success: function(html){
              $(".comments").toggle(200, function(){
                  $(this).html(html).slideToggle(200);
              
              })}

      });
      return false;
  });
});