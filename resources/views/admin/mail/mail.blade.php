@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
    <table class="border border-dark">
        <tr class="border border-dark">
            <td class="border border-dark text-center p-2">Date</td>
            <td class="border border-dark text-center p-2">Name</td>
            <td class="border border-dark text-center p-2">mail</td>
            <td class="border border-dark text-center p-2">subject</td>
            <td class="border border-dark text-center p-2">Message</td>
            <td class="border border-dark text-center p-2">Action</td>
        </tr>
        @foreach($mails as $mail)
        <tr>
            <td class="border border-dark text-center p-2">{{$mail->created_at->format('d')}}/{{$mail->created_at->format('M')}}/{{$mail->created_at->format('Y')}}</td>
            <td class="border border-dark text-center p-2">{{$mail->name}}</td>
            <td class="border border-dark text-center p-2">{{$mail->email}}</td>
            <td class="border border-dark text-center p-2">{{$mail->subject}}</td>
            <td class="border border-dark text-center p-2">{{$mail->message}}</td>
            <td class="border border-dark text-center p-2">
                @can('admin')
                <form action="/delete-email/{{$mail->id}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger mt-2">Delete</button><br><br>
                </form>
                @endcan
            </td>
        </tr>
        @endforeach
    </table>
</div>
@stop