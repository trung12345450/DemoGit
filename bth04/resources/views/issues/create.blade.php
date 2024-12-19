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


<h1 style="margin: 50px 50px">Thêm Issue mới</h1>
<form action="{{ route('issues.store') }}" method="POST" style="margin: 50px 50px">
    @csrf
    <div class="mb-3">
        <label for="computer_id" class="form-label">Computer</label>
        <select class="form-control" id="computer_id" name="computer_id" required>
            @foreach($computers as $computer)
                <option value="{{ $computer->id }}">{{ $computer->computer_name }} - {{ $computer->model }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="reported_by" class="form-label">Người báo cáo sự cố</label>
        <input type="text" class="form-control" id="reported_by" name="reported_by" required>
    </div>
    <div class="mb-3">
        <label for="reported_date" class="form-label">Ngày báo sự cố</label>
        <input type="datetime-local" class="form-control" id="reported_date" name="reported_date"
               required>
    </div>
    <div class=" mb-3">
        <label for="urgency" class="form-label">Mức độ sự cố</label>
        <select class="form-control" id="urgency" name="urgency" required>
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Trạng thái hiện tại</label>
        <select class="form-control" id="status" name="status" required>
            <option value="open">Open</option>
            <option value="in progress">In Progress</option>
            <option value="resolved">Resolved</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>

</body>