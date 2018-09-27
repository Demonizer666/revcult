<?php ?>

<div class="doc_nav__con DocumentElement" data-id="<?php echo $post->ID; ?>">
    <h2 class="doc_nav__title">
        <?php echo $post->post_title; ?>
    </h2>
    <span class="view_doc ViewDocument">
        <span class="icon_svg_container large"><svg><use xlink:href="#icon_eye"></use></svg></span>
    </span>
    <span class="edit_doc EditDocument">
        <span class="icon_svg_container large"><svg><use xlink:href="#edit"></use></svg></span>
    </span>
    <span class="delete_doc DeleteDocument">
        <span class="icon_svg_container large"><svg><use xlink:href="#delete"></use></svg></span>
    </span>
</div>