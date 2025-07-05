
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Career Input Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body style="background-color:#1e1e1e; color: white;">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Enter Your Skill Levels</h2>
        <form action="career_result.php" method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Programming</label>
                    <select name="Programming" class="form-select">
                        <option>Not Interested</option>
                        <option>Poor</option>
                        <option>Beginner</option>
                        <option>Average</option>
                        <option>Intermediate</option>
                        <option>Professional</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Communication</label>
                    <select name="Communication" class="form-select">
                        <option>Not Interested</option>
                        <option>Poor</option>
                        <option>Beginner</option>
                        <option>Average</option>
                        <option>Intermediate</option>
                        <option>Professional</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Teamwork</label>
                    <select name="Teamwork" class="form-select">
                        <option>Not Interested</option>
                        <option>Poor</option>
                        <option>Beginner</option>
                        <option>Average</option>
                        <option>Intermediate</option>
                        <option>Professional</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>ProblemSolving</label>
                    <select name="ProblemSolving" class="form-select">
                        <option>Not Interested</option>
                        <option>Poor</option>
                        <option>Beginner</option>
                        <option>Average</option>
                        <option>Intermediate</option>
                        <option>Professional</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Leadership</label>
                    <select name="Leadership" class="form-select">
                        <option>Not Interested</option>
                        <option>Poor</option>
                        <option>Beginner</option>
                        <option>Average</option>
                        <option>Intermediate</option>
                        <option>Professional</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Creativity</label>
                    <select name="Creativity" class="form-select">
                        <option>Not Interested</option>
                        <option>Poor</option>
                        <option>Beginner</option>
                        <option>Average</option>
                        <option>Intermediate</option>
                        <option>Professional</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Adaptability</label>
                    <select name="Adaptability" class="form-select">
                        <option>Not Interested</option>
                        <option>Poor</option>
                        <option>Beginner</option>
                        <option>Average</option>
                        <option>Intermediate</option>
                        <option>Professional</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>DataAnalysis</label>
                    <select name="DataAnalysis" class="form-select">
                        <option>Not Interested</option>
                        <option>Poor</option>
                        <option>Beginner</option>
                        <option>Average</option>
                        <option>Intermediate</option>
                        <option>Professional</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>ProjectManagement</label>
                    <select name="ProjectManagement" class="form-select">
                        <option>Not Interested</option>
                        <option>Poor</option>
                        <option>Beginner</option>
                        <option>Average</option>
                        <option>Intermediate</option>
                        <option>Professional</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>TimeManagement</label>
                    <select name="TimeManagement" class="form-select">
                        <option>Not Interested</option>
                        <option>Poor</option>
                        <option>Beginner</option>
                        <option>Average</option>
                        <option>Intermediate</option>
                        <option>Professional</option>
                    </select>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success mt-4">Predict Career</button>
            </div>
        </form>
    </div>
</body>
</html>
