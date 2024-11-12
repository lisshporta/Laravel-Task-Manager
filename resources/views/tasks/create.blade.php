@include('components.header')
    <div class="container">
        <h2>Create New Task</h2>

        <form action="{{ route('store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="text" name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="priority">Priority</label>
                <select id="priority" name="priority" class="form-control">
                    <option value="0" {{ old('priority', '0') == '0' ? 'selected' : '' }}>Select Priority</option>
                    <option value="1" {{ old('priority') == '1' ? 'selected' : '' }}>1 - low</option>
                    <option value="2" {{ old('priority') == '2' ? 'selected' : '' }}>2 - medium</option>
                    <option value="3" {{ old('priority') == '3' ? 'selected' : '' }}>3 - high</option>
                </select>
                @error('priority')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create Task</button>
        </form>
    </div>
