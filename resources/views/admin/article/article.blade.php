@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="form-row">
                <div class="form-group">
                  <label>Select Multiple</label>
                  <select multiple="" class="form-control" name="cats[]">
                @foreach ($tags as $item)


                                  <option value="{{$item->id}}"  {{ in_array($item->id, old('cats') ?: []) ? 'selected' : '' }}>{{$item->name}}</option>

                                  @endforeach
                                </select>
                              </div>


            </div>
@stop