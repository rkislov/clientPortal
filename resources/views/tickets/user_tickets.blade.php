@extends('layouts.app')

@section('title','Мои заявки')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-ticket">Мои заявки</i>
                </div>

                <div class="card-body">
                    @if ($tickets->isEmpty())
                        <p>Вы не создавали заявок</p>
                    @else
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Категория</th>
                                <th>Название</th>
                                <th>Стаус</th>
                                <th>последнее обновление</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tickets as $ticket)
                                <tr>
                                    <td>{{$ticket->category->name}}</td>
                                    <td>
                                        <a href="{{ url('/'.$ticket->ticket_id) }}">
                                            #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                        </a>
                                    </td>

                                <td>
                                    @if ($ticket->status_id === 1)
                                      <span class="label alert-warning">{{$ticket->status->name}}</span>
                                    @elseif($ticket->status_id->id === 2)
                                         <span class="label alert-info"">{{$ticket->status->name}}</span>
                                    @elseif ($ticket->status_id->id === 3)
                                         <span class="label alert-light">{{$ticket->status->name}}</span>
                                    @elseif ($ticket->status_id->id === 4)
                                        <span class="label alert-success">{{$ticket->status->name}}</span>
                                    @endif
                                </td>
                                <td>{{$ticket->updated_at->format('d.m.Y H:i:s')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $tickets->render() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
