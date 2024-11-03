@extends('layouts.PanelMaster')

@section('content')
    <main class="flex-1 bg-cu-light py-6 px-8">
        <x-unit.general-worksheet :units="$units"/>
    </main>
@endsection

