@extends('layout.main')
@section('content')
<div class="container p-3">
   <div class="card">
      <div class="card-header">
        <b>User list</b>
      </div>
      <div class="card-body">
         <div class="col-mb-12">
            <div class="row">
               <div class="col-md-4">
                  <div class="input-group mb-3">
                     <input type="text" class="form-control" placeholder="Name Or Email" id="search_data">
                     <button class="btn btn-outline-secondary" type="button" id="but_search">Search</button>
                  </div>
               </div>
               <div class="col-md-4"></div>
               <div class="col-md-4">
                  <a class="d-flex justify-content-end" target="_blank" href="{{url('api/v1')}}">Api link</a>
               </div>
               
               
            </div>
         </div>
         <table id='user_data_list' class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <th scope="col">SL</th>
                <th scope="col">Name</th>
                <th scope="col">UUId</th>
              </tr>
            </thead>
            <tbody>
              {{-- Load Data --}}
            </tbody>
          </table>
          <div class="d-flex justify-content-end">
            <input type="hidden" id="next_page_url">
            <button id="next_page" class="btn btn-sm btn-outline-primary">Next</button>
          </div>
          
      </div>
    </div>
</div>
<script type='text/javascript'>
"use strict";
   var csrf = $("#csrf_token").val();
   
   
   $(document).ready(function(){
 
      // AJAX GET request
      $.ajax({
         url: 'api/v1',
         type: 'get',
         dataType: 'json',
         success: function(response){
            
            createRows(response);

         }
      });

      // Search by userid
      $('#but_search').click(function(){
         var search_data = $('#search_data').val();
 
         if(search_data){
           // AJAX POST request
           $.ajax({
               url: 'api/v1?q='+search_data,
               type: 'get',
               dataType: 'json',
               success: function(response){
                  console.log(response);
                  createRows(response);
               }
           });
         }else{
            alert('Please Give Something to Search');
         }
 
      });
      $('#next_page').click(function(){
         var next_page_url = $('#next_page_url').val();
         if(next_page_url){
 
           // AJAX POST request
           $.ajax({
            url: next_page_url,
            type: 'get',
            dataType: 'json',
              success: function(response){
 
                 createRows(response);
 
              }
           });
         }
 
      });
 
   });
 
   // Create table rows
   function createRows(response){
      var len = 0;
      $('#user_data_list tbody').empty(); // Empty <tbody>

      if(response['items'] != null){
         len = response['items'].length;
      }
 
      if(len > 0){
         for(var i=0; i<len; i++){
           var uuid = response['items'][i].uuid;
           var username = response['items'][i].name;
          
           var tr_str = "<tr>" +
             "<td align='left'>" + (i+1) + "</td>" +
             "<td align='left'>" + username + "</td>" +
             "<td align='left'>" + uuid + "</td>" +
             
           "</tr>";
 
           $("#user_data_list tbody").append(tr_str);
         }
         if (response['metadata']['next_url'] != null) {
            
            $("#next_page_url").val(response['metadata']['next_url']);
         } else {
            $("#next_page").prop("hidden",true);
         }

      }else{
         var tr_str = "<tr>" +
           "<td align='center' colspan='3'>No record found.</td>" +
         "</tr>";
 
         $("#user_data_list tbody").append(tr_str);
      }
   } 
   </script>

@endsection