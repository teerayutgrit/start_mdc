<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown with Custom Input</title>
    
    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <form method="POST" action="">
            <label for="user_name">User Name:</label>
            <select class="form-control" name="user_name" id="user_name" style="width: 100%;">
                <option value="John">John</option>
                <option value="Jane">Jane</option>
                <option value="Doe">Doe</option>
            </select>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>

    <!-- Include jQuery and Select2 JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#user_name').select2({
                tags: true,
                placeholder: 'Select or type to add new',
                allowClear: true
            });
        });
    </script>
</body>
</html>
