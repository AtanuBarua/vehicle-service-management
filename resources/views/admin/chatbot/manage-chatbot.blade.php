@extends('admin.master')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@section('body')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
        <span class="breadcrumb-item active">Manage Category</span>
    </nav>
    
    <div class="sl-pagebody">
        
         <div class="card pd-20 pd-sm-40">
            <h3 class="text-center text-success"> {{Session::get('message')}} </h3>
            
            <div class="container ">
                <form action="{{route('chatbot')}}" method="post">
                    @csrf
                    <input data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-danger" value="Default Answer">
                    <a class="ml-2" href="{{route('answers')}}"><input type="button" class="btn btn-warning" value="All Answers"></a>
                    <!-- Button trigger modal -->
                    {{-- <button type="button" class="btn btn-primary" >
                        Launch demo modal
                    </button> --}}
                    
                    <!-- Modal -->
                    
                    <div class="mb-3 mt-3">
                        
                        <label for="sampleQuestions" class="form-label mt-2">Sample Questions</label>
                        <input required name="question[]" type="text" class="form-control" id="sampleQuestions" aria-describedby="emailHelp">
                        
                    </div>
                    <div id="moreQuestions" >
                        
                    </div>
                    <input type="button" onclick="addQuestions()" class="btn btn-success mt-2 mb-2" value="Add More Question">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Answer</label>
                        <input required name="answer" type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Default answer if no answer found</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('default-answer')}}" method="POST">
                            <div class="modal-body">	
                                @csrf
                                @if($defaultAnswer)
                                <input required type="text" name="answer" placeholder="Enter default answer" size="45" value="{{$defaultAnswer->answer}}">
                                @else
                                <input required type="text" type="text" name="answer" placeholder="Enter default answer">
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- card -->
        
        
        <!-- card -->
        
        
    </div><!-- sl-pagebody -->
    @include('admin.include.footer')
</div>

<script type="text/javascript">
    
    //let serial = 1;
    function addQuestions(){
        //e.preventDefault();
        let text = "";
        text += `<label class="form-label mt-2">Sample Questions</label>
        <input required name="question[]" type="text" class="form-control mb-2" aria-describedby="emailHelp">`
        
        $("#moreQuestions").append(text);
    }
</script>
@endsection