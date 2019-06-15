<?php
// echo $host;
?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            
            <?php echo' <img class="d-block tamanoSlaider" src="'.$host.'assets/images/b9.png" alt="First slide">' ?>
        </div>
        <div class="carousel-item">
            <?php echo '<img class="d-block tamanoSlaider" src="'.$host.'assets/images/b8.jpg" alt="Second slide">' ?>
        </div>
        <div class="carousel-item">
            <?php echo' <img class="d-block tamanoSlaider" src="'.$host.'assets/images/b10.jpg" alt="Third slide">' ?>
        </div>
        <div class="carousel-item">
            <?php echo' <img class="d-block tamanoSlaider" src="'.$host.'assets/images/b12.jpg" alt="Fourth slide">' ?>
        </div>
        <div class="carousel-item">
            <?php echo' <img class="d-block tamanoSlaider" src="'.$host.'assets/images/b7.jpeg" alt="fifth slide">' ?>
        </div>
        <div class="carousel-item">
            <?php echo' <img class="d-block tamanoSlaider" src="'.$host.'assets/images/b11.jpg" alt="sixth slide">' ?>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>