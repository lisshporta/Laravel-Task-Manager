@include('components.header')

<div class="container">
    <h2>{{ isset($task) ? 'Edit' : 'Create' }} Task</h2>

    <form action="{{ isset($task) ? route('update', $task->id) : route('store') }}" method="POST">
        @csrf
        @if(isset($task))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $task->title ?? '') }}" required>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="text" name="description" class="form-control" rows="4" required>{{ old('description', $task->description ?? '') }}</textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="priority">Priority</label>
            <select id="priority" name="priority" class="form-control">
                <option value="0" {{ old('priority', $task->priority ?? '') == '0' ? 'selected' : '' }}>0 - undefined</option>
                <option value="1" {{ old('priority', $task->priority ?? '') == '1' ? 'selected' : '' }}>1 - low</option>
                <option value="2" {{ old('priority', $task->priority ?? '') == '2' ? 'selected' : '' }}>2 - medium</option>
                <option value="3" {{ old('priority', $task->priority ?? '') == '3' ? 'selected' : '' }}>3 - high</option>
            </select>
            @error('priority')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <input type="hidden" name="status" value="false">
            <input type="checkbox" id="status" name="status" value="true" {{ old('status', $task->status ?? false) ? 'checked' : '' }}>
            @error('status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($task) ? 'Update' : 'Create' }} Task</button>
    </form>
</div>
