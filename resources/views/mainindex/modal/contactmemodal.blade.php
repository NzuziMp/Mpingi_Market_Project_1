<!-- Modal -->
  <div class="modal fade" id="developerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content modal-sm">
        <div class="modal-header">
            <h3 style="color: #9f9f9f; font: 10pt/130% Helvetica, Arial, sans-serif;font-weight:bold" class="top4"><i class="fa fa-cogs"></i> Developed by Nzuzi Mpingi</h3>
          {{-- <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1> --}}
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/> --}}
                  <div class="wrapper">
                     <div class="card front-face">
                        <img src="{{ url('/assets/images/nzuzi.jpg') }}" >
                     </div>
                     <div class="card back-face">
                        <img src="{{ url('/assets/images/nzuzi.jpg') }}">
                        <div class="info">
                           {{-- <div class="title">
                              CodingLab
                           </div> --}}
                           <p>
                            Software Developer <br>Ir Nzuzi Mpingi Doudou<br>nzuzi_mpingi@yahoo.fr
                           </p>
                        </div>
                        <ul>
                           <a href="#"><i class="fab fa-facebook-f"></i></a>
                           <a href="#"><i class="fab fa-twitter"></i></a>
                           <a href="#"><i class="fab fa-instagram"></i></a>
                           <a href="#"><i class="fab fa-youtube"></i></a>
                        </ul>
                     </div>
                  </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>
  <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
/* *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
} */


.wrapper{
  height: 300px;
  width: 100%;
  position: relative;
  transform-style: preserve-3d;
 perspective: 1000px;
}
.wrapper .card{
  position: absolute;
  height: 100%;
  width: 100%;
  padding: 5px;
  background: #fff;
  border-radius: 10px;
  transform: translateY(0deg);
  transform-style: preserve-3d;
  backface-visibility: hidden;
  box-shadow: 0px 10px 15px rgba(0,0,0,0.1);
  transition: transform 0.7s cubic-bezier(0.4,0.2,0.2,1);
}
.wrapper:hover > .front-face{
  transform: rotateY(-180deg);
}

/* .front-face:hover{
    border-radius: 50%;
    border-color: 2px solid #1cc7d0;
} */
.wrapper .card img{
  height: 100%;
  width: 100%;
  object-fit: cover;
  border-radius: 10px;
}
.wrapper .back-face{
  display: flex;
  align-items: center;
  justify-content: space-evenly;
  flex-direction: column;
  transform: rotateY(180deg);
}
.wrapper:hover > .back-face{
  transform: rotateY(0deg);
}
.wrapper .back-face img{
  height: 150px;
  width: 150px;
  padding: 5px;
  border-radius: 50%;
  background: linear-gradient(375deg, #1cc7d0, #2ede98);
}
.wrapper .back-face .info{
  text-align: center;
}
.back-face .info .title{
  font-size: 30px;
  font-weight: 500;
}
.back-face ul{
  display: flex;
}
.back-face ul a{
  display: block;
  height: 40px;
  width: 40px;
  color: #fff;
  text-align: center;
  margin: 0 5px;
  line-height: 38px;
  border: 2px solid transparent;
  border-radius: 50%;
  background: linear-gradient(375deg, #1cc7d0, #2ede98);
  transition: all 0.5s ease;
}
.back-face ul a:hover{
  color: #1cc7d0;
  border-color: #1cc7d0;
  background: linear-gradient(375deg, transparent, transparent);
}
  </style>
