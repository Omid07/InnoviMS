@extends('layouts.app')

@section('content')
<div class = "container">
    <div id="vinvoice">
        <div class="panel panel-default" v-cloak>
            <div class="panel-heading">
                <div class="clearfix">
                    <span class="panel-title">Edit Invoice</span>
                    <a href="{{route('vinvoices.index')}}" class="btn btn-default pull-right">Back</a>
                </div>
            </div>
            <div class="panel-body">
                @include('vinvoices.form')
            </div>
            <div class="panel-footer">
                <a href="{{route('vinvoices.index')}}" class="btn btn-default">CANCEL</a>
                <button class="btn btn-success" @click="update" :disabled="isProcessing">UPDATE</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="/js/vue.min.js"></script>
    <script src="/js/vue-resource.min.js"></script>
    <script type="text/javascript">
        Vue.http.headers.common['X-CSRF-TOKEN'] = '{{csrf_token()}}';

        window._form = {!! $vinvoice->toJson() !!};
    </script>
    <script src="/js/app.js"></script>
@endpush