@include('components.header')
<div class="container">
    <h2>Your Tasks</h2>

    <form id="searchForm" action="{{ route('index') }}" method="GET" class="mb-4">
        <div class="form-group">
            <label for="priority">Priority</label>
            <select id="priority" name="priority" class="form-control">
                <option value="">Select Priority</option>
                <option value="0" {{ request('priority') == '0' ? 'selected' : '' }}>0 - undefined</option>
                <option value="1" {{ request('priority') == '1' ? 'selected' : '' }}>1 - low</option>
                <option value="2" {{ request('priority') == '2' ? 'selected' : '' }}>2 - medium</option>
                <option value="3" {{ request('priority') == '3' ? 'selected' : '' }}>3 - high</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control">
                <option value="">Select Status</option>
                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Completed</option>
                <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Pending</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Search</button>
        <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('index') }}'">Remove Filters</button>
    </form>


    @if($tasks->isEmpty())
        <p>No tasks found</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td class="textbox">{{ $task->title }}</td>
                        <td class="textbox">{{ $task->description }}</td>
                        <td>{{ $task->priority }}</td>
                        <td>{{ $task->status ? 'Completed' : 'Pending' }}</td>
                        <td>{{ $task->created_at->format('d-m-y H:i:s') }}</td>
                        <td>
                            <a href="{{ route('edit', $task->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('destroy', $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
<script>
    document.getElementById('searchForm').addEventListener('submit', function (e) {
        const priority = document.getElementById('priority').value;
        const status = document.getElementById('status').value;

        if (!priority) {
            document.getElementById('priority').removeAttribute('name');
        }

        if (!status) {
            document.getElementById('status').removeAttribute('name');
        }
    });
</script>
