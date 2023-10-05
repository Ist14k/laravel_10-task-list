@extends('layout.base')

@section('title', 'Edit Task')

@include('form', ['task' => $task])
