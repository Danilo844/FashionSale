
    <script>
    $(document).on("ready", function(){
      registerMessages();
      $.ajaxSetup({ "cache":false });
      setInterval("loadOlMessages()", 500); //funcion que va llamar la funcion load y recarga los mensajes

    }); 

    var registerMessages = function(){
      $("#send").on("click", function(e){
        e.preventDefault();
        var frm = $("#formChat").serialize();
        document.Chat.message.value = "";

        $.ajax({
          type: "POST",
          url: "../Model/chat/register.php",
          data: frm, 
          async:false
        }).done(function(info){
          console.log ( info );
        })
        loadOlMessages();
        var altura = $("#conversation").animate({ scrollTop: $(document).height()+10000000},1000);
         //Hacer que el scrol siempre muestre el ultimo mensaje (baje)
          

      });
    }

    var loadOlMessages = function(){
      $.ajax({
        type: "POST",
        url: "../Model/chat/conversation.php"
      }).done(function( info ){
        $("#conversation").html ( info );
        $("#conversation p:last-child").css({
          "background-color": "#F0F8FF",
          "padding-botton": "20px"});   


      });
    }
  </script> 