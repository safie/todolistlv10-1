@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Task Detail</div>

                <div class="card-body">
                   <h3>{{ $task->title }}</h3>
                   ~{{ $task->user->name }} || {{\Carbon\Carbon::parse($task->due_date)->format('d-m-Y')}}
                   <hr>
                   <h5>Comment(s)</h5>
                   @forelse ($task->comments as $comment)
                    <div class="comment">
                        <strong>{{ $comment->user->name }}</strong> <br>
                        {{ $comment->content }}
                        <br>
                        <hr>
                    </div>
                    @empty
                    <center>No Comment to show</center>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
<form method="POST"  action="{{ route('tasks.store') }}" class="form-horizontal">
     @csrf
    <div class="form-group {{ $errors->has('inputname') ? 'has-error' : '' }}">
        <label for="inputname">Input label</label>
        <select id="negeriselect" name="negeriselect" class="form-control" disabled>
            <option value="2">Johor</option>
            <option value="3">Pulau Pinang</option>
        </select>
        <small class="text-danger">{{ $errors->first('inputname') }}</small>
    </div>

    <input type="hidden" name="negeri" value="value" id="negeri">

    <div class="btn-group float-right">
        <button type="reset" class="btn btn-warning">Reset</button>
        <button type="submit" class="btn btn-success">Add</button>
    </div>

</form>
@endsection
