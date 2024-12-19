<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-
alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-
GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
          crossorigin="anonymous">
    <title>Issue</title>
</head>
<body>

<h1 style="margin: 50px 50px">Cập nhật Issue</h1>

<form action="{{ route('issues.update', $issue->id) }}" method="POST" style="margin: 50px 50px">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="computer_id">Computer</label>
        <select name="computer_id" class="form-control" required>
            @foreach($computers as $computer)
                <option
                    value="{{ $computer->id }}" {{ $computer->id == $issue->computer_id ? 'selected' : '' }}>{{ $computer->computer_name }}
                    - {{ $computer->model }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="reported_by">Người báo cáo sự cố</label>
        <input type="text" name="reported_by" class="form-control" value="{{ $issue->reported_by }}" required>
    </div>
    <div class="form-group">
        <label for="reported_date">Ngày báo cáo sự cố</label>
        <input type="datetime-local" name="reported_date" class="form-control"
               value="{{ date('Y-m-d\TH:i', strtotime($issue->reported_date)) }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="urgency">Mức độ sự cố</label>
        <select name="urgency" class="form-control" required>
            <option value="low" {{ $issue->urgency == 'low' ? 'selected' : '' }}>Low</option>
            <option value="medium" {{ $issue->urgency == 'medium' ? 'selected' : '' }}>Medium</option>
            <option value="high" {{ $issue->urgency == 'high' ? 'selected' : '' }}>High</option>
        </select>
    </div>
    <div class="form-group mb-3">
        <label for="status">Trạng thái hiện tại</label>
        <select name="status" class="form-control" required>
            <option value="open" {{ $issue->status == 'open' ? 'selected' : '' }}>Open</option>
            <option value="in progress" {{ $issue->status == 'in progress' ? 'selected' : '' }}>In Progress</option>
            <option value="resolved" {{ $issue->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>

</body>