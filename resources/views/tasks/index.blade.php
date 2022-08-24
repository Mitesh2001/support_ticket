@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="col-lg-12">
	<!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="bi bi-people-fill"></i>
                </span>
                <h3 class="form_title">Tasks</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <!--begin: Datatable-->
            <livewire:task-table/>
            <!--end: Datatable-->
            </div>
        </div>
    </div>
    <!--end::Card-->
	</div>
</div>
@endsection
