@extends('Layout.layoutd')

@section('Contents')

@include('Component.navbar')
@include('Component.sidebar')

<!-- DIRECT Coment -->
<div class="row">
    <div class="col-md-12">
        <div class="card direct-chat direct-chat-warning">
            <div class="card-header">
                <h3 class="card-title">Chat Room</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="height: 400px; overflow-y: auto;">
                <div class="direct-chat-messages" style="height: 300px; overflow-y: auto;">
                    @foreach($messages as $message)
                        <div class="direct-chat-msg {{ $message->user->id == Auth::id() ? 'right' : '' }}">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-{{ $message->user->id == Auth::id() ? 'right' : 'left' }}">{{ $message->user->name }}</span>
                                <span class="direct-chat-timestamp float-{{ $message->user->id == Auth::id() ? 'left' : 'right' }}">{{ $message->created_at->format('d M h:i a') }}</span>
                            </div>
                            <img class="direct-chat-img" src="{{ asset('template/dist/img/user1-128x128.jpg') }}" alt="message user image">
                            <div class="direct-chat-text">
                                {{ $message->message }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer">
                <form action="{{ url('/comment-page') }}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="message" placeholder="Type Message ..." class="form-control" required>
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-warning">Send</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
    @parent
    <style>
        .direct-chat .direct-chat-messages {
            height: 400px;
            overflow-y: auto;
        }

        .direct-chat .direct-chat-msg {
            margin-bottom: 10px;
        }

        .direct-chat .right .direct-chat-text {
            background: #3c8dbc;
            color: #fff;
            border-color: #367fa9;
        }

        .direct-chat .right .direct-chat-infos .direct-chat-name {
            color: #fff;
        }

        .direct-chat .right .direct-chat-infos .direct-chat-timestamp {
            color: rgba(255, 255, 255, 0.8);
        }

        .direct-chat .right .direct-chat-infos {
            text-align: right;
        }

        .card-footer {
            margin-top: 10px;
        }
    </style>
@endsection
