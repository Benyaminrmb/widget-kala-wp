<?php
if(is_shop()){
    get_template_part('page-shop');
}elseif (is_tax('product_cat')){
    wc_get_template_part('taxonomy','product-cat');
}else{
    wc_get_template_part('taxonomy','product-brand');
}