@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container mx-auto">
    <table class="border border-dark">
        <tr class="border border-dark">
            <td class="border border-dark text-center p-2">mail</td>
            <td class="border border-dark text-center p-2">Action</td>
        </tr>
        @foreach($mails as $mail)
        <tr>
            <td class="border border-dark text-center p-2">{{$mail->email}}</td>
            <td class="border border-dark text-center p-2">
                <form action="/delete-newsletter/{{$mail->id}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger mt-2">Delete</button><br><br>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@stop