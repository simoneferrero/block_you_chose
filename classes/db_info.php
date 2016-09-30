<?php

namespace block_you_chose;

class block_you_chose_database_info
{
    function get_course_shortname($course_id)
    {
        global $DB;
        
        return $DB->get_field('course', 'shortname', array('id' => $course_id));
    }
}
