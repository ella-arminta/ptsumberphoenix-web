<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    include "../../../php/connect.php";

    $id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Library Style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../../../style.css">
    <link rel="stylesheet" href="../../../style/admin/form.css">

    <!-- Library -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/0e9fafd61c.js" crossorigin="anonymous"></script>

    <title>PT Sumber Phoenix | Admin</title>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Admin Panel</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Home</a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="../home/home.php">Home</a></li>
                                <li><a class="dropdown-item" href="../home/about.php">About</a></li>
                                <li><a class="dropdown-item" href="../home/business_fields.php">Business Fields</a></li>
                                <li><a class="dropdown-item" href="../home/why_us.php">Why Us</a></li>
                                <li><a class="dropdown-item" href="../home/statistic.php">Statistics</a></li>
                                <li><a class="dropdown-item" href="../home/team.php">Team</a></li>
                                <li><a class="dropdown-item" href="../home/testimonials.php">Testimonials</a></li>
                                <li><a class="dropdown-item" href="../home/faq.php">FAQ</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./product.php">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../update/update.php">Update</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Admin Panel  -->
    <section class="home-panel">
        <div class="container-fluid">
            <form>
                <h1 style="text-align: center; margin-bottom: 20px;">Update</h1>

                <div class="news_1">
                    <div class="mb-3">
                        <label for="category_news_1" class="form-label">Category</label>
                        <input type="text" class="form-control" id="category_news_1" required>
                    </div>
                    <div class="mb-3">
                        <label for="title_news_1" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title_news_1" required>
                    </div>
                    <div class="mb-3">
                        <label for="caption_news_1" class="form-label">Caption</label>
                        <input type="text" class="form-control" id="caption_news_1" required>
                    </div>
                    <div class="mb-3">
                        <label for="author_news_1" class="form-label">Author</label>
                        <input type="text" class="form-control" id="author_news_1" required>
                    </div>
                    <div class="mb-3">
                        <label for="author_profile_news_1" class="form-label">Author Profile Picture</label>
                        <input type="file" accept="image/png" class="form-control" id="author_profile_news_1" required>
                    </div>
                    <div class="mb-3">
                        <label for="date_news_1" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date_news_1" required>
                    </div>
                    <div class="mb-3">
                        <label for="image_news_1" class="form-label">Image</label>
                        <input type="file" accept="image/png" class="form-control" id="image_news_1" required>
                    </div>
                    <div class="mb-3">
                        <label for="description_news_1" class="form-label">Description</label>
                        <textarea class="form-control" id="description_news_1" rows="3"></textarea>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="featured_news_1">
                        <label class="form-check-label" for="featured_news_1">Featured News</label>
                    </div>

                    <button type="button" class="btn btn-danger" id="1">Delete News</button>

                    <hr>
                </div>

                <div class="news_2">
                    <div class="mb-3">
                        <label for="category_news_2" class="form-label">Category</label>
                        <input type="text" class="form-control" id="category_news_2" required>
                    </div>
                    <div class="mb-3">
                        <label for="title_news_2" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title_news_2" required>
                    </div>
                    <div class="mb-3">
                        <label for="caption_news_2" class="form-label">Caption</label>
                        <input type="text" class="form-control" id="caption_news_2" required>
                    </div>
                    <div class="mb-3">
                        <label for="author_news_2" class="form-label">Author</label>
                        <input type="text" class="form-control" id="author_news_2" required>
                    </div>
                    <div class="mb-3">
                        <label for="author_profile_news_2" class="form-label">Author Profile Picture</label>
                        <input type="file" accept="image/png" class="form-control" id="author_profile_news_2" required>
                    </div>
                    <div class="mb-3">
                        <label for="date_news_2" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date_news_2" required>
                    </div>
                    <div class="mb-3">
                        <label for="image_news_2" class="form-label">Image</label>
                        <input type="file" accept="image/png" class="form-control" id="image_news_2" required>
                    </div>
                    <div class="mb-3">
                        <label for="description_news_2" class="form-label">Description</label>
                        <textarea class="form-control" id="description_news_2" rows="3"></textarea>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="featured_news_2">
                        <label class="form-check-label" for="featured_news_2">Featured News</label>
                    </div>

                    <button type="button" class="btn btn-danger" id="2">Delete News</button>

                    <hr>
                </div>

                <div class="news_3">
                    <div class="mb-3">
                        <label for="category_news_3" class="form-label">Category</label>
                        <input type="text" class="form-control" id="category_news_3" required>
                    </div>
                    <div class="mb-3">
                        <label for="title_news_3" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title_news_3" required>
                    </div>
                    <div class="mb-3">
                        <label for="caption_news_3" class="form-label">Caption</label>
                        <input type="text" class="form-control" id="caption_news_3" required>
                    </div>
                    <div class="mb-3">
                        <label for="author_news_3" class="form-label">Author</label>
                        <input type="text" class="form-control" id="author_news_3" required>
                    </div>
                    <div class="mb-3">
                        <label for="author_profile_news_3" class="form-label">Author Profile Picture</label>
                        <input type="file" accept="image/png" class="form-control" id="author_profile_news_3" required>
                    </div>
                    <div class="mb-3">
                        <label for="date_news_3" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date_news_3" required>
                    </div>
                    <div class="mb-3">
                        <label for="image_news_3" class="form-label">Image</label>
                        <input type="file" accept="image/png" class="form-control" id="image_news_3" required>
                    </div>
                    <div class="mb-3">
                        <label for="description_news_3" class="form-label">Description</label>
                        <textarea class="form-control" id="description_news_3" rows="3"></textarea>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="featured_news_3">
                        <label class="form-check-label" for="featured_news_3">Featured News</label>
                    </div>

                    <button type="button" class="btn btn-danger" id="3">Delete News</button>

                    <hr>
                </div>

                <div class="news_4">
                    <div class="mb-3">
                        <label for="category_news_4" class="form-label">Category</label>
                        <input type="text" class="form-control" id="category_news_4" required>
                    </div>
                    <div class="mb-3">
                        <label for="title_news_4" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title_news_4" required>
                    </div>
                    <div class="mb-3">
                        <label for="caption_news_4" class="form-label">Caption</label>
                        <input type="text" class="form-control" id="caption_news_4" required>
                    </div>
                    <div class="mb-3">
                        <label for="author_news_4" class="form-label">Author</label>
                        <input type="text" class="form-control" id="author_news_4" required>
                    </div>
                    <div class="mb-3">
                        <label for="author_profile_news_4" class="form-label">Author Profile Picture</label>
                        <input type="file" accept="image/png" class="form-control" id="author_profile_news_4" required>
                    </div>
                    <div class="mb-3">
                        <label for="date_news_4" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date_news_4" required>
                    </div>
                    <div class="mb-3">
                        <label for="image_news_4" class="form-label">Image</label>
                        <input type="file" accept="image/png" class="form-control" id="image_news_4" required>
                    </div>
                    <div class="mb-3">
                        <label for="description_news_4" class="form-label">Description</label>
                        <textarea class="form-control" id="description_news_4" rows="3"></textarea>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="featured_news_4">
                        <label class="form-check-label" for="featured_news_4">Featured News</label>
                    </div>

                    <button type="button" class="btn btn-danger" id="4">Delete News</button>

                    <hr>
                </div>

                <div class="news_5">
                    <div class="mb-3">
                        <label for="category_news_5" class="form-label">Category</label>
                        <input type="text" class="form-control" id="category_news_5" required>
                    </div>
                    <div class="mb-3">
                        <label for="title_news_5" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title_news_5" required>
                    </div>
                    <div class="mb-3">
                        <label for="caption_news_5" class="form-label">Caption</label>
                        <input type="text" class="form-control" id="caption_news_5" required>
                    </div>
                    <div class="mb-3">
                        <label for="author_news_5" class="form-label">Author</label>
                        <input type="text" class="form-control" id="author_news_5" required>
                    </div>
                    <div class="mb-3">
                        <label for="author_profile_news_5" class="form-label">Author Profile Picture</label>
                        <input type="file" accept="image/png" class="form-control" id="author_profile_news_5" required>
                    </div>
                    <div class="mb-3">
                        <label for="date_news_5" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date_news_5" required>
                    </div>
                    <div class="mb-3">
                        <label for="image_news_5" class="form-label">Image</label>
                        <input type="file" accept="image/png" class="form-control" id="image_news_5" required>
                    </div>
                    <div class="mb-3">
                        <label for="description_news_5" class="form-label">Description</label>
                        <textarea class="form-control" id="description_news_5" rows="3"></textarea>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="featured_news_5">
                        <label class="form-check-label" for="featured_news_5">Featured News</label>
                    </div>

                    <button type="button" class="btn btn-danger" id="5">Delete News</button>

                    <hr>
                </div>

                <button type="submit" class="btn btn-primary">Add News</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>

<?php
} else {
    header("Location: ../../wp-admin.php");
    exit();
}
?>