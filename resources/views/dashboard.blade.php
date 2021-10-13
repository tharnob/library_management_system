<?php
use app\Models\Member;
?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>




<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                



        <!-- Large modal -->

        <button type="button" class="btn btn-primary m-5" data-toggle="modal" data-target=".bd-example-modal-lg">Add Members</button>
        
        <!-- ERROR MESSAGE -->
        
@if ($errors->any())
    <div class="alert alert-danger m-5">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('message'))
    <div class="alert alert-success m-5">
        
    {{ Session::get('message') }}
    </div>
@endif

@if (Session::has('msg'))
    <div class="alert alert-success m-5">
        
    {{ Session::get('msg') }}
    </div>
@endif

@if (Session::has('msg1'))
    <div class="alert alert-danger m-5">
        
    {{ Session::get('msg1') }}
    </div>
@endif



        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-5">
            <form method="post" action="{{ route('member.store') }}" enctype="multipart/form-data">
            @csrf


<!-- FORM of Modal -->


            <div class="form-group">


            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="lending_books">Lending Books</label>
                <input type="number" class="form-control" name="lending_books" id="lending_books" placeholder="Lending Numbers of Books">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>




</form>


            </div>

            
        </div>
        </div>
        <br>




<!-- DATA SHOW -->



<div class="container m-5">

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <th>Member ID</th>
                <th>Members Name</th>
                <th>Members Email</th>
                <th>Lending Books Ammount</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($member as $one)
                    <tr>
                        <td>{{$one->id}}</td>
                        <td>{{$one->name}}</td>
                        <td>{{$one->email}}</td>
                        <td>{{$one->lending_books}}</td>
                        <td>
                            <!-- <a href="#" class="btn btn-success">View</a> -->
                            <a href="{{ route('member.edit', $one->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('member.destroy', $one->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</div>




            </div>
            
        </div>
    </div>



    

</body>
</html>


</x-app-layout>
