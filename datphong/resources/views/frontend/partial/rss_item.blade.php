@php
use App\Helpers\Template as Template;
    use App\Helpers\ReadRss;
    $xhtml='';
    $arrayData      = array();
    foreach($itemsLink  as $itemLinks){
        if($itemsCateRSS['id']== $itemLinks['caterss_id']){
        @$search = $params['search_value'];
                $link        = $itemLinks['link'];
                $function_name        = $itemLinks['function_name'];
                if($function_name  == 'dantri'){
                    $arrayData= array_merge($arrayData,ReadRss::getContentDantri($link,$search));
                }else if($function_name  == 'vnexpress'){
                    $arrayData= array_merge($arrayData,ReadRss::getContentVN($link,$search));
                }
        }
    }
        $xhtml = ReadRss:: showData($arrayData);   
@endphp
{!! $xhtml !!}
