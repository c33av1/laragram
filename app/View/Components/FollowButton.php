<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FollowButton extends Component
{
    public $userid;

    public $follows;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($userid, $follows)
    {
        $this->userid = $userid;
        $this->follows = $follows;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.follow-button');
    }
}
