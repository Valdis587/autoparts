<?php
/**
 * AutoParts functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AutoParts
 */

if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}

function get_breadcrumbs($args = [], $echo = true) {

    /*
     * Настройки хлебных крошек по умолчанию
     */
    $defaults = [
        // обертка для всех элементов хлебных крошек
        'wrapper' => ['<ul class="breadcrumb">', '</ul>'],
        // шаблон для элемента хлебных крошек, ссылка
        'link' => '<li><a href="%HREF%">%TEXT%</a></li>',
        // шаблон для элемента хлебных крошек, текст
        'text' => ' <li><a>%TEXT%</a></li>',
        // разделитель для элеменов хлебных крошек
        'separator' => '',
        // показывать хлебные крошки на главной странице?
        'show_on_home' => true,
        // показывать в хлебных крошках текущую страницу?
        'show_current' => true,
    ];

    /*
     * Объединяем настройки по умолчанию и настройки, переданные
     * при вызове функции
     */
    $settings = wp_parse_args($args, $defaults);

    /*
     * В этом массиве будем накапливать все элементы хлебных крошек
     */
    $breadcrumbs = [];

    /*
     * Если это не страница списка записей (рубрика, архив), а отдельная запись
     * (пост, страница, волжение) — получаем ее родителя. Эта переменная нам
     * потребуется несколько раз ниже, поэтому получим ее значение один раз.
     */
    global $post;
    $parent_id = ($post) ? $post->post_parent : false;

    /*
     * Итак, добавляем первый элемент в хлебные крошки
     */
    $href = home_url('/');
    $text = 'Главная';
    $html = str_replace(
        ['%HREF%', '%TEXT%'],
        [$href, $text],
        $settings['link']
    );
    $breadcrumbs[] = $html;

    /*
     * Если мы находимся на главной странице сайта
     */
    if (is_front_page()) {
        /*
         * Здесь возможны две ситуации: когда на главной странице показывается
         * список последних записей блога или когда на главной показывается
         * статическая страница. В случае статической страницы, больше ничего
         * делать не надо, в хлебных крошках всего один элемент.
         */
        // на главной показывается список последних записей
        if (get_query_var('paged')) {
            // добавляем в массив текст «Страница N»
            $text = 'Страница ' . get_query_var('paged');
            $html = str_replace('%TEXT%', $text, $settings['text']);
            $breadcrumbs[] = $html;
        }
        // если на главной не надо показывать хлебные крошки,
        // просто очищаем массив $breadcrumbs
        if (!$settings['show_on_home']) {
            $breadcrumbs = [];
        }
    }

    /*
     * Если мы находимся на странице последних записей блога,
     * но это не главная страница
     */
    if (is_home() && !is_front_page()) {
        // идентификтор страницы, где показываются последние записи
        $page_for_posts = get_option('page_for_posts', false);
        // наименование страницы, где показываются последние записи
        $title = get_the_title($page_for_posts);
        /*
         * Если это не первая страница последних записей (постраничная навигация),
         * то сначала добавляем в массив $breadcrumbs ссылку на первую страницу,
         * а потом — текст «Страница N»
         */
        if (get_query_var('paged')) {
            // добавляем в массив ссылку на первую страницу
            $href = get_page_link($page_for_posts);
            $text = $title;
            $html = str_replace(
                ['%HREF%', '%TEXT%'],
                [$href, $text],
                $settings['link']
            );
            $breadcrumbs[] = $html;
            // добавляем в массив текст «Страница N»
            $text = 'Страница ' . get_query_var('paged');
            $html = str_replace('%TEXT%', $text, $settings['text']);
            $breadcrumbs[] = $html;
        } else {
            if ($settings['show_current']) {
                $text = $title;
                $html = str_replace('%TEXT%', $text, $settings['text']);
                $breadcrumbs[] = $html;
            }
        }
    }

    /*
     * Если мы находимся на странице списка записей рубрики
     */
    if (is_category()) {
        /*
         * Если последние записи блога показываются не на главной
         * странице, добавляем в хлебные крошки еще и ссылку на ту
         * страницу, на которой показываются последние записи
         */
        // идентификтор страницы, где показываются последние записи
        $page_for_posts = get_option('page_for_posts', 0);
        if ($page_for_posts) {
            // наименование страницы, где показываются последние записи
            $title = get_the_title($page_for_posts);
            // добавляем в массив ссылку на эту страницу
            $href = get_page_link($page_for_posts);
            $text = $title;
            $html = str_replace(
                ['%HREF%', '%TEXT%'],
                [$href, $text],
                $settings['link']
            );
            $breadcrumbs[] = $html;
        }
        /*
         * Добавляем в массив ссылки на всех родителей этой рубрики
         */
        $parents = get_ancestors(get_query_var('cat'), 'category');
        foreach (array_reverse($parents) as $cat) {
            $href = get_category_link($cat);
            $text = get_cat_name($cat);
            $html = str_replace(
                ['%HREF%', '%TEXT%'],
                [$href, $text],
                $settings['link']
            );
            $breadcrumbs[] = $html;
        }
        if (get_query_var('paged')) {
            /*
             * Если это не первая страница рубрики (постраничная навигация),
             * то сначала добавляем в массив $breadcrumbs ссылку на рубрику,
             * а потом — текст «Страница N»
             */
            // добавляем в массив ссылку на рубрику
            $cat = get_query_var('cat');
            $href = get_category_link($cat);
            $text = get_cat_name($cat);
            $html = str_replace(
                ['%HREF%', '%TEXT%'],
                [$href, $text],
                $settings['link']
            );
            $breadcrumbs[] = $html;
            // добавляем в массив текст «Страница N»
            $text = 'Страница ' . get_query_var('paged');
            $html = str_replace('%TEXT%', $text, $settings['text']);
            $breadcrumbs[] = $html;
        } else {
            /*
             * Если это первая страница рубрики, просто добавляем
             * в массив $breadcrumbs название рубрики
             */
            if ($settings['show_current']) {
                $text = single_cat_title( '', false );
                $html = str_replace('%TEXT%', $text, $settings['text']);
                $breadcrumbs[] = $html;
            }
        }
    }

    /*
     * Если мы находимся на статической странице (тип записи «page»)
     */
    if (is_page() && !is_front_page() && !is_attachment()) {
        if ($parent_id) {
            /*
             * Если у страницы есть родитель
             */
            // получаем всех предков страницы и добавляем в массив
            $parents = get_post_ancestors(get_the_ID());
            foreach (array_reverse($parents) as $id) {
                $href = get_page_link($id);
                $text = get_the_title($id);
                $html = str_replace(
                    ['%HREF%', '%TEXT%'],
                    [$href, $text],
                    $settings['link']
                );
                $breadcrumbs[] = $html;
            }
            if ($settings['show_current']) {
                $text = get_the_title();
                $html = str_replace('%TEXT%', $text, $settings['text']);
                $breadcrumbs[] = $html;
            }
        } else {
            /*
             * Если у страницы нет родителя
             */
            if ($settings['show_current']) {
                $text = get_the_title();
                $html = str_replace('%TEXT%', $text, $settings['text']);
                $breadcrumbs[] = $html;
            }
        }
    }

    /*
     * Если мы находимся на отдельной странице записи типа «post»
     */
    if (is_single() && get_post_type() == 'post') {
        /*
         * Если последние записи блога показываются не на главной
         * странице, добавляем в хлебные крошки еще и ссылку на ту
         * страницу, на которой показываются последние записи
         */
        // идентификтор страницы, где показываются последние записи
        $page_for_posts = get_option('page_for_posts', 0);
        if ($page_for_posts) {
            // наименование страницы, где показываются последние записи
            $title = get_the_title($page_for_posts);
            // добавляем в массив ссылку на эту страницу
            $href = get_page_link($page_for_posts);
            $text = $title;
            $html = str_replace(
                ['%HREF%', '%TEXT%'],
                [$href, $text],
                $settings['link']
            );
            $breadcrumbs[] = $html;
        }
        /*
         * Добавляем в массив ссылку на рубрику и ссылки на всех родителей
         */
        // рубрики, в которых размещена эта запись
        $cat = get_the_category();
        // но мы используем только одну рубрику
        $catID = $cat[0]->cat_ID;
        // получаем всех родителей этой рубрики
        $parents = get_ancestors($catID, 'category');
        $parents = array_reverse( $parents );
        $parents[] = $catID;
        foreach ($parents as $cat) {
            $href = get_category_link($cat);
            $text = get_cat_name($cat);
            $html = str_replace(
                ['%HREF%', '%TEXT%'],
                [$href, $text],
                $settings['link']
            );
            $breadcrumbs[] = $html;
        }
        /*
         * Если у записи много комментариев, они будут расположены
         * на нескольких страницах
         */
        if (get_query_var('cpage')) {
            // добавляем в массив ссылку на эту запись
            $href = get_permalink();
            $text = get_the_title();
            $html = str_replace(
                ['%HREF%', '%TEXT%'],
                [$href, $text],
                $settings['link']
            );
            $breadcrumbs[] = $html;
            // добавляем в массив текст «Страница комментариев N»
            $number = get_query_var('cpage');
            $text = 'Страница комментариев '.$number;
            $html = str_replace('%TEXT%', $text, $settings['text']);
            $breadcrumbs[] = $html;
        } else {
            if ($settings['show_current']) {
                $text = get_the_title();
                $html = str_replace('%TEXT%', $text, $settings['text']);
                $breadcrumbs[] = $html;
            }
        }
    }

    /*
     * Если мы находимся на отдельной странице вложения
     */
    if (is_attachment()) {
        /*
         * Если вложение прикреплено к записи или странице
         */
        if ($parent_id) {
            $parent = get_post($parent_id);
            /*
             * Вложение прикреплено к записи блога
             */
            if ($parent->post_type == 'post') {
                /*
                 * Если последние записи блога показываются не на главной
                 * странице, добавляем в хлебные крошки еще и ссылку на ту
                 * страницу, на которой показываются последние записи
                 */
                // идентификтор страницы, где показываются последние записи
                $page_for_posts = get_option('page_for_posts', 0);
                if ($page_for_posts) {
                    // наименование страницы, где показываются последние записи
                    $title = get_the_title($page_for_posts);
                    // добавляем в массив ссылку на эту страницу
                    $href = get_page_link($page_for_posts);
                    $text = $title;
                    $html = str_replace(
                        ['%HREF%', '%TEXT%'],
                        [$href, $text],
                        $settings['link']
                    );
                    $breadcrumbs[] = $html;
                }
                // рубрики, в которых размещена эта запись
                $cat = get_the_category($parent->ID);
                // но мы используем только одну рубрику
                $catID = $cat[0]->cat_ID;
                // получаем всех родителей этой рубрики
                $parents = get_ancestors($catID, 'category');
                $parents = array_reverse($parents);
                $parents[] = $catID;
                foreach ($parents as $cat) {
                    $href = get_category_link($cat);
                    $text = get_cat_name($cat);
                    $html = str_replace(
                        ['%HREF%', '%TEXT%'],
                        [$href, $text],
                        $settings['link']
                    );
                    $breadcrumbs[] = $html;
                }
                $href = get_permalink($parent);
                $text = $parent->post_title;
                $html = str_replace(
                    ['%HREF%', '%TEXT%'],
                    [$href, $text],
                    $settings['link']
                );
                $breadcrumbs[] = $html;
            }
            /*
             * Вложение прикреплено к статической странице
             */
            if ($parent->post_type == 'page') {
                /*
                 * Если вложение прикреплено к статической странице,
                 * которая показывается на главной странице, тогда
                 * не нужно еще раз добавлять в массив $breadcrumbs
                 * главную страницу
                 */
                if (get_option('page_on_front', 0) != $parent->ID) {
                    $parents = get_post_ancestors($parent->ID);
                    $parents = array_reverse($parents);
                    $parents[] = $parent->ID;
                    foreach ($parents as $id) {
                        $href = get_page_link($id);
                        $text = get_the_title($id);
                        $html = str_replace(
                            ['%HREF%', '%TEXT%'],
                            [$href, $text],
                            $settings['link']
                        );
                        $breadcrumbs[] = $html;
                    }
                }
            }
        }
        if ($settings['show_current']) {
            $text = get_the_title();
            $html = str_replace('%TEXT%', $text, $settings['text']);
            $breadcrumbs[] = $html;
        }
    }

    /*
     * Если мы находимся на странице результатов поиска
     */
    if (is_search()) {
        /*
         * Если это не первая страница результатов поиска (постраничная навигация),
         * то сначала добавляем в массив $breadcrumbs ссылку на первую страницу, а
         * потом — текст «Страница N»
         */
        if (get_query_var('paged')) {
            // добавляем в массив ссылку на первую страницу
            $href = home_url('/') . '?s=' . get_search_query();
            $text = 'Результаты для «' . get_search_query() . '»';
            $html = str_replace(
                ['%HREF%', '%TEXT%'],
                [$href, $text],
                $settings['link']
            );
            $breadcrumbs[] = $html;
            // добавляем в массив текст «Страница N»
            $text = 'Страница ' . get_query_var('paged');
            $html = str_replace('%TEXT%', $text, $settings['text']);
            $breadcrumbs[] = $html;
        } else {
            if ($settings['show_current']) {
                $text = 'Результаты для «' . get_search_query() . '»';
                $html = str_replace('%TEXT%', $text, $settings['text']);
                $breadcrumbs[] = $html;
            }
        }
    }

    /*
     * Если мы находимся на странице архива по годам
     */
    if (is_year()) {
        /*
         * Если последние записи блога показываются не на главной
         * странице, добавляем в хлебные крошки еще и ссылку на ту
         * страницу, на которой показываются последние записи
         */
        // идентификтор страницы, где показываются последние записи
        $page_for_posts = get_option('page_for_posts', 0);
        if ($page_for_posts) {
            // наименование страницы, где показываются последние записи
            $title = get_the_title($page_for_posts);
            // добавляем в массив ссылку на эту страницу
            $href = get_page_link($page_for_posts);
            $text = $title;
            $html = str_replace(
                ['%HREF%', '%TEXT%'],
                [$href, $text],
                $settings['link']
            );
            $breadcrumbs[] = $html;
        }
        /*
         * Если это не первая страница архива по годам (постраничная навигация),
         * то сначала добавляем в массив $breadcrumbs ссылку на первую страницу,
         * а потом — текст «Страница N»
         */
        if (get_query_var('paged')) {
            // добавляем в массив ссылку на первую страницу
            $href = get_year_link(get_the_time('Y'));
            $text = get_the_time('Y');
            $html = str_replace(
                ['%HREF%', '%TEXT%'],
                [$href, $text],
                $settings['link']
            );
            $breadcrumbs[] = $html;
            // добавляем в массив текст «Страница N»
            $text = 'Страница ' . get_query_var('paged');
            $html = str_replace('%TEXT%', $text, $settings['text']);
            $breadcrumbs[] = $html;
        } else {
            if ($settings['show_current']) {
                // добавляем в массив текст — название года
                $text = get_the_time('Y');
                $html = str_replace('%TEXT%', $text, $settings['text']);
                $breadcrumbs[] = $html;
            }
        }
    }

    /*
     * Если мы находимся на странице архива по месяцам
     */
    if (is_month()) {
        /*
         * Если последние записи блога показываются не на главной
         * странице, добавляем в хлебные крошки еще и ссылку на ту
         * страницу, на которой показываются последние записи
         */
        // идентификтор страницы, где показываются последние записи
        $page_for_posts = get_option('page_for_posts', 0);
        if ($page_for_posts) {
            // наименование страницы, где показываются последние записи
            $title = get_the_title($page_for_posts);
            // добавляем в массив ссылку на эту страницу
            $href = get_page_link($page_for_posts);
            $text = $title;
            $html = str_replace(
                ['%HREF%', '%TEXT%'],
                [$href, $text],
                $settings['link']
            );
            $breadcrumbs[] = $html;
        }
        // добавляем в массив ссылку на год публикации
        $href = get_year_link(get_the_time('Y'));
        $text = get_the_time('Y');
        $html = str_replace(
            ['%HREF%', '%TEXT%'],
            [$href, $text],
            $settings['link']
        );
        $breadcrumbs[] = $html;
        /*
         * Если это не первая страница архива по месяцам (постраничная навигация),
         * то сначала добавляем в массив $breadcrumbs ссылку на первую страницу,
         * а потом — текст «Страница N»
         */
        if (get_query_var('paged')) {
            // добавляем в массив ссылку на первую страницу
            $href = get_year_link(get_the_time('F'));
            $text = get_the_time('F');
            $html = str_replace(
                ['%HREF%', '%TEXT%'],
                [$href, $text],
                $settings['link']
            );
            $breadcrumbs[] = $html;
            // добавляем в массив текст «Страница N»
            $text = 'Страница ' . get_query_var('paged');
            $html = str_replace('%TEXT%', $text, $settings['text']);
            $breadcrumbs[] = $html;
        } else {
            if ($settings['show_current']) {
                // добавляем в массив текст — название месяца
                $text = get_the_time('F');
                $html = str_replace('%TEXT%', $text, $settings['text']);
                $breadcrumbs[] = $html;
            }
        }
    }

    /*
     * Если мы находимся на странице архива по дням
     */
    if (is_day()) {
        /*
         * Если последние записи блога показываются не на главной
         * странице, добавляем в хлебные крошки еще и ссылку на ту
         * страницу, на которой показываются последние записи
         */
        // идентификтор страницы, где показываются последние записи
        $page_for_posts = get_option('page_for_posts', 0);
        if ($page_for_posts) {
            // наименование страницы, где показываются последние записи
            $title = get_the_title($page_for_posts);
            // добавляем в массив ссылку на эту страницу
            $href = get_page_link($page_for_posts);
            $text = $title;
            $html = str_replace(
                ['%HREF%', '%TEXT%'],
                [$href, $text],
                $settings['link']
            );
            $breadcrumbs[] = $html;
        }
        // добавляем в массив ссылку на год публикации
        $href = get_year_link(get_the_time('Y'));
        $text = get_the_time('Y');
        $html = str_replace(
            ['%HREF%', '%TEXT%'],
            [$href, $text],
            $settings['link']
        );
        $breadcrumbs[] = $html;
        // добавляем в массив ссылку на месяц публикации
        $href = get_month_link(
            get_the_time('Y'),
            get_the_time('m')
        );
        $text = get_the_time('F');
        $html = str_replace(
            ['%HREF%', '%TEXT%'],
            [$href, $text],
            $settings['link']
        );
        $breadcrumbs[] = $html;
        /*
         * Если это не первая страница архива по дням (постраничная навигация),
         * то сначала добавляем в массив $breadcrumbs ссылку на первую страницу,
         * а потом — текст «Страница N»
         */
        if (get_query_var('paged')) {
            // добавляем в массив ссылку на первую страницу
            $href = get_day_link(
                get_the_time('Y'),
                get_the_time('m'),
                get_the_time('d')
            );
            $text = get_the_time('d');
            $html = str_replace(
                ['%HREF%', '%TEXT%'],
                [$href, $text],
                $settings['link']
            );
            $breadcrumbs[] = $html;
            // добавляем в массив текст «Страница N»
            $text = 'Страница ' . get_query_var('paged');
            $html = str_replace('%TEXT%', $text, $settings['text']);
            $breadcrumbs[] = $html;
        } else {
            if ($settings['show_current']) {
                // добавляем в массив текст — день публикации
                $text = get_the_time('d');
                $html = str_replace('%TEXT%', $text, $settings['text']);
                $breadcrumbs[] = $html;
            }
        }
    }

    /*
     * Если мы находимся на странице архива записей с меткой
     */
    if (is_tag()) {
        /*
         * Если последние записи блога показываются не на главной
         * странице, добавляем в хлебные крошки еще и ссылку на ту
         * страницу, на которой показываются последние записи
         */
        // идентификтор страницы, где показываются последние записи
        $page_for_posts = get_option('page_for_posts', 0);
        if ($page_for_posts) {
            // наименование страницы, где показываются последние записи
            $title = get_the_title($page_for_posts);
            // добавляем в массив ссылку на эту страницу
            $href = get_page_link($page_for_posts);
            $text = $title;
            $html = str_replace(
                ['%HREF%', '%TEXT%'],
                [$href, $text],
                $settings['link']
            );
            $breadcrumbs[] = $html;
        }
        /*
         * Если это не первая страница списка записей (постраничная навигация),
         * то сначала добавляем в массив $breadcrumbs ссылку на первую страницу,
         * а потом — текст «Страница N»
         */
        if (get_query_var('paged')) {
            // добавляем в массив ссылку на первую страницу
            $tagID = get_query_var('tag_id');
            $href = get_tag_link($tagID);
            $text = 'Метка «'.single_tag_title('', false).'»';
            $html = str_replace(
                ['%HREF%', '%TEXT%'],
                [$href, $text],
                $settings['link']
            );
            $breadcrumbs[] = $html;
            // добавляем в массив текст «Страница N»
            $text = 'Страница ' . get_query_var('paged');
            $html = str_replace('%TEXT%', $text, $settings['text']);
            $breadcrumbs[] = $html;
        } else {
            if ($settings['show_current']) {
                $text = 'Метка «'.single_tag_title('', false).'»';
                $html = str_replace('%TEXT%', $text, $settings['text']);
                $breadcrumbs[] = $html;
            }
        }
    }

    /*
     * Если мы находимся на странице архива записей автора
     */
    if (is_author()) {
        /*
         * Если последние записи блога показываются не на главной
         * странице, добавляем в хлебные крошки еще и ссылку на ту
         * страницу, на которой показываются последние записи
         */
        // идентификтор страницы, где показываются последние записи
        $page_for_posts = get_option('page_for_posts', 0);
        if ($page_for_posts) {
            // наименование страницы, где показываются последние записи
            $title = get_the_title($page_for_posts);
            // добавляем в массив ссылку на эту страницу
            $href = get_page_link($page_for_posts);
            $text = $title;
            $html = str_replace(
                ['%HREF%', '%TEXT%'],
                [$href, $text],
                $settings['link']
            );
            $breadcrumbs[] = $html;
        }
        $author = get_userdata(get_query_var('author'));
        /*
         * Если это не первая страница списка записей (постраничная навигация),
         * то сначала добавляем в массив $breadcrumbs ссылку на первую страницу,
         * а потом — текст «Страница N»
         */
        if (get_query_var('paged')) {
            // добавляем в массив ссылку на первую страницу
            $href = get_author_posts_url($author->ID);
            $text = 'Автор ' . $author->display_name;
            $html = str_replace(
                ['%HREF%', '%TEXT%'],
                [$href, $text],
                $settings['link']
            );
            $breadcrumbs[] = $html;
            // добавляем в массив текст «Страница N»
            $text = 'Страница ' . get_query_var('paged');
            $html = str_replace('%TEXT%', $text, $settings['text']);
            $breadcrumbs[] = $html;
        } else {
            // если это первая страница постраничной навигации
            if ($settings['show_current']) {
                $text = 'Автор ' . $author->display_name;
                $html = str_replace('%TEXT%', $text, $settings['text']);
                $breadcrumbs[] = $html;
            }
        }
    }

    /*
     * Если мы находимся на странице 404 Not Found
     */
    if (is_404()) {
        if ($settings['show_current']) {
            $text = 'Страница не найдена';
            $html = str_replace('%TEXT%', $text, $settings['text']);
            $breadcrumbs[] = $html;
        }
    }

    if ($echo) { // выводим хлебные крошки
        if (!empty($breadcrumbs)) {
            $breadcrumbs = implode($settings['separator'], $breadcrumbs);
            echo $settings['wrapper'][0] . $breadcrumbs . $settings['wrapper'][1];
        }
    } else { // возвращаем хлебные крошки
        return $breadcrumbs;
    }
}