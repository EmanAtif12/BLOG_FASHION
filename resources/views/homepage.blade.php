<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.homecss')
    <link rel="stylesheet" href="path/to/style.css">

    <title>Homepage</title>
</head>
<body>
    <!-- Header section start -->
    <div class="header_section">
        @include('home.header')
        <!-- Banner section start -->
       @include('home.banner')
        <!-- Banner section end -->
    </div>
    <!-- Header section end -->

    <!-- Services section start -->
    @include('home.services')
    <!-- Services section end -->

    <!-- About section start -->
    @include('home.aboutus')
    <!-- About section end -->

    <!-- Contact section start -->
    @include('home.contact')
    <!-- Contact section end -->

    <!-- Footer section start--> 
    @include('home.footer')
    <!-- Footer section end -->

    <!-- Javascript files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
