<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
</head>
<body>
    <h1>Job Portal - Submit Your Resume</h1>
    <form action="upload.jsp" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Phone Number">
        <input type="file" name="resume" accept=".pdf, .doc, .docx" required>
        <input type="submit" value="Submit Resume">
    </form>
</body>
</html>
