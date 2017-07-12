<section id="submenu">
    <div>
        <ul>
            <?php
                if (isset($data['submenu'])) {
                    foreach ($data['submenu'] as $menuItem) {
                        echo  '<li><a href="' . PAGES_INVERSE[$menuItem][0] . '">' . LSTR['pages'][$menuItem]['title'] . '</a></li>';
                    }
                }
            ?>
        </ul>
    </div>
</section>
