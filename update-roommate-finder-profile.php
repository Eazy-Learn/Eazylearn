<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Easy Learn - Roomate Finder</title>
    <link rel="stylesheet" href="vendors/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="css/new.css">
</head>

<body>

    <section class="roommate-finder">
        <nav class="top-nav bg-2 d-flex-sb">
            <div class="d-flex">
                <a href="index.html">
                    <i class="bi bi-chevron-left"></i>
                </a>
                <h5>Roommate Finder</h5>
            </div>

            <div class="top-nav-profile-pic">
                <a href="#"><img src="img/profile-pic/profile3.jpg"></a>
            </div>
        </nav>

        <div class="container rm-finder-wrapper update-rmf-profile">
            <div class="sub-header d-flex-sb">
                <a href="#">General</a>
                <a href="#" class="active">Profile Picture</a>
                <a href="#" class="active">Location <i class="bi bi-geo"></i></a>
            </div>
            <br>
            <form role="form" class="text-center">
                <div class="form-group">
                    <label>My Budget</label>
                    <input type="text" class="form-control" value="N 65,000">
                </div>
                <div class="form-group">
                    <label>Tell us about yourself and what you're looking for</label>
                    <textarea class="form-control" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <p>Do You Smoke?</p>
                    <input type="button" value="YES I DO">
                    <input type="button" value="NOPE">
                </div>
                <div class="form-group">
                    <p>Do You Like Pets?</p>
                    <input type="button" value="YES I DO" contenteditable="">
                    <input type="button" value="NOPE">
                </div>
                <div class="form-group">
                    <p>Choose Profession</p>
                    <input type="radio" name="profession" id="student" value="Student">
                    <label for="student">Student</label>
                    <input type="radio" name="profession" id="freelancer" value="Freelancer">
                    <label for="freelancer">Freelancer</label>
                    <input type="radio" name="profession" id="nysc" value="NYSC">
                    <label for="nysc">NYSC</label>
                    <input type="radio" name="profession" id="intern" value="Intern">
                    <label for="intern">Intern</label>
                    <input type="radio" name="profession" id="professional" value="Professional">
                    <label for="professional">Professional</label>
                </div>
                <input type="submit" class="btn btn-primary" value="Update">
            </form>
        </div>
    </section>

    <script src="js/jquery2.js"></script>
</body>

</html>