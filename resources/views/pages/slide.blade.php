 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <?php  $i =0;?>
    @foreach($slide as $sl)
    
        <li data-target="#carousel-example-generic" data-slide-to="{{$i}}"

        @if($i==0)
         class="active"

         @endif
        ></li>
        <?php $i++; ?>
      @endforeach     
     </ol>
     <div class="carousel-inner">
      <?php  $i =0;?>
     @foreach($slide as $sl)
        <div 
        @if($i==0)
            class="item active"
        @else
            class="item"
        @endif 
        >
        <?php $i++; ?>
            <img style="height: 320px; width: 1100px" class="slide-image" src="{{$sl->hinh}}" alt="">
        </div>
     @endforeach   
    </div>
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
</div>