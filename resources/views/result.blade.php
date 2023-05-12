@extends('layout.main')
@section('content')
<div class="container p-3">
   <div class="card">
      <div class="card-header d-flex justify-content-between">
        <b>Result list</b>
        <a class="" href="{{route('3rdHighest')}}">Get 3rd Highest</a>
      </div>
      <div class="card-body">
         <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Mark</th>
                <th scope="col">Subject</th>
                <th scope="col">Student_id</th>
                <th scope="col">Semister_id</th>
              </tr>
            </thead>
            <tbody>
               @foreach($resultData as $key=> $data)
               <tr>
                  <td>{{$data->id}}</td>
                  <td>{{$data->mark}}</td>
                  <td>{{$data->subject}}</td>
                  <td>{{$data->student_id}}</td>
                  <td>{{$data->semister_id}}</td>
               </tr>
               @endforeach
            </tbody>
          </table>
      </div>
    </div>
</div>

@endsection