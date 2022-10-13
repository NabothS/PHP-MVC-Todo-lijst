<?php

use App\Http\Models\Category;

$Category = new Category();

$cats = $Category::getCategories();


?>

<div class="asideContainer">
            <aside class="aside">
                <div class="asideTop">
                    <h2>Categories</h2>
                </div>
                <div class="asideBottom">
                    <a id='button' href="default" value="default" class="<?php if($_SESSION['cat']=='default') : echo 'buttonCategory'; else : echo 'buttonCategory notSelected'; endif?>">Default</a>
                    <?php for($i = 0; $i < count($cats) ; $i++) : ?>
                        <a id='button' href="<?=$i?>" value="<?=$i?>" name="category" class="<?php if($_SESSION['cat']==$i) : echo 'buttonCategory'; else : echo 'buttonCategory notSelected'; endif?>"> <?= $cats[$i]->name ?> </a>
                    <?php endfor ?>
                </div>
            </aside>
        </div>