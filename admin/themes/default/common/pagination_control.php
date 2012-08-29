<?php if ($this->pageCount > 1): ?>
<?php $getParams = $_GET; ?>
    
<ul class="pagination">
    
    
    <?php if (isset($this->previous)): ?>
    <!-- Previous page link --> 
    <li class="pagination_previous">
    <?php $getParams['page'] = $previous; ?>
    <a href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>"><?php echo __('&lt;'); ?></a>
    </li>
    <?php endif; ?>
    
    <li class="page-input">
    <form action="" method="get" accept-charset="utf-8">
    <?php
    $hiddenParams = array();
    $entries = explode('&', http_build_query($getParams));
    foreach ($entries as $entry) {
        if(!$entry) {
            continue;
        }
        list($key, $value) = explode('=', $entry);
        $hiddenParams[urldecode($key)] = urldecode($value);
    } ?>
    <?php foreach($hiddenParams as $key => $value) {
        if($key != 'page') {
            echo $this->formHidden($key,$value);
        }
    } ?>
    <?php echo $this->formText('page', $this->current); ?> of <?php echo $this->last; ?></li>
    </form>
    
    <?php if (isset($this->next)): ?> 
    <!-- Next page link -->
    <li class="pagination_next">
    <?php $getParams['page'] = $next; ?>
    <a href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>"><?php echo __('&gt;'); ?></a>
    </li>
    <?php endif; ?>
    
</ul>

<?php endif; ?>
