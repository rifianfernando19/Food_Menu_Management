<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <title>Lana's Western Food</title>
</head>
<body>
    <div class="navbar-container">
        <div class="navbar-left">
          <a href="/page">Lana's Western Food</a>
        </div>
          <div class="navbar-right">
              <a href="/userPage">Home</a>
              <a href="">Menu</a>
              <a href="">Details</a>
                @if(Route::has('login'))
                    @auth
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <div class="navbar-login">
                        <button class="navbar-button">
                          <img src="{{ asset('img/Logout.png') }}" alt="">
                        </button> 
                      </div>
                    </form>
                    @else
                      <div class="navbar-login">
                        <a href="/login"><img src="{{ asset('img/ButtonLogin.png') }}" alt=""></a>
                      </div>
                    @endif
                
                  @endauth
                
                 
        </div>
    </div>
    
    <section id="Hero">
      <div class="hero-container">
      </div>
    </section>

      <div class="navbartype">
          <div class="type-food">
            <a href="#food">Food</a>
            <a href="#drink">Drink</a>
          </div>
            <form class="search" action="{{url('/cari')}}" method="GET">
              @csrf
                <input type="text" class="searchTerm" name="" placeholder="What are you looking for?">
                <button type="submit" class="searchButton">
                  <img src="{{ asset('img/searchicon.png') }}">
                  <i class="fa fa-search"></i>
              </button> 
            </form>
      </div>
      <div class="list-food-container">
        <p>Main Course</p>
      </div>

      <div class="list-food2">
      <section id="list-food"> 
        @if($admins == null)
          Tulis Null
        @endif
        @foreach ($admins as $admin)
          <div class="foreach-food">
            <div class="makanan">
              <div class="gambar">
                <img src="{{ asset('storage/'.$admin->file) }}" alt="Food.png">
              </div>
            <div class="makanan1">
              <div class="nama-makanan">
                <p> {{ $admin->namaMenu }}</p>
              </div>
              <div class="harga-makanan">
                <p> Rp{{ $admin->hargaMenu }}</p>  
              </div>
              <button type="submit" id="myBtn" class="add-button" data-bs-toggle="modal" data-bs-target="#myModal{{$admin->id}}">
                <img src="{{ asset('img/add-button1.png') }}">
              </button>
            </div>
            </div>
          </div>

            {{-- Modal --}}
            <div id="myModal{{ $admin->id }}" class="modal">
              <div class="isi-cart">
                <span class="close">&times;</span>
                  <div class="img-modal">
                    <div class="img-css">
                      <img src="{{ asset('storage/'.$admin->file) }}" alt="">
                    </div>
                  </div>
                  <br>
                  <div class="nama-makanan-modal">
                    <p>{{ $admin->namaMenu }}</p>
                  </div>
                  <div class="deskripsi-makanan-modal">
                    <p>Sebuah ayam goreng khas upin ipin yang sangat mengigau selera disetiap sudut</p>
                  </div>
                  <div class="harga-makanan-modal">
                    <p>{{ $admin->hargaMenu }}</p>
                    <button type="submit" id="noob" class="add-button-modal">
                      <img src="{{ asset('img/add-button1.png') }}">
                    </button>
                  </div>
              </div>
            </div>
            {{-- Penutup Modal --}}
        @endforeach
        
      </section>
      </div>

      

      <div class="footer">
        <button  class="button-cart" style="background: url({{ asset('img/button-cart.png') }})">c</button>
      </div>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/page.js') }}"></script>
</body>
</html>