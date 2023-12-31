@extends('layouts.app')

@section('style')
    <style>
        .add {
            margin-left: auto;
        }
    </style>
@endsection

@section('title')
    Support
@endsection

@section('subtitle')
    In case you need help, please don't hesitate to contact us. and we will be happy to help you.
@endsection


@section('content')

    <div class="add">
        <a class="simple-btn" href="{{ route('support.client.create') }}">New Ticket</a>
    </div>

    @if (count($support_messages) == 0)
        <div class="alert alert-info">No tickets yet.</div>
    @else
        <div class="display-table">
            <table>
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>view</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($support_messages as $tickets)
                        <tr>
                            <td mobile-title="Subject">{{ $tickets->subject }}</td>
                            <td mobile-title="Status">{{ $tickets->status }}</td>
                            <td mobile-title="view"><a href="{{ route('support.client.show', $tickets->id) }}"
                                    class="simple-btn">view</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $support_messages->links() }}
    @endif


@endsection

