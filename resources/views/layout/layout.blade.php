<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    
    <!-- Libraries Stylesheet -->
    <link href="/Assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    
    <!-- Customized Bootstrap Stylesheet -->
    <link href="/Assets/css/style.css" rel="stylesheet">
</head>

<body>

    @include('layout\header')
	
  	@yield('content')
	
    @include('layout\footer')

    <div class="toast-message">
      <p class="text-light p-3">Sản phẩm đã được thêm vào giỏ hàng</p>
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/Assets/lib/easing/easing.min.js"></script>
    <script src="/Assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.js"></script>
    <script src="http://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>



    <!-- Contact Javascript File -->
    <script src="/Assets/mail/jqBootstrapValidation.min.js"></script>
    <script src="/Assets/mail/contact.js"></script>

    <script>
      $('.hero__categories').on('mouseenter', function(){
          $('.hero__categories ul').slideToggle(400);
      });
      $('.hero__categories').on('mouseleave', function(){
          $('.hero__categories ul').hide(400);
      });
    </script>

    <!-- Template Javascript -->
    <script src="/Assets/js/main.js"></script>
</body>

</html>