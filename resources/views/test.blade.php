@extends('front.master')

@section('body')
<div>
  <form action="{{route('file-submit')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">File</label>
      <input type="file" name="file" id="file">
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button onclick="submitForm(event)" type="submit" class="btn btn-primary">Submit</button>
  </form>
  
  <script>
    function submitForm(event){
      
      event.preventDefault();
      let email = $("#email").val();
      let file = $("#file").val();
      $.ajax({
        type: 'POST',
        dataType: 'json',
        data: {
          email: email,
          file: file,
        },
        url: '{{route('file-submit')}}',
        success: function(){
          
        }
        
      })
    }

  
  </script>
</div>
@endsection