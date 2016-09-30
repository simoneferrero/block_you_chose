<?php

namespace block_you_chose;

class block_you_chose_database_info
{
    function get_course_shortname($course_id)
    {
        global $DB;

        $sql = "
            SELECT
                mdl_course.shortname
            FROM
                mdl_course
            WHERE
                mdl_course.id = $course_id
        ";

        return $DB->get_record_sql($sql);
    }
}
