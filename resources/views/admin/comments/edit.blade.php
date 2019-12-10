@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.comment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.comments.update", [$comment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="rating">{{ trans('cruds.comment.fields.rating') }}</label>
                <input class="form-control {{ $errors->has('rating') ? 'is-invalid' : '' }}" type="number" name="rating" id="rating" value="{{ old('rating', $comment->rating) }}" step="0.01">
                @if($errors->has('rating'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rating') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.comment.fields.rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="comment_type">{{ trans('cruds.comment.fields.comment_type') }}</label>
                <input class="form-control {{ $errors->has('comment_type') ? 'is-invalid' : '' }}" type="text" name="comment_type" id="comment_type" value="{{ old('comment_type', $comment->comment_type) }}" required>
                @if($errors->has('comment_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comment_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.comment.fields.comment_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comment">{{ trans('cruds.comment.fields.comment') }}</label>
                <textarea class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" name="comment" id="comment">{{ old('comment', $comment->comment) }}</textarea>
                @if($errors->has('comment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.comment.fields.comment_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="commenter_id">{{ trans('cruds.comment.fields.commenter') }}</label>
                <select class="form-control select2 {{ $errors->has('commenter') ? 'is-invalid' : '' }}" name="commenter_id" id="commenter_id">
                    @foreach($commenters as $id => $commenter)
                        <option value="{{ $id }}" {{ ($comment->commenter ? $comment->commenter->id : old('commenter_id')) == $id ? 'selected' : '' }}>{{ $commenter }}</option>
                    @endforeach
                </select>
                @if($errors->has('commenter_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('commenter_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.comment.fields.commenter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="commentable_type">{{ trans('cruds.comment.fields.commentable_type') }}</label>
                <input class="form-control {{ $errors->has('commentable_type') ? 'is-invalid' : '' }}" type="text" name="commentable_type" id="commentable_type" value="{{ old('commentable_type', $comment->commentable_type) }}">
                @if($errors->has('commentable_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('commentable_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.comment.fields.commentable_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="commentable">{{ trans('cruds.comment.fields.commentable') }}</label>
                <input class="form-control {{ $errors->has('commentable') ? 'is-invalid' : '' }}" type="text" name="commentable" id="commentable" value="{{ old('commentable', $comment->commentable) }}">
                @if($errors->has('commentable'))
                    <div class="invalid-feedback">
                        {{ $errors->first('commentable') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.comment.fields.commentable_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="approved">{{ trans('cruds.comment.fields.approved') }}</label>
                <input class="form-control {{ $errors->has('approved') ? 'is-invalid' : '' }}" type="number" name="approved" id="approved" value="{{ old('approved', $comment->approved) }}" step="1">
                @if($errors->has('approved'))
                    <div class="invalid-feedback">
                        {{ $errors->first('approved') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.comment.fields.approved_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>


    </div>
</div>
@endsection