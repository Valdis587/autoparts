<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" class="header__form">
                <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" class="header__input" placeholder="Поиск...">
                <button type="submit" id="searchsubmit" aria-label="searh" class="header__search-button"><i class="icon-search"></i></button>
            </form>