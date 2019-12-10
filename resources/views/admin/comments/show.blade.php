@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.comment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.comments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.comment.fields.id') }}
                        </th>
                        <td>
                            {{ $comment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comment.fields.rating') }}
                        </th>
                        <td>
                            {{ $comment->rating }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comment.fields.comment_type') }}
                        </th>
                        <td>
                            {{ $comment->comment_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comment.fields.comment') }}
                        </th>
                        <td>
                            {{ $comment->comment }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comment.fields.commenter') }}
                        </th>
                        <td>
                            {{ $comment->commenter->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comment.fields.commentable_type') }}
                        </th>
                        <td>
                            {{ $comment->commentable_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comment.fields.commentable') }}
                        </th>
                        <td>
                            {{ $comment->commentable }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comment.fields.approved') }}
                        </th>
                        <td>
                            {{ $comment->approved }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.comments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>


    </div>
</div>
@endsection