@extends('errors::minimal')

@section('title', $message ?? __('Not Found'))
@section('code', '404')
@section('message', $message ?? __('Not Found'))
