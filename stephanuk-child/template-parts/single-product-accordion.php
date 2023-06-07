<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

<section class="accordion fixed-full-width" id="description">
    <div class="container">
        <div class="accordion accordion-flush" id="accordionProduct">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h3>Description</h3>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionProduct">
                    <div class="accordion-body">
                        <?php the_content() ?>
                    </div>
                </div>
            </div>
            <?php if( have_rows('accordion') ){ ?>
                <?php $i = 0 ?>
                <?php while( have_rows('accordion') ) { the_row(); ?>
                    <?php 
                    $accordion_title = get_sub_field('accordion_title'); 
                    $accordion_content = get_sub_field('accordion_content'); 
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-<?= $i ?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $i ?>" aria-expanded="false" aria-controls="collapseTwo">
                                <h3><?= $accordion_title ?></h3>
                            </button>
                        </h2>
                        <div id="collapse-<?= $i ?>" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionProduct">
                            <div class="accordion-body">
                                <?= $accordion_content ?>
                            </div>
                        </div>
                    </div>
                    <?php $i++ ?>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>

