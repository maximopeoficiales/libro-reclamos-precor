<?php
if (!function_exists('dd')) {
    /**
     * Make your Helper
     * not use exist helpers
     * for call this function globally:
     * dd();
     */
    function dd(){
        call_user_func_array( 'dump' , func_get_args() );
        die();
    } 
}
?>