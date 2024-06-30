@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
    @include('packages/datasynchronize::partials.importer')
@stop
