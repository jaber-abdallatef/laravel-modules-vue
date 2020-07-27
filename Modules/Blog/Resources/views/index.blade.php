@extends('blog::layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <data-loader></data-loader>
        <data-form view-id="blog"></data-form>
        <data-table data-src="blog"></data-table>
        </div>
    </div>
</div>
@endsection
