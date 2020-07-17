<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- AOS -->
  <link href="{{ asset('/dist/css/aos.css') }}" rel="stylesheet">

  <!-- FA -->
  <link rel="stylesheet" href="{{asset('')}}storage/icons/font-awesome/css/all.css">

  <!-- My CSS -->
  <link href="{{asset('dist')}}/css/style.css" rel="stylesheet">
  <link href="{{asset('dist')}}/css/style1.css" rel="stylesheet">

  <title>My Landing Page</title>
</head>

<body>
  <!-- Navabar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">MyLP</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">Pricing</a>
          <a class="nav-item nav-link" href="#">Features</a>
          <a class="nav-item nav-link" href="#">About</a>
          @guest()
          <a class="btn btn-primary tombol text-white" href="{{ route('login') }}">LogIn</a>
          @else
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ auth()->user()->name }} <i class="fas fa-caret-down"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                    <a class="dropdown-item" href="/home">Panel</a>
                </div>
              </li>
          </ul>
          @endguest
        </div>
      </div>
  </nav>
  <!-- akhir Navabar -->

  <!-- jumbotron -->
  <div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
      <h1 class="text-white">A <span>bright</span> future, <br> starting from <span>here</span></h1>
      <a class="btn btn-primary tombol text-white">Our Work</a>
    </div>
  </div>
  <!-- akhir jumbotron -->

  <div class="container">


    <!-- info panel -->
    <div class="row justify-content-center">
      <div class="col-8 panel">
        <div class="row">
          <div class="col-md">
            <img src="{{ asset('storage/images/') }}/employee.png" alt="employee" class="float-left">
            <h4>24 Hours</h4>
            <p class="mb-0">Lorem ipsum dolor sit amet.</p>
          </div>
          <div class="col-md">
            <img src="{{ asset('storage/images/') }}/hires.png" alt="employee" class="float-left">
            <h4>High-Res</h4>
            <p class="mb-0">Lorem ipsum dolor sit amet.</p>
          </div>
          <div class="col-md">
            <img src="{{ asset('storage/images/') }}/security.png" alt="employee" class="float-left">
            <h4>Security</h4>
            <p class="mb-0">Lorem ipsum dolor sit amet.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- akhir info panel -->

    <!-- content -->

    <section>
      <div class="row content" data-aos="fade-up" data-aos-duration="800">
        <div class="col-md-6">
          <img src="{{ asset('storage/images/') }}/workingspace.png" alt="workingspace" class="img-fluid">
        </div>
        <div class="col-md-5">
          <h1>You <span>work</span> like at <span>home</span></h1>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt officia quisquam, nam atque esse doloremque
            sed iste debitis architecto saepe!</p>
        </div>
      </div>
    </section>

    <section>
      <div class="row content" data-aos="fade-up" data-aos-duration="800">
        <div class="col text-center">
          <h1><span>Kelas Kami</span></h1>
        </div>
      </div>
      <div class="row content" data-aos="fade-up" data-aos-duration="800">
        <div class="col-md-6 order-md-2">
          <img src="{{ asset('storage/images/undraw_professor_8lrt.svg') }}" alt="" class="img-fluid">
        </div>
        <div class="col-md-6 order-md-1">
          <h1 class="keterangan">Ipsum</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam unde minima beatae nisi eum aut.</p>
        </div>
      </div>
      <div class=" row content" data-aos="fade-up" data-aos-duration="800">
        <div class="col-md-6 order-md-1">
          <img src="{{ asset('storage/images/undraw_quiz_nlyh.svg') }}" alt="" class="img-fluid">
        </div>
        <div class="col-md-6 order-md-2">
          <h1 class="keterangan">Lorem</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, omnis natus? Sequi pariatur, error
            reprehenderit
            doloremque mollitia asperiores cum illo. Aliquid pariatur praesentium sequi officia error deleniti impedit
            excepturi aperiam.</p>
        </div>
      </div>
      <div class="row content" data-aos="fade-up" data-aos-duration="800">
        <div class="col-md-6 order-md-2">
          <img src="{{ asset('storage/images/undraw_teaching_f1cm.svg') }}" alt="" class="img-fluid">
        </div>
        <div class="col-md-6 order-md-1">
          <h1 class="keterangan">Lorem</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro beatae minima aliquid facere rerum aperiam
            suscipit autem cum id cumque.</p>
        </div>
      </div>
    </section>


    <!-- akhir content -->

    <!-- quote -->

    <div class="row justify-content-center text-center quote" data-aos="fade-up" data-aos-duration="800">
      <div class="col-md-6">
        <h3>" Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit itaque odio aspernatur, ex delectus qui?
          "
        </h3>
      </div>
    </div>

  </div>

  <section class="bg-info text-white">
    <div class="container">
      <div class="row content" data-aos="fade-up" data-aos-duration="800">
        <div class="col text-center">
          <h1><span>Kenapa Memilih Kami?</span></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-2 sep">
          <span class="sepText">
            <i class="fas fa-arrow-circle-right d-none d-md-block">
            </i>
          </span>
        </div>
        <div class="col-md-5" data-aos="fade-left" data-aos-duration="800">
          <h2>Lorem lorem</h2>
          <p>ok ok ok</p>
        </div>
      </div>
      <div class="row text-md-right">
        <div class="col-md-5" data-aos="fade-right" data-aos-duration="1000">
          <h2>Lorem lorem</h2>
          <p>ok ok ok</p>
        </div>
        <div class="col-md-2 sep">
          <span class="sepText">
            <i class="fas fa-arrow-circle-left d-none d-md-block">
            </i>
          </span>
        </div>
        <div class="col-md-5"></div>
      </div>
      <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-2 sep">
          <span class="sepText">
            <i class="fas fa-arrow-circle-left d-none d-md-block">
            </i>
          </span>
        </div>
        <div class="col-md-5" data-aos="fade-left" data-aos-duration="1000">
            <h2>Lorem lorem</h2>
            <p>ok ok ok</p>
        </div>
      </div>
    </div>
  </section>

  <footer class="bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <h4>Tentang Kami</h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam sed in aliquid obcaecati corporis quasi
            earum nisi voluptates nihil possimus?</p>
        </div>
        <div class="col-md-3">
          <h4>Links</h4>
          <a href="" class="d-flex text-secondary">Lorem, ipsum.</a>
          <a href="" class="d-flex text-secondary">Lorem, ipsum.</a>
          <a href="" class="d-flex text-secondary">Lorem, ipsum.</a>
          <a href="" class="d-flex text-secondary">Lorem, ipsum.</a>
          <a href="" class="d-flex text-secondary">Lorem, ipsum.</a>
        </div>
        <div class="col-md-4">
          <h4>Hubungi Kami</h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, eveniet.</p>
          <h3><i class="fas fa-phone-alt"></i> (022) 124624</h3>
        </div>
      </div>
      <p class="text-center">Copyright © 2020 All rights reserved | This template is made with <i
          class="fas fa-heart"></i> by <a href="" class="text-white">Teguh Kurnia</a></p>
    </div>
  </footer>






  <!-- Optional JavaScript -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>
</body>

</html>
