<?php

class SUCCESS {
    
    /**
     * An old-fashioned JSON echoer mainly to provide json description
     * existed here only to avoid direct SQL database access
     * return a hundred present pure string
     *
     * @author John Zhang
     * @param string $DATA
     */

    public static function Catcher($DESC="ζδΊ€ζε",$DATA=null)
    {
        $output=array(
             'ret' => 200,
            'desc' => $DESC,
            'data' => $DATA
        );
        exit(json_encode($output));
    }
    
}
