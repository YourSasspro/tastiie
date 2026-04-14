@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        @foreach ($notifications as $notification)
            <a href="#" class="text-decoration-none text-dark">
                <div
                    class="card card-shadow mt-3 p-1 {{ is_null($notification->read_at) ? 'border border-primary' : 'border-0' }}">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h4 class="heading m-0">
                                    {{ isset($notification->data['type']) ? __('gen.' . $notification->data['type']) : 'No Type' }}
                                </h4>
                                <p class="description m-0">
                                    {{ __('gen.' . $notification->data['message']) ?? 'No Message' }}
                                    {{ isset($notification->data['data']) ? $notification->data['data'] : 'No Additional Data' }}
                                </p>
                            </div>
                            <div class="col-md-4 text-center text-md-end">
                                @if (is_null($notification->read_at))
                                    <form action="{{ route('mark.as.read') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="notification_id" value="{{ $notification->id }}">
                                        <button type="submit" class="btn delete-btn text-white rounded-0 px-3 py-2 fs-6">
                                            @lang('gen.mark_as_read')
                                        </button>
                                    </form>
                                @else
                                    <span class="badge bg-success">@lang('gen.read')</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
