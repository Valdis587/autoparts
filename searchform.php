<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
    <div id="search0" class="search input-group form-group">
    <input style="width: 230px" class="autosearch-input form-control" type="text" value="<?php echo get_search_query() ?>" name="s" id="s" />
        <button id="searchsubmit" type="submit" class="button-search btn btn-primary main-search-but" name="submit_search"><i class="fa fa-search"></i></button>
    </div>
</form>