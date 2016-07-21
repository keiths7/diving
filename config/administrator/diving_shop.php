<?php
/**
 * Created by PhpStorm.
 * User: liushunqi
 * Date: 16/5/29
 * Time: 上午10:13
 */

return array(
    'title' => '潜店',
    'single' => '潜店',
    'model' => 'App\DivingShop',
    'edit_fields' => array(
        'id',
        'name',
        'source' => array(
            'title' => 'img',
            'type' => 'relationship',
            'name_field' => 'name',
        ),
        'shop_languages' => array(
            'title' => 'lang',
            'type' => 'relationship',
            'name_field' => 'name',
        ),
        'description',
        'location_info',
        'equipment_desc',
        'transport',
        'transfers',
        'checkin_time',
        'extra_cost',
        'before_file',
        'associated_with',
        'non_diving_activities',
        'physically_disabled_divers',
        'destination',
        'legal_name',
        'billing_address',
        'actual_address',
        'tax_number',
        'phone',
        'skype',
        'email',
        'whatsapp',
        'website',
        'num_of_master',
        'num_of_boat',
        'nitrox',
        'Distance to the Nearest Deco Chamber',
        'location_x',
        'location_y',
        'payment_method',
        'dive_types' => array(
            'title' => 'dive_types',
            'type' => 'enum',
            'options' => array(1=>'boat dives', 2=>'shore dives')
        ),
        'infrastructure',
        'seasonality',
        'documents_required',
        'currency',
        'contact_manager',
        'logo',
        'main_image',
        'cancellation_policies'
    ),
    'columns' => array(
    	'id',
    	'name',
        'source' => array(
            'title' => 'img',
            'relationship' => 'source',
            'select' => 'GROUP_CONCAT(file)',
            'output'=> function($value){
                
                $val = explode(',', $value);
                $ret  = '';
                foreach($val as $value) {
                    $ret .= "<image src='/uploads/originals/".$value."' width='100px'>";
                }
                return $ret;
            }
        ),
        'shop_languages' => array(
            'title' => 'language',
            'relationship' => 'shop_languages',
            'select' => 'GROUP_CONCAT((:table).name)',
        ),
        'description',
        'location_info',
        'equipment_desc',
        'transport',
        'transfers',
        'checkin_time',
        'extra_cost',
        'before_file',
        'non_diving_activities',
        'physically_disabled_divers',
        'destination',
        'legal_name',
        'billing_address',
        'actual_address',
        'tax_number',
        'phone',
        'skype',
        'email',
        'whatsapp',
        'website',
        'num_of_master',
        'num_of_boat',
        'nitrox',
        'Distance to the Nearest Deco Chamber',
        'location_x',
        'location_y',
        'payment_method',
        'dive_types',
        'infrastructure',
        'seasonality',
        'documents_required',
        'currency',
        'contact_manager',
        'logo',
        'main_image',
        'cancellation_policies'
    ),
    'sort' => array(
        'field' => 'id',
        'direction' => 'asc',
    ),
    'filters' => array(
        'id',
        'name' => array(
            'title' => '课程名',
        ),
    ),
);