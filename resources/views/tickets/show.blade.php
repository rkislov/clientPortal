@extends('layouts.app')

@section('title', $ticket->title)

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    #{{$ticket->ticket_id}} - {{$ticket->title}}
                </div>
                <div class="card-body">
                    @include('includes.flash')

                    <div class="ticket-info">
                        <p>{{$ticket->message}}</p>
                        <P>Категория: {{$ticket->category->name}}</P>
                        <p>
                            @if ($ticket->status_id === 1)
                               Статус: <span class="label alert-warning">{{$ticket->status->name}}</span>
                            @elseif($ticket->status_id->id === 2)
                                Статус: <span class="label alert-info"">{{$ticket->status->name}}</span>
                            @elseif ($ticket->status_id->id === 3)
                                Статус: <span class="label alert-light">{{$ticket->status->name}}</span>
                            @elseif ($ticket->status_id->id === 4)
                                Статус: <span class="label alert-success">{{$ticket->status->name}}</span>
                            @endif
                        </p>
                        <p>
                            Создана: {{$ticket->created_at->diffForHumans () }}
                        </p>
                    </div>
                    <hr>
                    <div class="commments col-md-12">
                        @foreach($ticket->comments as $comment)
                            <div class="card @if($ticket->user->id === $comment->user_id) {{ '' }} @else{{'card-title'}}@endif">
                                <div class="card card-header ">
                                    <div class="row col-md-4">
                                        {{$comment->user->name}}
                                        <span class="col-md-6">{{$comment->created_at->format('d.m.Y')}}</span>
                                    </div>
                                </div>
                                <div class="card card-body">
                                    {{$comment->comment}}
                                </div>
                            </div>
                            <br>
                        @endforeach
                    </div>

                    <div class="comment-form col-md-12">
                        <form action="{{url('comment')}}" method="POST" class="form">
                            {!! csrf_field() !!}

                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                            <div class="form-group{{ $errors->has('comment') ? ' has-errors' : ''}}">

                                <textarea rows="10" id="comment" class="form-group col-md-12" name="comment"></textarea>

                                @if ($errors->has('comment'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('comment')}}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Коментировать</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
