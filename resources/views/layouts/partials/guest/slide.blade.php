<div class="h-screen w-full overflow-hidden flex flex-nowrap text-center" id="slider">
  <div class="slider flex-none bg-cover h-full w-full flex-col items-center justify-center" style="background-image: url('https://images.pexels.com/photos/7435822/pexels-photo-7435822.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')">
  </div>
</div>

@push('css')
  <style>
    .slider {
      animation: animate 19s infinite;
    }
    @keyframes animate {
      20% {
        background-image: url('https://images.pexels.com/photos/2356045/pexels-photo-2356045.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
        background-size: cover;
      }
      40% {
        background-image: url('https://images.pexels.com/photos/3059092/pexels-photo-3059092.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
        background-size: cover;
      }
      60% {
        background-image: url('https://images.pexels.com/photos/11457916/pexels-photo-11457916.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
        background-size: cover;
      }
      80% {
        background-image: url('https://images.pexels.com/photos/3947319/pexels-photo-3947319.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
        background-size: cover;
      }
      100% {
        background-image: url('https://images.pexels.com/photos/7435822/pexels-photo-7435822.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
        background-size: cover;
      }
    }
  </style>
@endpush
