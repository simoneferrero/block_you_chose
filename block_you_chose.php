<?php
class block_you_chose extends block_list
{
    public function init() {
        $this->title = get_string('you_chose', 'block_you_chose');
    }

    public function get_content()
    {
        global $COURSE;

        $course_id=$COURSE->id;

        if ($this->content != null) {
            return $this->content;
        }

        $this->content         = new stdClass();
        $this->content->items  = array();
        $this->content->icons  = array();
        $this->content->footer = get_string('footer', 'block_you_chose');

        /*NOT WORKING: moodle can't find the resource*/
        //$this->content->items[] = html_writer::img('images\templar.png', get_string('choose_img', 'block_you_chose'));

        $this->content->items[] = html_writer::tag('img', '', array('src' => 'http://vignette3.wikia.nocookie.net/indianajones/images/6/67/Knight.jpg/revision/latest?cb=20080328211709'));
        $this->content->icons[] = "";

        $this->content->items[] = html_writer::tag('div', get_string('empty', 'block_you_chose'));
        $this->content->icons[] = "";

        $this->content->items[] = html_writer::tag('div', get_string('choose', 'block_you_chose'));
        $this->content->icons[] = "";

        for ($i = 1; $i <= 3; $i++) {
            $this->content->items[] = html_writer::tag('div', get_string('empty', 'block_you_chose'));
            $this->content->icons[] = '';

            $this->content->items[] = html_writer::tag('a', get_string('choose_' . $i, 'block_you_chose'), array('href' => "/blocks/you_chose/choice.php?chalice={$i}&course_id={$course_id}"));
            $this->content->icons[] = html_writer::empty_tag('img', array('src' => 'https://yppedia.puzzlepirates.com/images/9/96/Chalice.png', 'class' => 'icon'));
            /*NOT WORKING: moodle can't find the resource*/
            //$this->content->icons[] = html_writer::empty_tag('img', array('src' => 'images/icons/chalice.png', 'class' => 'icon'));
        }

        $this->content->items[] = html_writer::tag('div', get_string('empty', 'block_you_chose'));
        $this->content->icons[] = "";

        return $this->content;
    }

    public function instance_allow_multiple()
    {
        return false;
    }

}