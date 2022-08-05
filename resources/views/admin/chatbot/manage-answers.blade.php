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
            <div class="container">                
                        <table class="table mt-4">
                            <thead>
                                <tr>
                                    <th scope="col">Answer</th>
                                    <th scope="col">Questions</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($answers as $answer)
                                <tr>
                                    <td>{{$answer->answer}}</td>
                                    <td><a href="{{route('questions',['id'=>$answer->id])}}">Click here</a></td>
                                    <td>
                                        @if($answer->defaultAnswer==0)
                                        <form action="{{route('delete-answer')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$answer->id}}">
                                            <input onclick="return confirm('Are you sure to delete?')" type="submit" class="btn btn-danger" value="Delete">
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
         </div>
    </div>
    @include('admin.include.footer')
</div>
@endsection