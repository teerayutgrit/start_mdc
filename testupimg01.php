<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Multiple Images</title>
</head>
<body>
    <form id="uploadForm" action="testupimg02.php" method="POST" enctype="multipart/form-data">
        <div class="col-md-3">
            <label for="fileToUpload" class="form-label">รูป</label>
            <input type="file" name="filesToUpload[]" class="form-control is-valid" id="fileToUpload" multiple required>
            <div class="invalid-feedback"></div>
        </div>
        <input type="text" name="OutletName" placeholder="Outlet Name" required>
        <button type="button" class="btn btn-primary" onclick="resizeAndUpload()">Upload</button>
    </form>
    <canvas id="canvas" style="display: none;"></canvas>

    <script>
        function resizeAndUpload() {
            const fileInput = document.getElementById('fileToUpload');
            const canvas = document.getElementById('canvas');
            const max_width = 1920; // Maximum width of the resized image
            const max_height = 1080; // Maximum height of the resized image

            if (fileInput.files.length > 0) {
                const files = Array.from(fileInput.files);
                const formData = new FormData(document.getElementById('uploadForm'));

                let fileCounter = 0;

                files.forEach(file => {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const img = new Image();
                        img.onload = function() {
                            let width = img.width;
                            let height = img.height;
                            const ratio = width / height;

                            if (width > max_width) {
                                width = max_width;
                                height = max_width / ratio;
                            }

                            if (height > max_height) {
                                height = max_height;
                                width = max_height * ratio;
                            }

                            canvas.width = width;
                            canvas.height = height;
                            const ctx = canvas.getContext('2d');
                            ctx.drawImage(img, 0, 0, width, height);

                            canvas.toBlob(function(blob) {
                                formData.append('filesToUpload[]', blob, file.name);

                                fileCounter++;
                                if (fileCounter === files.length) {
                                    fetch('testupimg02.php', {
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.text())
                                    .then(result => {
                                        console.log('Success:', result);
                                        alert('Upload successful');
                                        // window.location.href = 'salevisit_new.php'; // Redirect if needed
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                    });
                                }
                            }, file.type, 0.85); // Adjust the quality parameter if needed
                        };

                        img.src = e.target.result;
                    };

                    reader.readAsDataURL(file);
                });
            } else {
                alert('No file selected.');
            }
        }
    </script>

    <!-- <script>
    function resizeAndUpload() {
        const fileInput = document.getElementById('fileToUpload');
        const canvas = document.getElementById('canvas');
        const max_width = 1920;
        const max_height = 1080;

        if (fileInput.files.length > 0) {
            const files = Array.from(fileInput.files);
            const formData = new FormData(document.getElementById('uploadForm'));

            let processedFiles = 0;

            files.forEach((file, index) => {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = new Image();
                    img.onload = function() {
                        let width = img.width;
                        let height = img.height;
                        const ratio = width / height;

                        if (width > max_width) {
                            width = max_width;
                            height = max_width / ratio;
                        }

                        if (height > max_height) {
                            height = max_height;
                            width = max_height * ratio;
                        }

                        canvas.width = width;
                        canvas.height = height;
                        const ctx = canvas.getContext('2d');
                        ctx.drawImage(img, 0, 0, width, height);

                        canvas.toBlob(function(blob) {
                            // Append the blob to the formData with a unique file name
                            formData.append('filesToUpload[]', blob, `${file.name}_${index}_${Date.now()}`);

                            processedFiles++;
                            if (processedFiles === files.length) {
                                fetch('salevisit_insertdatatest.php', {
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text())
                                .then(result => {
                                    console.log('Success:', result);
                                    $('#saveModal').modal('show');
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                });
                            }
                        }, file.type, 0.85);
                    };

                    img.src = e.target.result;
                };

                reader.readAsDataURL(file);
            });
        } else {
            alert('No file selected.');
        }
    }
</script> -->
</body>
</html>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Multiple Images</title>
</head>
<body>
    <form id="uploadForm" action="testupimg02.php" method="POST" enctype="multipart/form-data">
        <div class="col-md-3">
            <label for="fileToUpload" class="form-label">รูป</label>
            <input type="file" name="filesToUpload[]" class="form-control is-valid" id="fileToUpload" multiple required>
            <div class="invalid-feedback"></div>
        </div>
        <input type="text" name="OutletName" placeholder="Outlet Name" required>
        <button type="button" class="btn btn-primary" onclick="resizeAndUpload()">Upload</button>
    </form>
    <canvas id="canvas" style="display: none;"></canvas>

    <script>
        function resizeAndUpload() {
            const fileInput = document.getElementById('fileToUpload');
            const canvas = document.getElementById('canvas');
            const max_width = 1920; // Maximum width of the resized image
            const max_height = 1080; // Maximum height of the resized image

            if (fileInput.files.length > 0) {
                const files = Array.from(fileInput.files);
                const formData = new FormData(document.getElementById('uploadForm'));
                const uploadedFileNames = new Set(); // Set to store uploaded file names

                let fileCounter = 0;

                files.forEach(file => {
                    if (!uploadedFileNames.has(file.name)) { // Check if file name is not already uploaded
                        uploadedFileNames.add(file.name); // Add file name to the set

                        const reader = new FileReader();

                        reader.onload = function(e) {
                            const img = new Image();
                            img.onload = function() {
                                let width = img.width;
                                let height = img.height;
                                const ratio = width / height;

                                if (width > max_width) {
                                    width = max_width;
                                    height = max_width / ratio;
                                }

                                if (height > max_height) {
                                    height = max_height;
                                    width = max_height * ratio;
                                }

                                canvas.width = width;
                                canvas.height = height;
                                const ctx = canvas.getContext('2d');
                                ctx.drawImage(img, 0, 0, width, height);

                                canvas.toBlob(function(blob) {
                                    formData.append('filesToUpload[]', blob, file.name);

                                    fileCounter++;
                                    if (fileCounter === files.length) {
                                        fetch('testupimg02.php', {
                                            method: 'POST',
                                            body: formData
                                        })
                                        .then(response => response.text())
                                        .then(result => {
                                            console.log('Success:', result);
                                            alert('Upload successful');
                                            // window.location.href = 'salevisit_new.php'; // Redirect if needed
                                        })
                                        .catch(error => {
                                            console.error('Error:', error);
                                        });
                                    }
                                }, file.type, 0.85); // Adjust the quality parameter if needed
                            };

                            img.src = e.target.result;
                        };

                        reader.readAsDataURL(file);
                    } else {
                        console.log(`File ${file.name} is already uploaded. Skipping.`);
                    }
                });
            } else {
                alert('No file selected.');
            }
        }
    </script>
</body>
</html> -->
