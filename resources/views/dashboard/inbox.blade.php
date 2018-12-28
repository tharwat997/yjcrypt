@extends('layouts.app')

@section('css')
    <style type="text/css">
        #dataTable > tfoot{
            display: none;
        }

        #app > div > div > div.card.mb-3 > div.card-body{
            padding:1em 0 ;
        }

        #dataTable_wrapper{
            padding: 0 ;
        }
        #dataTable_wrapper > div:nth-child(3),
        #dataTable_wrapper > div:nth-child(1){
            padding: 0 15px;
        }
    </style>
@endsection

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div style="display: flex;flex-direction: column; justify-content: center; margin-bottom: 1em;">
            <h2 class="text-center">Inbox</h2>
            <h2 class="text-center">Welcome {{$userName}}</h2>
        </div>

        <div class="card mb-3">

            <div class="card-header">
                <i class="fa fa-table"></i> Inbox</div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>From</th>
                            <th>Subject</th>
                            <th>Date & Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $message)
                            <tr>
                                <td><a href="{{route('message.view', ['id'=> $message->id ])}}">{{$message->from}}</a></td>
                                <td>{{$message->subject}}</td>
                                <td>{{$message->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid-->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
</div>
@endsection