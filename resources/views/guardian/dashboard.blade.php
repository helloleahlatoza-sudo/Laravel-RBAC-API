@extends('layouts.app')

@section('title', 'Guardian Portal - OSCA Barangay Anomar')
@section('page_title', 'Guardian Dashboard')

@section('content')
    <div class="p-6 mb-6 bg-white border border-slate-200/80 rounded-2xl shadow-sm">
        <h1 class="text-2xl font-bold text-slate-900">Guardian & Family Member Portal</h1>
        <p class="mt-1 text-sm text-slate-500">
            Welcome, {{ Auth::user()->name }}! Monitor your senior citizen's assistance requests and benefit releases here.
        </p>
    </div>
@endsection