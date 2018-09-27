<?php ?>

    <h2> Documentation for IT Forge FrameWork </h2>

    <div class="docs">

        <div class="docs_navigation DocsNavigation">

            <?php
            $args = array(
                'post_type'   => 'itff_doc',
                'numberposts' => -1
            );

            $posts = get_posts( $args );

            foreach ( $posts as $post ) {
                include( 'doc_nav.php' );
            }

            ?>

        </div>

        <div class="docs_container DocsContainer">
            <?php

            $args = array(
                'post_type'   => 'itff_doc',
                'numberposts' => 1
            );


            $docs = get_posts( $args );

            foreach ( $docs as $doc ) {
                include( 'doc.php' );
            }

            ?>
        </div>

        <div class="add_button large AddNewDoc">
            <span class="icon_svg_container large"><svg><use xlink:href="#plus"></use></svg></span>
        </div>

    </div>

<?php
