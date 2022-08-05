<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    body {
      margin: 0 auto;
      max-width: 800px;
      padding: 0 20px;
    }

    .container {
      border: 2px solid #dedede;
      background-color: #f1f1f1;
      border-radius: 5px;
      padding: 10px;
      margin: 10px 0;
    }

    .darker {
      border-color: #ccc;
      background-color: #ddd;
    }

    .container::after {
      content: "";
      clear: both;
      display: table;
    }

    .container img {
      float: left;
      max-width: 60px;
      width: 100%;
      margin-right: 20px;
      border-radius: 50%;
    }

    .container img.right {
      float: right;
      margin-left: 20px;
      margin-right:0;
    }

    .time-right {
      float: right;
      color: #aaa;
    }

    .time-left {
      float: left;
      color: #999;
    }

    #outerDivWrapper {
     height: 100%;
     margin: 0em;
   }

   .scrollableContent {
     height: 100%;
     margin: 0em;
     overflow-y: auto;
   }
 </style>
 {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>
<body>
  <div class="d-flex justify-content-start">
    <a href="{{route('/')}}" class="btn btn-success mt-4 mb-4">Home</a>
  </div>
  <h2>Chat Bot</h2>
  <div id="outerDivWrapper">


    <div id="chat" class="scrollableContent">

    </div>

    <form action="{{route('chat')}}" method="POST">
      @csrf
      <textarea id="message" placeholder="Write message.." name="message"></textarea>

    </form>
  </div>
  <script type="text/javascript">
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
    });

    $("input[type=submit]").on('click',function(e){
      e.preventDefault();
      sendMessage();
    })

    $(document).on('keypress',function(e) {
      if(e.which == 13) {
        sendMessage();
      }
    });

    function sendMessage(){
      //e.preventDefault();
      let message = $("#message").val();
      $.ajax({
        type: 'POST',
        url: '/chatSend',
        dataType: 'json',
        data:{
          "_token": "{{ csrf_token() }}",
          message: message

        },
        success: function(data){
          //console.log(data);
          $("#message").val("");
          showMessage();
          setTimeout(function(){
            botReply(data.reply);
          }, 3000);
        }
        
      })
    }

    function botReply(reply){
      $.ajax({
        type: 'POST',
        url: '/reply',
        dataType: 'json',
        data: reply,

        success: function(res){
          showMessage();
        }
      })
    }

    function showMessage(){
      $.ajax({
        type: 'GET',
        url: '/chats',
        dataType: 'json',
        
        success: function(response){
          let text = "";
          $.each(response.chats, function(key, value){
            text += `${value['reply']==1 ? 

            `<div class="container">
            
            <i class="fas fa-user"> Bot </i>
            <p>${value.message}</p>
            <span class="time-right">${value.created_at}</span>
            </div>` :

            `<div class="container darker">
            <i class="far fa-user"> User </i>
            <p>${value.message}</p>
            <span class="time-left">${value.created_at}</span>
            </div>
            ` } `

            $("#chat").html(text);

          })
        }
      })
    }

    showMessage();
  </script>
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
