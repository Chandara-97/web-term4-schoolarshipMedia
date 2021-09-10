@extends('layout.bone')

@section('title','ទាក់ទងជាមួយយើង')


@section('style')

@endsection

@section('post')
<div class="container">

          <div class="row">
              <div class="col-2"></div>
              <div data-aos="fade-left" class="btn btn-primary rounded-pill col">
                  <h1 class="header " data-aos="animate text on scroll">ទាក់ទងជាមួយយើង</h1>
              </div>
              <div class="col-2"></div>
          </div>
<br>
          <div class="row">
             <div class="col"></div>
             <div class="col-2">
                <img class="rounded-circle" data-aos="flip-up" style="width: 18rem;" src="https://z-p3-scontent.fpnh18-3.fna.fbcdn.net/v/t1.0-9/124767205_2492521224381844_6618492544886054040_o.jpg?_nc_cat=109&ccb=2&_nc_sid=174925&_nc_eui2=AeElakEwL-DyxVkTxE8APZPPGgkaBz4PUW8aCRoHPg9Rb6tOrWzHg87o3NswiDmCRj_vnSofUkhSaAFF3Mc_DM7f&_nc_ohc=q9YR1wccu8YAX-7jywp&_nc_ht=z-p3-scontent.fpnh18-3.fna&oh=e9cca37b634a5fbf9c98c6f40259c5a7&oe=6027D0A6" alt="Leav Chan Dara">
                <div class="col2"></div>
                <br><br>
                  <h5​​​ class="text-center font-weight-bolder"​​>Leav Chan Dara</h5​​​>
                <br><br>
                <div cl​​​​​​​​​​​​​​​​​​​​​​​​ass="text-center">
                   <a href="https://web.facebook.com/leav.chandara"><i class="fab fa-facebook fa-lg" aria-hidden="true"></i></a>&nbsp;
                   <a href="mailto:leav.chandara7997@gmail.com"><i class="far fa-envelope fa-lg" aria-hidden="true"></i></a>
                </div>
             </div>
             <div class="col"></div>
             <div class="col-2">
                <img class="rounded-circle" data-aos="flip-up" style="width: 18rem;" src="https://scontent.fpnh2-2.fna.fbcdn.net/v/t1.0-9/127278990_1271592736537593_965136852605287300_n.jpg?_nc_cat=108&ccb=2&_nc_sid=174925&_nc_eui2=AeFVYzTbDYJOBohNisnb_9ytb-7L_MUlAyVv7sv8xSUDJaoGcwffqU3QqtHZZZHs8LVN-n4yOtQGRMIyQBV_2rFD&_nc_ohc=lp4M7GnQEYwAX_p05x6&_nc_ht=scontent.fpnh2-2.fna&oh=98691ff90c2c8946e0932761bf193662&oe=60225D6B" alt="ly nary">
                <br><br>
                  <h5​​​ class="text-center font-weight-bolder"​​>Ly Nary</h5​​​>
                <br><br>
                <div class="text-center">
                   <a href="https://web.facebook.com/profile.php?id=100010606367727"><i class="fab fa-facebook fa-lg" aria-hidden="true"></i></a>&nbsp;
                   <a href="mailto:naryaimeting@gmail.com"><i class="far fa-envelope fa-lg" aria-hidden="true"></i></a>
                </div>
             </div>
             <div class="col"></div>
          </div>
       </div> <br>
       <div class="row">
          <div class="col-4"></div>

          <div class="col-4"></div>
          <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 400, // offset (in px) from the original trigger point
            delay: 2, // values from 0 to 3000, with step 50ms
            duration: 1300 // values from 0 to 3000, with step 50ms
        });
    </script>
       </div><br><br><br>
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
         <div class="container">

              <form action="/contactus" method="post">

              <form action="">
                  <div class="form-group">
                      @csrf
                          <div>
                              <label class="move-up" for="name"> Full Name </label>
                              <input type="text" name="name"class="form-control">
                          </div>

                          <div>
                                  <label for="name"> Email  </label>
                                  <input type="email" name="email"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                          </div>

                          <div>
                              <label for="name"> Your Message </label>
                              <textarea name="message" id="Message" class="form-control"></textarea>
                          </div>
                              <input type="submit" value="submit" class="btn btn-primary">
                  </div>
          </form>
      </div><br><br><br>

@endsection
