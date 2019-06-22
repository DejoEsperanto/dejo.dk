<section id="titleBox">
    <div>
        <div><?=TITLE?></div>
        <div>
            <?php
                if (isset($data['breadcrumb'])) {
                    $breadcrumb = $data['breadcrumb'];
                    array_unshift($breadcrumb, 'index');
                    $breadcrumb[] = $pageDetails[0];

                    $count = count($breadcrumb);
                    for ($i = 0; $i < $count; $i++) {
                        $name = $breadcrumb[$i];
                        $title = LSTR['pages'][$name]['title'];
                        if (!isset($title)) {
                            $title = $data['description'];
                        }
                        echo '<a href="' . PAGES_INVERSE[$name][0] . '">' . $title . '</a>';
                        if ($i + 1 < $count) {
                            echo ' &raquo; ';
                        }
                    }
                }
            ?>
        </div>
    </div>
</section>
